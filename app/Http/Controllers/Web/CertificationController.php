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
    
        if($request->document_url){
            $path = $request->file('document_url')->store('certifications', 'public');
            $request->document_url = $path;
        }

        Certification::create($request->all());

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
        $rules = [
            'certification' => 'required',
            'institution' => 'required',
            'granted_on' => 'required',
            'valid_on' => 'required',
            'document_url' => 'sometimes|file|image|mimes:jpeg,png|max:300'
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
            $path = $request->file('document_url')->store('certifications', 'public');
            $request->document_url = $path;
        }

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
        return redirect()->route('certification.index');
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
