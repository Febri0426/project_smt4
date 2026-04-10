<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendidikan;
use Illuminate\Http\Response;

class ApiPendidikanController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'API Pendidikan berhasil diakses'
        ], 200);
    }
    
    // Fungsi untuk mendapatkan data berdasarkan ID (GET)
    public function getPen($id)
    {
        $pendidikan = Pendidikan::find($id);
        
        if (!$pendidikan) {
            return response()->json([
                'success' => false,
                'message' => 'Data Pendidikan tidak ditemukan'
            ], 404);
        }
        
        return Response::json($pendidikan, 200);
    }
    
    // Fungsi untuk membuat data baru (POST)
    public function createPen(Request $request)
    {
        $pendidikan = Pendidikan::create($request->all());
        
        return response()->json([
            'status' => 'ok',
            'message' => 'Pendidikan berhasil ditambahkan!'
        ], 201);
    }
    
    // Fungsi untuk update data (PUT)
    public function updatePen($id, Request $request)
    {
        $pendidikan = Pendidikan::find($id);
        
        if (!$pendidikan) {
            return response()->json([
                'success' => false,
                'message' => 'Data Pendidikan tidak ditemukan'
            ], 404);
        }
        
        $pendidikan->update($request->all());
        
        return response()->json([
            'success' => true,
            'message' => 'Pendidikan berhasil diubah!'
        ], 200);
    }
    
    // Fungsi untuk menghapus data (DELETE)
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
            'message' => 'Pendidikan berhasil dihapus!'
        ], 200);
    }
    
    // Fungsi store yang sudah ada (bisa tetap digunakan)
    public function store(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambahkan'
        ], 201);
    }
}