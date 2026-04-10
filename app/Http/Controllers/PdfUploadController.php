<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfUploadController extends Controller
{
    public function pdf_upload()
    {
        return view('pdf_upload');
    }

    public function pdf_store(Request $request)
    {
        $file = $request->file('file');
        
        $fileName = time().'.'.$file->extension();
        
        $file->move(public_path('pdf/dropzone'), $fileName);
        
        return response()->json(['success' => $fileName, 'name' => $fileName]);
    }
}