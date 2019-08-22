<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Employee;
use App\Certification;
use App\Http\Controllers\Controller;
use Session; 
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;

class CertificationController extends Controller
{
    function __construct()
    {

         $this->middleware('permission:browse_employee_certifications'); //index func. if cant browse then you cant access the rest
         $this->middleware('permission:add_employee_certifications', ['only' => 'create']);
         $this->middleware('permission:edit_employee_certifications', ['only' => 'show']);
 

    }
    public function index()
    {
        $certifications = Certification::all();
        return view('pages.admin.certifications.list',  compact("certifications"));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('pages.admin.certifications.create', compact("employees"));
    }

    public function store(Request $request)
    {
        $rules = [
            'employee_id' => 'required',
            'certification' => 'required',
            'institution' => 'required',
            'granted_on' => 'required',
            'valid_on' => 'required',
            'document_url' => 'required|file|image|mimes:jpeg,png|max:1000'
        ];

        $customMessages = [
            'employee_id.required' => 'Please select employee',
            'certification.required' => 'Please provide the certification title.',
            'institution.required' => 'Please provide the awarding institution.',
            'granted_on.required' => 'Please provide the awarded date.',
            'valid_on.required' => 'Please provide Validation date.',
            'document_url.required' => 'Please upload the certificate.',
            'document_url.image' => 'Certfication attachment must be an image file.',
        ];

        $this->validate($request, $rules, $customMessages); 
    
        if ($request->granted_on > $request->valid_on) {
            throw ValidationException::withMessages([
                'granted_on' => "Certification valid through date cannot be less than the grated date.",
                'valid_on' => "Certification valid through date cannot be less than the grated date.",
            ]);
        }

        if($request->document_url){
            $path = $request->file('document_url')->store('certifications', 'public');
        }

        Certification::create([
            'employee_id' => $request->employee_id,
            'certification' => $request->certification,
            'institution' => $request->institution,
            'granted_on' => $request->granted_on,
            'valid_on' => $request->valid_on,
            'document_url' => $path,
            'document_name' => $request->document_url->getClientOriginalName(),
        ]);

        notify()->success("Successfully created!","","bottomRight");

        return redirect()->route('certification.index');
    }

    public function show($id)
    {
        $certifications = Certification::where('employee_id', $id)->get();
        return view('pages.admin.certifications.list', compact('certifications'));
    }

    public function edit(Certification $certification)
    {
        $employees = Employee::all();
        return view('pages.admin.certifications.edit', compact('certification','employees'));
    }

    public function update(Request $request, Certification $certification)
    {
        dd($certification);
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

    public function destroy(Certification $certification)
    {
        Storage::disk('public')->delete($certification->document_url);
        $certification->delete();

        notify()->success("Successfully Deleted!","","bottomRight");
        return redirect()->route('certification.index');
    }

    public function download(Certification $certification)
    {
        return response()->download(storage_path($certification->document), $certification->document_name);
    }
}
