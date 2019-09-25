<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:browse_employee_roles', ['only' => 'index_employee']); 
         $this->middleware('permission:add_employee_roles', ['only' => 'create_employee']);
         $this->middleware('permission:edit_employee_roles', ['only' => 'show_employee']);

         $this->middleware('permission:browse_employee_roles', ['only' => 'index_admin']); 
         $this->middleware('permission:add_employee_roles', ['only' => 'create_admin']);
         $this->middleware('permission:edit_employee_roles', ['only' => 'show_admin']);
 

    }
	public function index_employee()
    {
        $roles = Role::employee_roles();

        // return view('pages.all_users.role.list_employee', compact('roles'));
        return view('pages.all_users.role.gen-list_employee', compact('roles'));
    }

    public function index_admin()
    {
        $roles = Role::admin_roles();

        return view('pages.all_users.role.list_admin', compact('roles'));
    }

    public function create_employee()
    {
        return view('pages.all_users.role.create_employee');
    }

    public function create_admin()
    {
        return view('pages.all_users.role.create_admin');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:roles,name',
            'display_name' => 'required|unique:roles,display_name',
            'user_type' => 'required',
        ];

        $customMessages = [
            'name.required' => 'Please provide the role\'s name.',
            'name.unique' => 'Role name already exist.',
            'display_name.required' => 'Please provide the role\'s display name.',
            'display_name.unique' => 'Role display name already exist.',
        ];

        $this->validate($request, $rules, $customMessages); 

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
            'display_name' => $request->display_name,
            'user_type' => $request->user_type,
        ]);

        $role->permissions()->sync($request->input('permissions', []));

        notify()->success("Successfully created!","","bottomRight");

        if($request->user_type == 'admin'){
            return redirect()->route('role.admin');
        }elseif($request->user_type == 'employee'){
            return redirect()->route('role.employee');
        }
    }

    public function show_employee(Role $role)
    {
        return view('pages.all_users.role.edit_employee', compact('role'));
    }

    public function show_admin(Role $role)
    {
        return view('pages.all_users.role.edit_admin', compact('role'));
    }

    public function update(Request $request, Role $role){
        $rules = [
            'name' => [
                'required',
                Rule::unique('roles')->ignore($role->id),
            ],
            'display_name' => [
                'required',
                Rule::unique('roles')->ignore($role->id),
            ],
            'user_type' => 'required',
        ];

        $customMessages = [
            'name.required' => 'Please provide the role\'s name.',
            'name.unique' => 'Role name already exist.',
            'display_name.required' => 'Please provide the role\'s display name.',
            'display_name.unique' => 'Role display name already exist.',
        ];

        $this->validate($request, $rules, $customMessages);

        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);

        $role->permissions()->sync($request->input('permissions', []));

        notify()->success("Successfully Updated!","","bottomRight");

        if($request->user_type == 'admin'){
            return redirect()->route('role.admin');
        }elseif($request->user_type == 'employee'){
            return redirect()->route('role.employee');
        }
    }

    public function destroy(Role $role)
    {
        if($role->users->count() > 0){

            notify()->warning("Can't be deleted, users belong to this role.","","bottomRight");

            return redirect()->back();
        }else{
            $role->delete();

            notify()->success("Successfully Deleted!","","bottomRight");

            return redirect()->back();
        }
    }

}
