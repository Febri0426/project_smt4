<?php

namespace App\Http\Controllers; // Menunjukkan lokasi file controller

use Illuminate\Http\Request; // Mengambil data dari form

class ManagementUserController extends Controller
{
    // TAMBAHAN dari gambar (method index sederhana)
    public function index_text()
    {
        return "Halo ini adalah method index, dalam controller ManagementUser.";
    }


    // ACARA 6
    public function indexMahasiswa()
{
    $nama = "febri";
    $pelajaran = ["Algoritma & Pemrograman", "Workshop Mobile", "Pemrograman Web"];

    return view('tugas_lama', compact('nama', 'pelajaran'));
}


    // ACARA 4-5 (CRUD)
    public function index()
    {
        return "Method ini nantinya akan digunakan untuk mengambil semua data user";
    }
    
    public function create()
    {
        return "Method ini nantinya akan digunakan untuk menampilkan form untuk menambah data user";
    }

    public function store(Request $request)
    {
        return "Method ini nantinya akan digunakan untuk menciptakan data user baru";
    }

    public function show($id)
    {
        return "Method ini nantinya akan digunakan untuk mengambil satu data user dengan id=" . $id;
    }

    public function edit($id)
    {
        return "Method ini nantinya akan digunakan untuk menampilkan form untuk mengubah data edit dengan id=" . $id;
    }

    public function update(Request $request, $id)
    {
        return "Method ini nantinya akan digunakan untuk mengubah data user dengan id=" . $id;
    }

    public function destroy($id)
    {
        return "Method ini nantinya akan digunakan untuk menghapus data user dengan id=" . $id;
    }

}