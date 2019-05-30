<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Client;
use Session;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
       $clients = Client::orderBy('id', 'desc')->paginate(10);
        return view('pages.admin.clients.list', compact('clients'));
    }

    public function create()
    {
         return view('pages.admin.clients.create');
    }
                                        
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:clients,name',
            'details' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required',
            //'company_url' => ''
            'status' => 'required',
            'first_contact_date' => 'required'
        ];

        $customMessages = [
            'name.required' => 'Please provide the client name.',
            'name.unique' => 'Client name already exist.',
            'details.required' => 'Please provide the client details.',
            'address.required' => 'Please provide the client address.',
            'contact_number.required' => 'Please provide the client Contact Number.',
            'contact_email.required' => 'Please provide the client contact email.',
           // 'company_url.required' => 'Please provide the client name.',
            'first_contact_date.required' => 'Please provide the client first contacted date.'
        ];

        $this->validate($request, $rules, $customMessages);

        $client = Client::create([
            'name' => $request->input('name'),
            'details' => $request->input('details'),
            'address' => $request->input('address'),
            'contact_number' => $request->input('contact_number'),
            'contact_email' => $request->input('contact_email'),
            'company_url' => $request->input('company_url'),
            'status' => $request->input('status'),
            'first_contact_date' => $request->input('first_contact_date')
        ]); 

        Session::flash('success','Successfully created!'); 

        return redirect('client');
    }

    public function show(Client $client)
    {
        return view('pages.admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $rules = [
            'name' => 'required|unique:clients,name',
            'details' => 'required',
            'address' => 'required',
            'contact_number' => 'requireed',
            'contact_email' => 'required',
            //'company_url' => '',
            'status' => 'required',
            'first_contact_date' => 'required'
        ];
        
        $customMessages = [
            'name.required' => 'Please provide the department name.',
            'name.unique' => 'Department name already exist.',
        ];

        $this->validate($request, $rules, $customMessages);

        $client->update($request->all()); 

        return redirect('client')->with('success','Successfully Updated!');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('client')->with('success','Successfully Deleted!');
    }
}
