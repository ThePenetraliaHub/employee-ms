<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class DownloadDocumentController extends Controller
{
    public function index()
    {
      
    }

    public function create($document)
    {
    	dd($document);
      return response()->download(storage_path("app/public/certifications/{$document}"))->back();

        // view("files.download", compact('$download'));
    }

    public function store(Request $request)
    {
        
   
    }

     public function show($id)
    {

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
