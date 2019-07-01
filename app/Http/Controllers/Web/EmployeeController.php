<?php

namespace App\Http\Controllers\Web;

use App\Employee;
use App\Department;
use App\PayGrade;
use App\EmployeeStatus;
use App\JobTitle;
use App\Certification;
use App\Education;
use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    
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
            // 'firstname' => 'required',
            // 'lastname' => 'required',
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
            'office_email' => 'unique:employees,office_email',
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
            'private_email.unique' => 'employee\'s private email address already exist.',
            // 'office_email.required' => 'Please provide employee\'s office email address.',
            'office_email.unique' => 'employee\'s office email address already exist.',
            'job_title_id.required' => 'Please select the employee\'s job title.',
            'pay_grade_id.required' => 'Please select the employee\'s pay grade.',
            'employee_status_id.required' => 'Please select employee\'s employment status.',
        ];

        $this->validate($request, $rules, $customMessages);

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

    public function userProfile($id)
    {
       $employee = Employee::find($id);
       $educations = Education::where('employee_id', $id)->get();
       $certifications = Certification::where('employee_id', $id)->get();
       $skills = Skill::where('employee_id', $id)->get();

        return view('pages.admin.user-profile.user-profile', compact('employee','educations','certifications','skills'));
    }

    public function shortProfile($id)
    {
       $employee = Employee::find($id);
       $educations = Education::where('employee_id', $id)->get();
       $certifications = Certification::where('employee_id', $id)->get();
       $skills = Skill::where('employee_id', $id)->get();

        return view('pages.admin.user-profile.short-profile', compact('employee','educations','certifications','skills'));
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
            // 'firstname' => 'required',
            // 'lastname' => 'required',
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
            // 'office_email.required' => 'Please provide employee\'s office email address.',
            'office_email.unique' => 'Employee\'s office email address already exist.',
            'job_title_id.required' => 'Please select the employee\'s job title.',
            'pay_grade_id.required' => 'Please select the employee\'s pay grade.',
            'employee_status_id.required' => 'Please select employee\'s employment status.',
        ];

        $this->validate($request, $rules, $customMessages);

        $employee->update($request->all());

        notify()->success("Successfully Updated!","","bottomRight");
        return redirect('employee');
    }

     public function destroy(Employee $employee)
    {
        $employee->delete();

        notify()->success("Successfully Deleted!","","bottomRight");
        return redirect('employee');
    }
}
