<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data dari tabel pendidikan
        $pendidikans = Pendidikan::all(); 
        
        // Kirim data ke view
        return view('backend.pendidikan.index', compact('pendidikans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pendidikan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pendidikan::create($request->all());
        
        return redirect()->route('pendidikan.index')
                ->with('success', 'Data Pendidikan baru telah berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        return view('backend.pendidikan.show', compact('pendidikan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        return view('backend.pendidikan.edit', compact('pendidikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->update($request->all());
        
        return redirect()->route('pendidikan.index')
                ->with('success', 'Data Pendidikan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->delete();
        
        return redirect()->route('pendidikan.index')
                ->with('success', 'Data Pendidikan berhasil dihapus.');
    }
}