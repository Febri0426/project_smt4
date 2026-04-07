<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    // Method untuk menampilkan form
    public function formulir()
    {
        return view('formulir');
    }

    // Method untuk memproses form dengan validation
    public function proses(Request $request)
    {
        // 🔹 Custom error messages (opsional)
        $messages = [
            'nama.required' => 'Nama lengkap wajib diisi',
            'nama.min' => 'Nama minimal harus :min karakter',
            'nama.max' => 'Nama maksimal :max karakter',
            'alamat.required' => 'Alamat wajib diisi',
            'alamat.min' => 'Alamat minimal harus :min karakter',
        ];

        // 🔹 Validasi input
        $this->validate($request, [
            'nama' => 'required|min:5|max:50|alpha_num',
            'alamat' => 'required|min:10|max:255',
            'email' => 'nullable|email',
            'umur' => 'nullable|numeric|min:18|max:60',
        ], $messages);

        // 🔹 Jika validasi lolos, ambil data
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $email = $request->input('email');
        $umur = $request->input('umur');

        // 🔹 Simpan ke session (contoh)
        $request->session()->put('pegawai_data', [
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'umur' => $umur,
        ]);

        // 🔹 Redirect dengan success message
        return redirect()->back()->with('success', 'Data berhasil dikirim!');
    }
}