<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Mail\MailFromClient;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;


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
                ], $messages);

                $storedNotification=Message::create($data);      //store in model

                Mail::to('hello@example.com')->send(new MailFromClient($data));  //send email

                Notification::send(auth()->user(), new NewMessageNotification($storedNotification));

                return redirect()->back()->with('success', 'Message sent successfully!');
            
    }

  


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 
        $message = Message::findOrFail($id);

        $notification = $message->notification;

            if ($notification) {
                $notification->markAsRead();
            }

        return view('admin.showMessage', compact('message'));
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
            'full_name.required' => 'Full name is required',
            'full_name.max' => 'Full name must not exceed 100 characters',
            'full_name.min' => 'Full name must be at least 5 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'content.required' => 'Content is required'
        ];
    }




}
