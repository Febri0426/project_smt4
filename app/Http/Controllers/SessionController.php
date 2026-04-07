<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    // 1. Membuat Session
    public function create(Request $request) {
        $request->session()->put('nama', 'Politeknik Negeri Jember');
        return "Data telah ditambahkan ke session.";
    }

    // 2. Menampilkan Session
    public function show(Request $request) {
        if($request->session()->has('nama')) {
            return $request->session()->get('nama');
        }
        return "Tidak ada data dalam session.";
    }

    // 3. Menghapus Session ✨ TAMBAHKAN INI
    public function delete(Request $request) {
        $request->session()->forget('nama');
        return "Data telah dihapus dari session.";
    }
}