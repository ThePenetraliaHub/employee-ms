<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $files = File::orderBy('id', 'asc')->paginate(10);
        return view('pages.admin.files.gen-list', ['files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.files.gen-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'number' => 'required|unique:files,number',
            'name' => 'required|unique:files,name'
        ];

        $customMessages = [
            'number.required' => 'Please provide the file\'s number.',
            'number.unique' => 'File Number already exist.',
            'name.required' => 'Please provide the file\'s name.',
            'name.unique' => 'File name already exist.'
        ];

        $this->validate($request, $rules, $customMessages); 

        File::create($request->all());

        notify()->success("Successfully created!","","bottomRight");

        return redirect('files');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return view('pages.admin.files.gen-edit', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $file = File::findOrFail($id);
        return view('pages.admin.files.gen-edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file){
        $rules = [
            'number' => [
                'required',
                Rule::unique('files')->ignore($file->id),
            ],
            'name' => [
                'required',
                Rule::unique('files')->ignore($file->id),
            ],
        ];

        $customMessages = [
            'number.required' => 'Please provide the file\'s number.',
            'number.unique' => 'File number already exist.',
            'name.required' => 'Please provide the file\'s name.',
            'name.unique' => 'File name already exist.'
        ];

        $this->validate($request, $rules, $customMessages);

        $file->update($request->all());

        notify()->success("Successfully Updated!","","bottomRight");
        //return redirect()->route('files.show',$file->id);
        return redirect()->route('files.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();

        notify()->success("Successfully Deleted!","","bottomRight");
        return redirect('files');
    }
}
