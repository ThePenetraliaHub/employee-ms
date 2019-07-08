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

class UserController extends Controller
{
    public function index()
    {
        $users = User::where("typeable_type", "App\Employee")->get();
        return view('pages.admin.users.list',  compact("users"));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('pages.admin.users.create', compact("employees"));
    }

    public function store(Request $request)
    {
        $rules = [
            'employee_id' => 'required',
        ];

        $customMessages = [
            'employee_id.required' => 'Please select employee',
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
        $user->assignRole('employee');

        Mail::to($employee->office_email)
            ->send(new EmployeeUser($user, $employee, $password));

        notify()->success("Successfully created!","","bottomRight");

        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $certifications = Certification::where('employee_id', $id)->get();
        return view('pages.admin.users.list', compact('certifications'));
    }


    public function edit(Certification $certification)
    {
        $employees = Employee::all();
        return view('pages.admin.users.edit', compact('certification','employees'));
    }

    public function update(Request $request)
    {
        
    }

    public function profile()
    {
        if(auth()->user()->hasRole('employee')){
            $employee = Employee::find(auth()->user()->owner->id);

            $educations = Education::where('employee_id', auth()->user()->owner->id)->get();
            $certifications = Certification::where('employee_id', auth()->user()->owner->id)->get();
            $skills = Skill::where('employee_id', auth()->user()->owner->id)->get();

            return view('pages.all_users.profile.full-profile', compact('employee','educations','certifications','skills'));
        }elseif(auth()->user()->hasRole('super admin')){

        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    public function adminProfile(SuperAdmin $admin)
    {
        if(auth()->user()->hasRole('super admin')){
            if($admin == auth()->user()->owner){
                return redirect("profile");
            }else{
                
            }
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    public function employeeProfile(Employee $employee)
    {
        if(auth()->user()->hasRole('employee')){
            if($employee == auth()->user()->owner){
                return redirect("profile");
            }else{
                $employee = Employee::find($employee->id);

                return view('pages.all_users.profile.short-profile', compact('employee'));
            }
        }elseif(auth()->user()->hasRole('super admin')){
            $employee = Employee::find($employee->id);
            $educations = Education::where('employee_id', $employee->id)->get();
            $certifications = Certification::where('employee_id', $employee->id)->get();
            $skills = Skill::where('employee_id', $employee->id)->get();

            return view('pages.all_users.profile.full-profile', compact('employee','educations','certifications','skills'));
        }else{
            abort(403, 'Unauthorized action.');
        }
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
