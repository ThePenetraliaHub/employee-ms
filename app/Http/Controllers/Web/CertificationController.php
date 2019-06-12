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

class CertificationController extends Controller
{
    public function index()
    {
       $employees = Employee::all();
        return view('pages.admin.certifications.find',  compact("employees"));
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
            'certification' => 'required|unique:certifications,certification',
            'institution' => 'required',
            'granted_on' => 'required',
            'valid_on' => 'required',
            'document_url' => 'required|file|image|mimes:jpeg,png|max:300'


        ];



        $customMessages = [
            'employee_id.required' => 'Please select employee',
            'certification.required' => 'Please provide the certification title.',
            'certification.unique' => 'certification title already exist.',
            'institution.required' => 'Please provide the awarding institution.',
            'granted_on.required' => 'Please provide the awarded date.',
            'valid_on.required' => 'Please provide Validation date.',
           'document_url.required' => 'Please upload a document.',
        ];

        $this->validate($request, $rules, $customMessages); 

       // cache the file
    $file = $request->file('document_url');

    // generate a new filename. getClientOriginalExtension() for the file extension
    $filename = 'certifications-doc-' . time() . '.' . $file->getClientOriginalExtension();

    // save to storage/app/photos as the new $filename
    $path = $file->storeAs('public/certifications', $filename);
    //dd($path);

    $certification = new Certification();
    $certification->employee_id = $request->employee_id;
    $certification->certification = $request->certification;
    $certification->institution = $request->institution;
    $certification->granted_on = $request->granted_on;
    $certification->valid_on = $request->valid_on;
    $certification->document_url = $filename ;
    $certification->save();

    notify()->success("Successfully created!","","bottomRight");
    return redirect()->route('certification.show', ['id' => $request->employee_id]);
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

    public function update(Request $request, $id)
    {


        $rules = [
            //'employee_id' => 'required',
            'certification' => [
                'required',
                Rule::unique('certifications')->ignore($id)
            ],
            'institution' => 'required',
            'granted_on' => 'required',
            'valid_on' => 'required',
            'document_url' => 'sometimes|file|image|mimes:jpeg,png|max:300'


        ];



        $customMessages = [
            'employee_id.required' => 'Please select employee',
            'certification.required' => 'Please provide the certification title.',
            'certification.unique' => 'certification title already exist.',
            'institution.required' => 'Please provide the awarding institution.',
            'granted_on.required' => 'Please provide the awarded date.',
            'valid_on.required' => 'Please provide Validation date.',
           'document_url.required' => 'Please upload a document.',
        ];

        $this->validate($request, $rules, $customMessages); 
        $certification = Certification::find($id);
        $certification->employee_id = $request->employee_id;
        $certification->certification = $request->certification;
        $certification->institution = $request->institution;
        $certification->granted_on = $request->granted_on;
        $certification->valid_on = $request->valid_on;

        if($request->hasFile('document_url')){
      
         // cache the new file
         $file = $request->file('document_url');
         // generate a new filename. getClientOriginalExtension() for the file extension
         $filename = 'certifications-doc-' . time() . '.' . $file->getClientOriginalExtension();
         // save to storage/app/photos as the new $filename
         $path = $file->storeAs('public/certifications',$filename);
         //get old file name
         $oldfile = $certification->document_url;
         //update db
         $certification->document_url = $filename ;

         //delete the file
         Storage::delete('public/certifications/'.$oldfile);


        }
    
    $certification->save();

    notify()->success("Successfully updated!","","bottomRight");
    return redirect()->route('certification.show', ['id' => $request->employee_id]);
    }

    public function destroy( Certification $certification)
    {
        //delete the file
         Storage::delete('public/certifications/'.$certification->document_url);
         $certification->delete();

         notify()->success("Successfully Deleted!","","bottomRight");
         return redirect()->route('certification.show', ['id' => $certification->employee_id]);
    }


    public function download($document)
    {
      return response()->download(storage_path("app/public/certifications/{$document}"));
    }
}
