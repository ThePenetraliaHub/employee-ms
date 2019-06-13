<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Employee;
use App\Education;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        return view('pages.admin.educations.list',  compact("educations"));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('pages.admin.educations.create', compact("employees"));
    }

    public function store(Request $request)
    {
        $rules = [
            'employee_id' => 'required',
            'qualification' => 'required',
            'institution' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'document_url' => 'required|file|image|mimes:jpeg,png|max:1000'
        ];

        $customMessages = [
            'employee_id.required' => 'Please select employee',
            'qualification.required' => 'Please provide the qualification attained.',
            'institution.required' => 'Please provide the awarding institution.',
            'start_date.required' => 'Please provide the date employee started education pursuit.',
            'end_date.required' => 'Please provide the date employee completed education.',
            'document_url.required' => 'Please upload the education certificate.',
            'document_url.image' => 'Education certification attachment must be an image file.',
        ];

        $this->validate($request, $rules, $customMessages); 
    
        if ($request->start_date > $request->end_date) {
            throw ValidationException::withMessages([
                'start_date' => "Education start date cannot be greater than the end date.",
                'end_date' => "Education start date cannot be greater than the end date.",
            ]);
        }

        if($request->document_url){
            $path = $request->file('document_url')->store('educations', 'public');
        }

        Education::create([
            'employee_id' => $request->employee_id,
            'qualification' => $request->qualification,
            'institution' => $request->institution,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'document_url' => $path,
        ]);

        notify()->success("Successfully created!","","bottomRight");

        return redirect()->route('education.index');
    }

    public function edit(Certification $certification)
    {
        $employees = Employee::all();
        return view('pages.admin.educations.edit', compact('certification','employees'));
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
        return redirect()->route('education.index');
    }

    public function destroy(Education $education)
    {
        Storage::disk('public')->delete($education->document_url);
        $education->delete();

        notify()->success("Successfully Deleted!","","bottomRight");
        return redirect()->route('education.index');
    }

    public function download(Education $education)
    {
        return response()->download(storage_path("app/public/".$education->document_url));
    }
}
