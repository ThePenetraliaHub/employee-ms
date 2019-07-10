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
        switch ($request->input('submit_content')) {
            case 'draft':
                $rules = [
                    'user_id' => 'required|unique:job_titles,code',
                    'content' => 'required|unique:job_titles,title',
                ];

                $customMessages = [
                    'code.required' => 'Please provide the job title\'s code.',
                    'code.unique' => 'job title already exist.',
                    'title.required' => 'Please provide job title.',
                    'title.unique' => 'Employee job title already exist.',
                    'description.required' => 'Please provide job description.'
                ];

                $this->validate($request, $rules, $customMessages); 

                JobTitle::create($request->all());

                notify()->success("Successfully created!","","bottomRight");
                return redirect('job-title');
            case 'send':
                $rules = [
                    'user_id' => 'required|unique:job_titles,code',
                    'content' => 'required',
                ];

                $customMessages = [
                    'user_id.required' => 'Please select message recipient(s).',
                    'content.required' => 'You cannot send an empty message.',
                ];

                $this->validate($request, $rules, $customMessages); 

                $employee_ids = $request->employee_id;

                notify()->success("Message Delivered!","","bottomRight");

                return redirect('message.sent');
        }
    }

    public function show(/* Message $message */)
    {
        return view('pages.all_users.messages.read');
    }

    public function destroy(Message $message)
    {
        
    }
}
