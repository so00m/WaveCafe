<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Mail\MailFromClient;
use Illuminate\Support\Facades\Mail;
use App\Models\Notification;


class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()     //messages list
    {
        $messages =Message::get();
        return view ('admin.messages' , compact('messages'));
    }


    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)                
    {

        $messages = $this->errMsg();

        $data = $request->validate([
            'full_name' => 'required|max:100|min:5',
            'email' => 'required|email:rfc',
            'content' => 'required'
        ], $messages);

        $mssg = Message::create($data);
        Mail::to('hello@example.com')->send(new MailFromClient($data));

        $notification = new Notification();
        $notification->full_name = $data['full_name'];
        $notification->content = $data['content'];
        $notification->created_at = $mssg->created_at; 
        $notification->message_id= $mssg->id;
        $notification->is_read = 0;
        $notification->save();
        
        return redirect()->route('index');
    }

  


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {  
        $message = Message::findOrFail($id);
        $notification = Notification::where('message_id', $id)->first();
        $notification->is_read = 1;
        $notification->save();
        return view('admin.showMessage', compact('message'));
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id= $request->id;
        $message = Message::findOrFail($id);
        $message->notification()->delete();
        $message->delete();
        return redirect('admin/messages')->with('success', 'Message deleted successfully!');
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
