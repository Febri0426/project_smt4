<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Memanggil file dashboard.blade.php di folder resources/views/backend/
        return view('backend.dashboard');
    }
}