<?php

namespace App\Http\Controllers\Web;


use Illuminate\Http\Request;
use App\Client;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

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
            'company_url' => 'nullable|active_url',
            'status' => 'required',
            'first_contact_date' => 'required'
        ];

        $customMessages = [
            'name.required' => 'Please provide the client\'s name.',
            'name.unique' => 'Client name already exist.',
            'details.required' => 'Please provide the client\'s details.',
            'address.required' => 'Please provide the client\'s address.',
            'contact_number.required' => 'Please provide the client\'s Contact Number.',
            'contact_email.required' => 'Please provide the client\'s contact email.',
            'company_url.active_url' => 'Please provide an active client\'s web address.',
            'first_contact_date.required' => 'Please provide the client\'s first contacted date.'
        ];

        $this->validate($request, $rules, $customMessages);

        Client::create($request->all());

        return redirect('client')->with('success','Successfully created!');
    }

    public function show(Client $client)
    {
        return view('pages.admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $rules = [
            'name' => [
                'required',
                Rule::unique('clients')->ignore($client->name, "name"),
            ],
            'details' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required',
            'company_url' => 'nullable|active_url',
            'status' => 'required',
            'first_contact_date' => 'required'
        ];
        
        $customMessages = [
            'name.required' => 'Please provide the client\'s name.',
            'name.unique' => 'Client name already exist.',
            'details.required' => 'Please provide the client\'s details.',
            'address.required' => 'Please provide the client\'s address.',
            'contact_number.required' => 'Please provide the client\'s Contact Number.',
            'contact_email.required' => 'Please provide the client\'s contact email.',
            'company_url.required' => 'Please provide an active client\'s web address.',
            'first_contact_date.required' => 'Please provide the client\'s first contacted date.'
        ];

        $this->validate($request, $rules, $customMessages);

        $client->update($request->all()); 

        return redirect('client')->with('success','Successfully Updated!');
    }

    public function destroy(Client $client)
    {
         if($client->projects->count() > 0){
            return redirect('client')->with('warning','client could not be deleted!, projects are currently attached to this client.');
        }else{
        $client->delete();
        return redirect('client')->with('success','Successfully Deleted!');
    }
    }
}
