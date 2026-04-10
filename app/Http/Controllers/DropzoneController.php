<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    public function dropzone()
    {
        return view('dropzone');
    }

    public function dropzone_store(Request $request)
    {
        $image = $request->file('file');
        
        $imageName = time().'.'.$image->extension();
        
        $image->move(public_path('img/dropzone'), $imageName);
        
        return response()->json(['success' => $imageName, 'name' => $imageName]);
    }
}