<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\SuperAdmin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminUser;
use App\Employee;
use App\Role;

class SuperAdminController extends Controller
{
    public function index()
    {
        $users = User::where('typeable_type', 'App\SuperAdmin')->paginate(10);

        return view('pages.admin.super_admin.list', compact("users"));
    }

    public function create()
    {
        $roles = Role::employee_roles();

        return view('pages.admin.super_admin.create', compact('roles'));
    }

    public function store(Request $request)
    {
        if(auth()->user()->hasRole('super admin')){
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                // "phone" => "required|regex:/^[+]?[0-9]*$/|phone:NG",
                'address' => 'required',
                "phone" => "required",
                'role' => 'required',
            ];

            $customMessages = [
                'name.required' => 'Please provide the administrator\'s name.',
                'email.required' => 'Please provide the administrator\'s email.',
                'email.email' => 'Please provide a valid administrator email.',
                'phone.required' => 'Please provide the administrator\'s mobile number.',
                'phone.regex' => 'Please provide a valid Nigerian phone number.',
                'phone.phone' => 'Please provide a valid Nigerian phone number.',
                'address.required' => 'Please provide the administrator\'s address.',
                'role.required' => "Please select administrator's role",
            ];

            $this->validate($request, $rules, $customMessages);

            //Check if someone with same email aleady exist
            if (User::where('email', $request->email)->get()->count() != 0 || Employee::where('office_email', $request->email)->get()->count() != 0) {
                throw ValidationException::withMessages([
                    'email' => "A user with thesame email already exist"
                ]);
            }

            $password = rand(100000, 999999);

            //Insert the institution admin
            $admin = SuperAdmin::create([
                'phone'=> $request->phone,
                'address'=> $request->address,
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($password),
                'typeable_id' => $admin->id,
                'typeable_type' => get_class($admin)
            ]);

            //Assign a super admin role to the user
            $user->assignRole($request->role);

            //Send mail to the new administrator
            Mail::to($request->email)
                ->send(new AdminUser($user, $admin, $password));

            notify()->success("Successfully created!","","bottomRight");

            return redirect()->route("admin.index");
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    public function show(User $admin)
    {
        $roles = Role::admin_roles();

        return view('pages.admin.super_admin.edit', ['user' => $admin, 'roles' => $roles]);
    }

    public function update(Request $request, SuperAdmin $admin)
    {
        if(auth()->user()->hasRole('super admin')){
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                // "phone" => "required|regex:/^[+]?[0-9]*$/|phone:NG",
                'address' => 'required',
                "phone" => "required",
                'role' => 'required',
            ];

            $customMessages = [
                'name.required' => 'Please provide the administrator\'s name.',
                'email.required' => 'Please provide the administrator\'s email.',
                'email.email' => 'Please provide a valid administrator email.',
                'phone.required' => 'Please provide the administrator\'s mobile number.',
                'phone.regex' => 'Please provide a valid Nigerian phone number.',
                'phone.phone' => 'Please provide a valid Nigerian phone number.',
                'address.required' => 'Please provide the administrator\'s address.',
                'role.required' => "Please select employee's role",
            ];

            $this->validate($request, $rules, $customMessages);

            //Check if someone with same email aleady exist
            if (User::where('email', $request->email)->where('id', '!=', $admin->user_info->id)->get()->count() != 0 || Employee::where('office_email', $request->email)->get()->count() != 0) {
                throw ValidationException::withMessages([
                    'email' => "A user with thesame email already exist"
                ]);
            }

            //Insert the institution admin
            $admin->update([
                'phone'=> $request->phone,
                'address'=> $request->address,
            ]);

            $admin->user_info->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $admin->user_info->syncRoles($request->role);

            notify()->success("Successfully updated!","","bottomRight");

            return redirect('admin');
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    public function destroy($user)
    {
        $user = User::where('id', $user)->get()->first();

        $user->owner->delete();
        $user->delete();

        notify()->success("Successfully Deleted!","","bottomRight");
        return redirect()->route('admin.index');
    }

    //Deactivate administrator account
    public function active(Request $request, User $user){
        if($user->is_active == 1){
            $user->update([
                'is_active' => '0',
            ]);

            notify()->success("Account deactivated successfully!","","bottomRight");

            return response()->json([
                'message' => 'success',
            ], 200);
        }else if($user->is_active == 0){
            $user->update([
                'is_active' => '1',
            ]);

            notify()->success("Account activated successfully!","","bottomRight");
            
            return response()->json([
                'message' => 'success',
            ], 200);
        }
    }
}
