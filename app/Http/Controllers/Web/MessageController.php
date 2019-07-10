<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function inbox()
    {
        $messages = auth()->user()->inbox_message();
        return view('pages.all_users.messages.inbox', compact('messages'));
    }

    public function sent()
    {
        $messages = auth()->user()->inbox_message();
        return view('pages.all_users.messages.sent', compact('messages'));
    }

    public function compose()
    {
        return view('pages.all_users.messages.compose');
    }

    public function draft()
    {
        $messages = auth()->user()->inbox_message();
        return view('pages.all_users.messages.draft', compact('messages'));
    }


    public function store(Request $request)
    {
        
    }

    public function show(Message $message)
    {
        dd("Here");
        return view('pages.all_users.messages.read', compact('message'));
    }

    public function destroy(Message $message)
    {
        
    }
}
