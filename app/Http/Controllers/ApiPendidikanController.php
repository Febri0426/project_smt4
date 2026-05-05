<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendidikan;
use Illuminate\Http\Response;

class ApiPendidikanController extends Controller
{
    /**
     * GET: Menampilkan semua data pendidikan
     */
    public function index()
    {
        $pendidikan = Pendidikan::all();
        
        return response()->json([
            'success' => true,
            'data' => $pendidikan
        ], 200);
    }

    /**
     * GET: Menampilkan data berdasarkan ID
     */
    public function show($id)
    {
        $pendidikan = Pendidikan::find($id);
        
        if (!$pendidikan) {
            return response()->json([
                'success' => false,
                'message' => 'Data Pendidikan tidak ditemukan'
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'data' => $pendidikan
        ], 200);
    }

    /**
     * POST: Menyimpan data baru
     */
    public function createPen(Request $request)
    {
        // 1. Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkat' => 'required|string|max:50',
            'tahun_masuk' => 'required|integer|digits:4',
            'tahun_keluar' => 'required|integer|digits:4',
        ]);

        // 2. Simpan data ke database
        // Gunakan $request->all() hanya jika $fillable di Model sudah benar
        $pendidikan = Pendidikan::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data pendidikan berhasil ditambahkan',
            'data' => $pendidikan
        ], 201);
    }

    /**
     * PUT/PATCH: Mengupdate data
     */
    public function updatePen(Request $request, $id)
    {
        $pendidikan = Pendidikan::find($id);
        
        if (!$pendidikan) {
            return response()->json([
                'success' => false,
                'message' => 'Data Pendidikan tidak ditemukan'
            ], 404);
        }

        // Update data
        $pendidikan->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data pendidikan berhasil diubah',
            'data' => $pendidikan
        ], 200);
    }

    /**
     * DELETE: Menghapus data
     */
    public function deletePen($id)
    {
        $pendidikan = Pendidikan::find($id);
        
        if (!$pendidikan) {
            return response()->json([
                'success' => false,
                'message' => 'Data Pendidikan tidak ditemukan'
            ], 404);
        }

        $pendidikan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data pendidikan berhasil dihapus'
        ], 200);
    }
}