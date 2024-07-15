<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

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
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return [
            'user_name' => $request->input('user_name'),
            'password' => $request->input('password'),
            'active' =>1, // user should be activated to log in
        ];
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
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */

     protected function attemptLogin(Request $request)
     {
         // التحقق من صحة بيانات الإدخال
         $this->validateLogin($request);
     
         // البحث عن المستخدم بناءً على اسم المستخدم المدخل
         $user = User::where('user_name', $request->input('user_name'))->first();
     
         // التحقق من حالة النشاط للمستخدم الموجود
         if ($user && $user->active == 0) {
            
            throw ValidationException::withMessages([
                 'user_name' => 'Your account is not active. 
                                 Please contact support or login with admin account.',
            ]);
            
         }
     
                // محاولة تسجيل الدخول باستخدام بيانات الاعتماد
         if (!Auth::attempt($this->credentials($request), true)) {

                // عند فشل محاولة تسجيل الدخول 
             throw ValidationException::withMessages([
                 'user_name' => 'These credentials do not match our records.',
             ]);
             
         }
     
         return true; // تسجيل الدخول ناجح
     }

}