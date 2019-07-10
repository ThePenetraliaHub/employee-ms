<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function show(EmployeeProject $employee_project)
    {

    }

    public function destroy(EmployeeProject $employee_project)
    {
        
    }
}
