<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\BroadcastMail;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\DB;
use App\Recepient;
use App\User;

class MessageController extends Controller
{
    public function inbox()
    {
        $messages = auth()->user()->inbox_message();
        return view('pages.all_users.messages.inbox', compact('messages'));
    }

    public function sent()
    {
        $messages = auth()->user()->sent_message();
        return view('pages.all_users.messages.sent', compact('messages'));
    }

    public function compose()
    {
        return view('pages.all_users.messages.compose');
    }

    public function trash()
    {
        $messages = auth()->user()->trash_message();
        return view('pages.all_users.messages.trash', compact('messages'));
    }


    public function store(Request $request)
    {
        switch ($request->input('submit_content')) {
            // case 'draft':
            case 'send':
                if($request->type == "Broadcast"){
                    $rules = [
                        'content' => 'required',
                    ];

                    $customMessages = [
                        'content.required' => 'You cannot send an empty message.',
                    ];

                    $this->validate($request, $rules, $customMessages); 
                    
                    DB::transaction(function () use (&$request, &$users) {
                        $message = Message::create([
                            'user_id'=> auth()->user()->id,
                            'message_id'=> null,
                            'content'=> $request->content,
                            'subject'=> $request->subject,
                        ]);

                        foreach(User::all() as $user){
                            if($user->id != auth()->user()->id){
                                Recepient::create([
                                    'message_id'=> $message->id,
                                    'user_id'=> $user->id,
                                ]);
                                Mail::to($user->email)->queue(new BroadcastMail($request->subject,$request->content,auth()->user()->email, auth()->user()->name));
                            }
                        }
                    }, 2);

                    notify()->success("Message Delivered!","","bottomRight");

                    return redirect()->route('message.sent');
                }elseif($request->type == "Normal"){
                    $rules = [
                        'user_id' => 'required',
                        'content' => 'required',
                    ];

                    $customMessages = [
                        'user_id.required' => 'Please select message recipient(s).',
                        'content.required' => 'You cannot send an empty message.',
                    ];

                    $this->validate($request, $rules, $customMessages); 

                    $users = $request->user_id;

                    DB::transaction(function () use (&$request, &$users) {
                        $message = Message::create([
                            'user_id'=> auth()->user()->id,
                            'message_id'=> null,
                            'content'=> $request->content,
                            'subject'=> $request->subject,
                        ]);

                        foreach($users as $user){
                            Recepient::create([
                                'message_id'=> $message->id,
                                'user_id'=> $user,
                            ]);

                            $user = User::find($user);
                            Mail::to($user->email)->queue(new BroadcastMail($request->subject, $request->content, auth()->user()->email, auth()->user()->name));
                        }
                    }, 2);

                    notify()->success("Message Delivered!","","bottomRight");

                    return redirect()->route('message.sent');
                }
        }
    }

    public function show(Message $message)
    {
        if(!$message->is_read()){
            $message->mark_read();
        }
        return view('pages.all_users.messages.read', compact('message'));
    }

    public function delete_to_trash(Message $message)
    {
        if($message->user_id == auth()->user()->id){
            $message->update([
                'status' => 1,
            ]);
        }else{
            $message->recepients->where('user_id', auth()->user()->id)->first()->update([
                'status' => 1,
            ]);
        }

        notify()->success("Message Trashed!","","bottomRight");

        return redirect()->back();
    }

    public function delete_permernently(Message $message)
    {
        if($message->user_id == auth()->user()->id){
            $message->update([
                'status' => 2,
            ]);
        }else{
            $message->recepients->where('user_id', auth()->user()->id)->first()->update([
                'status' => 2,
            ]);
        }

        notify()->success("Message Deleted!","","bottomRight");

        return redirect()->back();
    }

    public function recover(Message $message)
    {
        if($message->user_id == auth()->user()->id){
            $message->update([
                'status' => 0,
            ]);
        }else{
            $message->recepients->where('user_id', auth()->user()->id)->first()->update([
                'status' => 0,
            ]);
        }

        notify()->success("Message Recovered!","","bottomRight");

        return redirect()->back();
    }

    public function destroy(Message $message)
    {
        
    }
}
