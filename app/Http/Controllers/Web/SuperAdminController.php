<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\SuperAdmin;
use App\Http\Controllers\Controller;

class SuperAdminController extends Controller
{
    public function index()
    {
        $super_admins = SuperAdmin::orderBy('id', 'desc')->paginate(10);

        return view('pages.super_admins.list', ['super_admins' => $super_admins]);
    }

    public function create()
    {
        return view('pages.super_admins.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'phone' => 'required|unique:super_admins,phone',
            'name' => 'required',
            'address' => 'required',
        ];

        $customMessages = [
            'phone.required' => 'Please provide the Super Admin name.',
            'phone.unique' => 'Phone number already exist.',
            'name' => 'Please provide a name.',
            'address' => 'Please provide an address',
        ];

        $this->validate($request, $rules, $customMessages);

        $super_admin = SuperAdmin::create([
            'phone' => $request->input('phone'),
            'name' => $request->input('name'),
            'address' => $request->input('address'),
        ]);

        return redirect('super_admins.show');
    }

    public function show(SuperAdmin $super_admin)
    {
        return view('pages.super_admins.show', ['super_admin' => $super_admin]);
    }

    public function edit(SuperAdmin $super_admin)
    {
        return view('pages.super_admins.edit', ['super_admin' => $super_admin]);
    }

    public function update(Request $request, SuperAdmin $super_admin)
    {
       $rules = [
            'phone' => 'required|unique:super_admins,phone,'.$super_admin->id,
            'name' => 'required',
            'address' => 'required',
        ];

        $customMessages = [
            'phone.required' => 'Please provide the Super Admin name.',
            'phone.unique' => 'Phone number already exist.',
            'name' => 'Please provide a name.',
            'address' => 'Please provide an address',
        ];

        $this->validate($request, $rules, $customMessages);

        //$department->name = $request->input('name');
        $super_admin->save($request);

        return redirect('super_admins.index');
    }

    public function destroy($id)
    {
        //
    }
}
