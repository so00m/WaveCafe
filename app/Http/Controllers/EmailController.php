<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Mail\MailFromClient;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages =Message::get();
        return view ('admin.messages' , compact('messages'));
    }


    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)                
    {
        $messages= $this->errMsg();

        $data =$request->validate([
                'full_name'=>'required|max:100|min:5',
                'email'=>'required|email:rfc',
                'content'=>'required'
                ] 
                , $messages);

                $message=Message::create($data);      //store in model

                Mail::to('hello@example.com')->send(new MailFromClient($data));  //send email

                //Notification::send(auth()->user(), new NewMessageNotification($message));

                return redirect()->back()->with('success', 'Message sent successfully!');
            
    }

  


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = Message::findOrFail($id);
        return view('admin.showMessage' , compact('message'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id= $request->id;
        Message::where('id',$id)->delete();
        return redirect('admin/messages');
    }


    public function errMsg() 
    {
         return [
            'full_name.required'=>'Your name is missed !!',
            'email.email'=>'please insert a valid email ',
            'content.required'=>'write your content!!',
        ];
    }

}
