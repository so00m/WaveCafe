<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

//الكود دا مش شغال
    // public function credentials(Request $request){

    //     if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
    //             return ['email'=>$request->email,'password'=>$request->password];
        
    //     }elseif($request->user_name){
    //         return ['user_name'=>$request->email, 'password'=>$request->password];
                
    //     }

    // }

  /**
     * الحصول على بيانات الاعتماد لتسجيل الدخول من الطلب.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return [
            'user_name' => $request->input('user_name'),
            'password' => $request->input('password'),
        ];
    }

 
    /**
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */


    protected function attemptLogin(Request $request)
    {
        return Auth::attempt($this->credentials($request), $request->filled('remember'));
    }

    /**
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string',
            'password' => 'required|string',
        ]);
    }

   /**
     * الرد عند فشل محاولة تسجيل الدخول.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'user_name' => [trans('auth.failed')],
        ]);
    }

    /**
     * التعامل مع طلب تسجيل الدخول.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }



}