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

        $employee_ids = $request->input('employee_id');

        $names = array();

        foreach($employee_ids as $employee_id){
            $user = User::where('typeable_id', $employee_id)->where('typeable_type', "App\SuperAdmin");
            if($user->count() > 0) {
                $names[] = $user->first()->owner->name;

            }
        }

        if(count($names) > 0){
            throw ValidationException::withMessages([
                'employee_id' => "Employee". (count($names) > 1 ? "s ":" ") . implode(", ", $names). " already ".(count($names) > 1 ? "have ":"has ")." user account.",
            ]);
        }

        foreach($employee_ids as $employee_id){
            $password = rand(100000, 999999);

            //Insert the institution admin
            $employee = Employee::find($employee_id); 

            $user = User::create([
                'name' => $employee->name,
                'email' => $employee->office_email,
                'password' => Hash::make($password),
                'typeable_id' => $employee->id,
                'typeable_type' => get_class($employee)
            ]);

            //Assign a institution admin role to the user
            $user->assignRole('employee');

            Mail::to($employee->office_email)
                ->send(new EmployeeUser($user, $employee, $password));
        }

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

    public function update(Request $request, Certification $certification)
    {
        $rules = [
            'certification' => 'required',
            'institution' => 'required',
            'granted_on' => 'required',
            'valid_on' => 'required',
            'document_url' => 'sometimes|file|image|mimes:jpeg,png|max:1000'
        ];

        $customMessages = [
            'certification.required' => 'Please provide the certification title.',
            'institution.required' => 'Please provide the awarding institution.',
            'granted_on.required' => 'Please provide the awarded date.',
            'valid_on.required' => 'Please provide validation date.',
            'document_url.required' => 'Please upload a document.',
        ];

        $this->validate($request, $rules, $customMessages); 

        if($request->document_url){
            Storage::disk('public')->delete($certification->document_url);
            $path = $request->file('document_url')->store('certifications', 'public');

            $certification->update([
                'certification' => $request->certification,
                'institution' => $request->institution,
                'granted_on' => $request->granted_on,
                'valid_on' => $request->valid_on,
                'document_url' => $path,
                'document_name' => $request->document_url->getClientOriginalName(),
            ]);
        }else{
            $certification->update([
                'certification' => $request->certification,
                'institution' => $request->institution,
                'granted_on' => $request->granted_on,
                'valid_on' => $request->valid_on,
            ]);
        }

        notify()->success("Successfully updated!","","bottomRight");
        return redirect()->route('certification.index');
    }

    //Deactivate institution administrator account
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
