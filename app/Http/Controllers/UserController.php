<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages= $this->errMsg();

        $data =$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'user_name' => 'required|string|max:255|unique:users',
             ] , $messages);

        $data['active']=isset($request->active);

        User::create($data);
        return redirect()->route('addUser')->with('success', 'User added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $user = User::findOrFail($id);
        return view('admin.showUser' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.editUser' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages= $this->errMsg();

        $data =$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'user_name' => 'required|string|max:255|unique:users',
            ] , $messages);

            $data['active']=isset($request->active);

        User::where('id',$id)->update($data);
        return redirect()->route('dashboard')->with('success', 'User updated successfully!');

    }



    public function destroy(Request $request)
    {
        $id=$request->id;
        User::where('id',$id)->delete();
        return redirect()->route('dashboard')->with('success', 'User deleted successfully!');
    }



    public function errMsg()
        {
            return [
                'name.required' => ' Please enter your full name.',
                'name.max' => 'Too much characters inserted', 
                'user_name.required' => 'Please enter your user name',
                'user_name.max' => 'Too much characters inserted',
                'user_name.unique' => 'Sorry, user name has been used before,try another one', 
                'email.required' => 'Please enter your email',
                'email.email'=>'Please insert a valid email ',
                'email.max'=>'Too much characters',
                'email.unique'=>'that email is registered before',
                'password.required' => 'Please enter a strong password',
                'password.min' => 'less than 8 characters',
                'password.max' => 'Too much characters',

            ];
        }

}
