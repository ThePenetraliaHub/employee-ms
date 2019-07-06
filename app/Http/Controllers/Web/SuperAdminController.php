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

class SuperAdminController extends Controller
{
    public function index()
    {
        $users = User::where('typeable_type', 'App\SuperAdmin')->paginate(10);

        return view('pages.admin.super_admin.list', compact("users"));
    }

    public function create()
    {
        return view('pages.admin.super_admin.create');
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
            ];

            $customMessages = [
                'name.required' => 'Please provide the administrator\'s name.',
                'email.required' => 'Please provide the administrator\'s email.',
                'email.email' => 'Please provide a valid administrator email.',
                'phone.required' => 'Please provide the administrator\'s mobile number.',
                'phone.regex' => 'Please provide a valid Nigerian phone number.',
                'phone.phone' => 'Please provide a valid Nigerian phone number.',
                'address.required' => 'Please provide the administrator\'s address.',
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
            $user->assignRole('super admin');

            //Send mail to the new administrator
            Mail::to($request->email)
                ->send(new AdminUser($user, $admin, $password));

            notify()->success("Successfully created!","","bottomRight");

            return redirect()->route("admin.index");
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    public function show(SuperAdmin $super_admin)
    {
        return view('pages.admin.super_admin.show', ['super_admin' => $super_admin]);
    }

    public function edit(SuperAdmin $super_admin)
    {
        return view('pages.admin.super_admin.edit', ['super_admin' => $super_admin]);
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

    public function destroy(Request $request, User $user)
    {
        dd($user);
        $user->user_info->delete();
        $user->delete();

        notify()->success("Successfully Deleted!","","bottomRight");
        return redirect()->route('admin.index');
    }
}
