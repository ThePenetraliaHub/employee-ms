<?php

namespace App\Http\Controllers\Web;

use App\Employee;
use App\Department;
use App\PayGrade;
use App\User;
use App\EmployeeStatus;
use App\JobTitle;
use App\Certification;
use App\Education;
use App\Skill;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class EmployeeController extends Controller
{
    function __construct()
    {

         $this->middleware('permission:browse_employee'); //index func. if cant browse then you cant access the rest
         $this->middleware('permission:add_employee', ['only' => 'create']);
         $this->middleware('permission:edit_employee', ['only' => 'show']);
 

    }
    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->paginate(10);
        $pay_grades = PayGrade::all();
        $employment_statuses = EmployeeStatus::all();
        $job_titles = JobTitle::all();

        return view('pages.admin.employees.list', compact("employees", "employment_statuses", "pay_grades", "job_titles"));
    }

    public function create()
    {
        $departments = Department::all();
        $employees = Employee::all();
        $pay_grades = PayGrade::all();
        $employment_statuses = EmployeeStatus::all();
        $job_titles = JobTitle::all();

        return view('pages.admin.employees.create' , compact('departments', 'employees', "employment_statuses", "pay_grades", "job_titles"));
    }

    public function store(Request $request)
    {
        $rules = [
            //'supervisor_id' => 'required',
            'department_id' => 'required',
            'NIN' => 'required|unique:employees,NIN',
            'employee_number' => 'required|unique:employees,employee_number',
            'name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'joined_date' => 'required',
            'addressline1' => 'required',
            // 'zip_code' => 'required',
            'home_phone' => 'required|unique:employees,home_phone',
            //'office_phone' => 'required',
            'private_email' => 'required|unique:employees,private_email',
            'office_email' => 'required|unique:employees,office_email',
            'job_title_id' => 'required',
            'pay_grade_id' => 'required',
            'employee_status_id' => 'required'
        ];

        $customMessages = [
            // 'supervisor_id.required' =>'Please select employee\'s supervisor.',
            'department_id.required' =>'Please select employee\'s department.',
            'NIN.required' => 'Please provide employee\'s NIN.',
            'NIN.unique' => 'NIN already exist.',
            'employee_number.required' =>'Please provide the employee\'s number.',
            'employee_number.unique' =>'employee\'s number already exist.',
            'name.required' => 'Please provide employee\'s name.',
            'date_of_birth.required' => 'Please select employee\'s date of birth.',
            'gender.required' => 'Please select employee\'s gender.',
            'marital_status.required' => 'Please select employee\'s marital status.',
            'joined_date.required' => 'Please select the date employee joined the company.',
            'addressline1.required' => 'Please provide employee\'s address.',
            // 'zip_code.required' => 'Please provide zip code.',
            'home_phone.required' => 'Please provide employee\'s home phone number.',
            //'office_phone.required' => 'Please provide employee\'s office phone number.',
            'private_email.required' => 'Please provide employee\'s private email address.',
            'private_email.unique' => 'employee\'s private email address already exist.',
            'office_email.required' => 'Please provide employee\'s office email address.',
            'office_email.unique' => 'employee\'s office email address already exist.',
            'job_title_id.required' => 'Please select the employee\'s job title.',
            'pay_grade_id.required' => 'Please select the employee\'s pay grade.',
            'employee_status_id.required' => 'Please select employee\'s employment status.',
        ];

        $this->validate($request, $rules, $customMessages);

        if (User::where('email', $request->office_email)->get()->count() != 0) {
            throw ValidationException::withMessages([
                'office_email' => "A user with employee's official email already exist."
            ]);
        }

        Employee::create($request->all());

        notify()->success("Successfully created!","","bottomRight");
        return redirect('employee');
    }

    public function show(Employee $employee)
    {
        $departments = Department::all();
        $employees = Employee::all();
        $pay_grades = PayGrade::all();
        $employment_statuses = EmployeeStatus::all();
        $job_titles = JobTitle::all();

        return view('pages.admin.employees.edit', compact('employee', 'departments', 'employees', "employment_statuses", "pay_grades", "job_titles"));
    }
    
    public function update(Request $request, Employee $employee)
    {
        $rules = [
            //'supervisor_id' => 'required',
            'department_id' => 'required',
            'NIN' => [
                'required',
                Rule::unique('employees')->ignore($employee->NIN, "NIN"),
            ],
            'employee_number' => [
                'required',
                Rule::unique('employees')->ignore($employee->employee_number, "employee_number"),
            ],
            'name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'joined_date' => 'required',
            'addressline1' => 'required',
            // 'zip_code' => 'required',
            'home_phone' => [
                'required',
                Rule::unique('employees')->ignore($employee->home_phone, "home_phone"),
            ],
            //'office_phone' => 'required',
            'private_email' => [
                'required',
                Rule::unique('employees')->ignore($employee->private_email, "private_email"),
            ],
            'office_email' => [
                'required',
                Rule::unique('employees')->ignore($employee->office_email, "office_email"),
            ],
            'job_title_id' => 'required',
            'pay_grade_id' => 'required',
            'employee_status_id' => 'required'
        ];

        $customMessages = [
            // 'supervisor_id.required' =>'Please select employee\'s supervisor.',
            'department_id.required' =>'Please select employee\'s department.',
            'NIN.required' => 'Please provide employee\'s NIN.',
            'NIN.unique' => 'NIN already exist.',
            'employee_number.required' =>'Please provide the employee\'s number.',
            'employee_number.unique' =>'Employee\'s number already exist.',
            'name.required' => 'Please provide employee\'s name.',
            // 'firstname.required' => 'Please provide employee\'s first name.',
            // 'lastname.required' => 'Please provide employee\'s last name.',
            'date_of_birth.required' => 'Please select employee\'s date of birth.',
            'gender.required' => 'Please select employee\'s gender.',
            'marital_status.required' => 'Please select employee\'s marital status.',
            'joined_date.required' => 'Please select the date employee joined the company.',
            'addressline1.required' => 'Please provide employee\'s address.',
            // 'zip_code.required' => 'Please provide zip code.',
            'home_phone.required' => 'Please provide employee\'s home phone number.',
            //'office_phone.required' => 'Please provide employee\'s office phone number.',
            'private_email.required' => 'Please provide employee\'s private email address.',
            'private_email.unique' => 'Employee\'s private email address already exist.',
            'office_email.required' => 'Please provide employee\'s office email address.',
            'office_email.unique' => 'Employee\'s office email address already exist.',
            'job_title_id.required' => 'Please select the employee\'s job title.',
            'pay_grade_id.required' => 'Please select the employee\'s pay grade.',
            'employee_status_id.required' => 'Please select employee\'s employment status.',
        ];

        $this->validate($request, $rules, $customMessages);
        // this throws error when u try to update an employees email for d first time cus no employee user exist in user table yet
        if (User::where([['email', $request->office_email], ['id', '<>', $employee->user_info != null ? $employee->user_info->id : '']])->get()->count() != 0) {
            throw ValidationException::withMessages([
                'office_email' => "A user with employee's official email already exist."
            ]);
        }

        $employee->update($request->all());

        if($employee->user_info){
            $employee->user_info->update([
                'name' => $request->name,
                'email' => $employee->office_email,
            ]);
        }

        notify()->success("Successfully Updated!","","bottomRight");
        return redirect('employee');
    }

     public function destroy(Employee $employee)
    {
        if($employee->user_info){
            $employee->user_info->delete();
        }

        $employee->delete();

        notify()->success("Successfully Deleted!","","bottomRight");
        return redirect('employee');
    }

    public function exportdata()

    {
        return Excel::download(new EmployeeExport, 'employees.xlsx');
    }

        public function importdata(Request $request) 
    {
            $this->validate($request, [
                  'file'  => 'required|mimes:xls,xlsx'
                 ]);

        $path = $request->file('file')->getRealPath();

        $data = Excel::import(new EmployeeImport, $path);

        notify()->success("Excel Data Imported successfully!","","bottomRight");

        return back();

    }

}
