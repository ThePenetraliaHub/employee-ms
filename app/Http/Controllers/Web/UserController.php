<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Employee;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use App\Mail\EmployeeUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Certification;
use App\Education;
use App\Skill;
use App\SuperAdmin;
use App\Role;

class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:browse_employee_user', ['only' => 'index']); 
         $this->middleware('permission:add_employee_user', ['only' => 'create']);
         $this->middleware('permission:edit_employee_user', ['only' => 'show']);
         
    }
    public function index()
    {
        $users = User::where("typeable_type", "App\Employee")->get();
        // return view('pages.admin.users.list',  compact("users"));
        return view('pages.admin.users.gen-list',  compact("users"));
    }

    public function create()
    {
        $employees = Employee::all();
        $roles = Role::employee_roles();

        // return view('pages.admin.users.create', compact("employees", 'roles'));
        return view('pages.admin.users.gen-create', compact("employees", 'roles'));
    }

    public function store(Request $request)
    {
        $rules = [
            'employee_id' => 'required',
            'role' => 'required',
        ];

        $customMessages = [
            'employee_id.required' => 'Please select employee',
            'role.required' => "Please select employee's role",
        ];

        $this->validate($request, $rules, $customMessages);

        $employee = Employee::find($request->employee_id)->first(); 

        // //Check if someone with same email aleady exist
        // if (User::where('email', $employee->office_email)->get()->count() != 0) {
        //     throw ValidationException::withMessages([
        //         'employee_id' => "A user with employee's official email already exist."
        //     ]);
        // }

        $password = rand(100000, 999999);

        $user = User::create([
            'name' => $employee->name,
            'email' => $employee->office_email,
            'password' => Hash::make($password),
            'typeable_id' => $employee->id,
            'typeable_type' => get_class($employee)
        ]);

        //Assign a employee role to the user
        $user->assignRole($request->role);

        Mail::to($employee->office_email)
            ->send(new EmployeeUser($user, $employee, $password));

        notify()->success("Successfully created!","","bottomRight");

        return redirect()->route('user.index');
    }

    public function show(User $user)
    {
        $employees = Employee::all();
        $roles = Role::employee_roles();

        // return view('pages.admin.users.edit', compact('user', 'roles'));
        return view('pages.admin.users.gen-edit', compact('user', 'roles'));
    }


    public function edit(Certification $certification)
    {
        $employees = Employee::all();
        return view('pages.admin.users.edit', compact('certification','employees'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'role' => 'required',
        ];

        $customMessages = [
            'role.required' => "Please select employee's role",
        ];

        $this->validate($request, $rules, $customMessages);

        //Assign a employee role to the user
        $user->syncRoles($request->role);

        notify()->success("Successfully updated!","","bottomRight");

        return redirect()->route('user.index');
    }

    public function profile()
    {
        if(auth()->user()->owner instanceof Employee){
            $employee = Employee::find(auth()->user()->owner->id);

            $educations = Education::where('employee_id', auth()->user()->owner->id)->get();
            $certifications = Certification::where('employee_id', auth()->user()->owner->id)->get();
            $skills = Skill::where('employee_id', auth()->user()->owner->id)->get();

            // return view('pages.all_users.profile.employee.full-profile', compact('employee','educations','certifications','skills'));
            return view('pages.all_users.profile.employee.gen-full-profile', compact('employee','educations','certifications','skills'));
        }elseif(auth()->user()->owner instanceof SuperAdmin){
            $admin = auth()->user()->owner;
            return view('pages.all_users.profile.admin.profile', compact('admin'));
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    public function adminProfile(SuperAdmin $admin)
    {
        if($admin == auth()->user()->owner){
            return redirect("profile");
        }else{
            if(auth()->user()->can('edit_admin_user')){
                return view('pages.all_users.profile.admin.profile', compact('admin')); 
            }elseif(auth()->user()->can('read_admin_user')){
                return view('pages.all_users.profile.admin.gen-short-profile', compact('admin'));
            }
            else{
                abort(403, 'Unauthorized action.');
            }
        }
    }

    public function employeeProfile(Employee $employee)
    {
        if($employee == auth()->user()->owner){
            return redirect("profile");
        }else{
            if(auth()->user()->can('edit_employee')){
                $educations = Education::where('employee_id', $employee->id)->get();
                $certifications = Certification::where('employee_id', $employee->id)->get();
                $skills = Skill::where('employee_id', $employee->id)->get();

                // return view('pages.all_users.profile.employee.full-profile', compact('employee','educations','certifications','skills'));
                return view('pages.all_users.profile.employee.gen-full-profile', compact('employee','educations','certifications','skills'));
            }elseif(auth()->user()->can('read_employee')){
                // return view('pages.all_users.profile.employee.short-profile', compact('employee'));
                return view('pages.all_users.profile.employee.gen-short-profile', compact('employee'));
            }else{
                abort(403, 'Unauthorized action.');
            }
        }
    }

    public function profile_img(Request $request, Employee $employee)
    {
        $rules = [
            'avatar' => 'required|file|image|mimes:jpeg,png|max:1000'
        ];

        $customMessages = [
            'avatar.required' => 'Please select an image.',
            'avatar.image' => 'profile image must be an image file.',
        ];

        $this->validate($request, $rules, $customMessages); 
        
        if($request->avatar){
            if($employee->avatar != 'avatars/default.png'){
                Storage::disk('public')->delete($employee->avatar);
            }
            
            $path = $request->file('avatar')->store('avatars', 'public');
            $employee->update(['avatar' => $path ]);
        }

        notify()->success("Uploaded Successfully!","","bottomRight");

        return back();
    }

    public function admin_profile_img(Request $request, User $user)
    {
        $rules = [
            'avatar' => 'required|file|image|mimes:jpeg,png|max:1000'
        ];

        $customMessages = [
            'avatar.required' => 'Please select an image.',
            'avatar.image' => 'profile image must be an image file.',
        ];
       
        $this->validate($request, $rules, $customMessages); 
        
        if($request->avatar){
            if($user->avatar != 'avatars/default.png'){
                Storage::disk('public')->delete($user->avatar);
            }
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->update(['avatar' => $path ]);
        }

        notify()->success("Uploaded Successfully!","","bottomRight");

        return back();
    }

    //Deactivate employee account
    public function active(Request $request, User $user){
        if($user->is_active == 1){
            $user->update([
                'is_active' => '0',
            ]);

            notify()->success("Employee account deactivated successfully!","","bottomRight");

            return response()->json([
                'message' => 'success',
            ], 200);
        }else if($user->is_active == 0){
            $user->update([
                'is_active' => '1',
            ]);

            notify()->success("Employee account activated successfully!","","bottomRight");
            
            return response()->json([
                'message' => 'success',
            ], 200);
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        notify()->success("Successfully Deleted!","","bottomRight");
        return redirect()->route('user.index');
    }
}
