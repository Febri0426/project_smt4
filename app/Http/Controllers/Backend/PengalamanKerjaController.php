<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;  // ← PENTING: Query Builder
use Illuminate\Http\Request;

class PengalamanKerjaController extends Controller
{
    /**
     * Menampilkan daftar pengalaman kerja (READ)
     */
    public function index()
    {
        // Menggunakan Query Builder untuk mengambil semua data
        $pengalaman_kerja = DB::table('pengalaman_kerja')->get();
        
        return view('backend.pengalaman_kerja.index', compact('pengalaman_kerja'));
    }

    /**
     * Menampilkan form create (CREATE - Form)
     */
    public function create()
    {
        return view('backend.pengalaman_kerja.create');
    }

    /**
     * Menyimpan data ke database (CREATE - Store)
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'tahun_masuk' => 'required|numeric',
            'tahun_keluar' => 'required|numeric',
        ]);

        // Menggunakan Query Builder untuk insert data
        DB::table('pengalaman_kerja')->insert([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('pengalaman_kerja.index')
                        ->with('success', 'Data pengalaman kerja berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail pengalaman kerja (READ - Show)
     */
    public function show($id)
    {
        $pengalaman_kerja = DB::table('pengalaman_kerja')->where('id', $id)->first();
        
        return view('backend.pengalaman_kerja.show', compact('pengalaman_kerja'));
    }

    /**
     * Menampilkan form edit (UPDATE - Form)
     */
    public function edit($id)
    {
        $pengalaman_kerja = DB::table('pengalaman_kerja')->where('id', $id)->first();
        
        return view('backend.pengalaman_kerja.edit', compact('pengalaman_kerja'));
    }

    /**
     * Update data di database (UPDATE - Store)
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'tahun_masuk' => 'required|numeric',
            'tahun_keluar' => 'required|numeric',
        ]);

        // Menggunakan Query Builder untuk update data
        DB::table('pengalaman_kerja')
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'tahun_masuk' => $request->tahun_masuk,
                'tahun_keluar' => $request->tahun_keluar,
                'updated_at' => now(),
            ]);

        return redirect()->route('pengalaman_kerja.index')
                        ->with('success', 'Data pengalaman kerja berhasil diupdate!');
    }

    /**
     * Hapus data dari database (DELETE)
     */
    public function destroy($id)
    {
        // Menggunakan Query Builder untuk delete data
        DB::table('pengalaman_kerja')->where('id', $id)->delete();

        return redirect()->route('pengalaman_kerja.index')
                        ->with('success', 'Data pengalaman kerja berhasil dihapus!');
    }
}