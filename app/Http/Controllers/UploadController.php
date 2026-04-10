<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    // Tampilan form upload
    public function index()
    {
        return view('upload');
    }

    // Proses upload file
    public function upload(Request $request)
    {
        // Validasi file
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'required'
        ]);

        // Upload file
        $file = $request->file('file');
        
        // Buat nama file random dengan extension
        $nama_file = rand().$file->getClientOriginalName();
        
        // Pindahkan file ke folder public/file_uploads
        $file->move(public_path('file_uploads'), $nama_file);

        // Simpan ke database (opsional)
        DB::table('files')->insert([
            'nama_file' => $nama_file,
            'keterangan' => $request->keterangan,
            'created_at' => now()
        ]);

        return redirect()->back()->with('success', 'Berhasil upload file, nama file: '.$nama_file);
    }

    // Proses upload dengan resize gambar
    public function upload_resize(Request $request)
    {
        // Validasi file
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'required'
        ]);

        // Upload file
        $file = $request->file('file');
        
        // Buat nama file
        $nama_file = time()."_".$file->getClientOriginalName();

        // Manipulasi gambar dengan Intervention Image
        $image = \Image::make($file->getRealPath());
        
        // Resize gambar menjadi 200x200
        $image->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        });

        // Simpan ke folder public/img/logo
        $image->save(public_path('img/logo/'.$nama_file));

        // Simpan ke database (opsional)
        DB::table('files')->insert([
            'nama_file' => $nama_file,
            'keterangan' => $request->keterangan,
            'created_at' => now()
        ]);

        return redirect()->back()->with('success', 'Berhasil upload dan resize gambar, nama file: '.$nama_file);
    }
}