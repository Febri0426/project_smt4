<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    // Menampilkan view dropzone
    public function dropzone()
    {
        return view('dropzone');
    }

    // Memproses upload + resize gambar
    public function dropzone_store(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);

        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();

        // ⭐ PROSES RESIZE DENGAN INTERVENTION IMAGE
        $img = \Image::make($image->getRealPath());
        $img->resize(200, 200); // Resize ke 200x200
        
        // Simpan ke folder public/img/dropzone/
        $img->save(public_path('img/dropzone/' . $imageName));
        
        return response()->json([
            'success' => $imageName, 
            'name' => $imageName,
            'message' => 'File berhasil diupload dan diresize!'
        ]);
    }
}