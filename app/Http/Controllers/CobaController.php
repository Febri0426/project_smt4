<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function index(Request $request)
    {
        // Ambil segment ke-2 dari URL
        $segment = $request->segment(2) ?? null;

        // Jika segment kosong, tampilkan 404
        if ($segment == null) {
            abort(404);
        } else {
            // Jika ada segment, tampilkan isinya
            return "Segment: " . $segment;
        }
    }
}