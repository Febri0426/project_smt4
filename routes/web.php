<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Backend\DashboardController;

// IMPORT CONTROLLER AUTH - WAJIB ADA SEMUA
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ConfirmPasswordController;

// Home Controller untuk member area
use App\Http\Controllers\HomeController;
// Pengalaman Kerja Controller
use App\Http\Controllers\Backend\PengalamanKerjaController;
// Pendidikan Controller
use App\Http\Controllers\Backend\PendidikanController;
// Session Routes
use App\Http\Controllers\SessionController;
// Pegawai Controller
use App\Http\Controllers\PegawaiController;
// Coba Controller
use App\Http\Controllers\CobaController;
// Upload Controller (jika diperlukan untuk acara upload file)
use App\Http\Controllers\UploadController;
// Dropzone Controller (jika diperlukan untuk acara upload file dengan Dropzone)
use App\Http\Controllers\DropzoneController;
// PDF Upload Controller (jika diperlukan untuk acara upload file PDF)
use App\Http\Controllers\PdfUploadController;

// =================================================================
// ACARA 3 - Routing Dasar
// =================================================================
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('user/nama/{name?}', function ($name = 'John') {
    return $name;
});

Route::get('user/{id}', function ($id) {
    return 'User '.$id;
})->where('id', '[0-9]+');

Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return "Post ID: $postId, Comment ID: $commentId";
});

Route::get('nama/{name?}', function ($name = null) {
    return $name;
});

Route::redirect('/here', '/there');

Route::get('/there', function () {
    return 'Halaman Tujuan Redirect';
});

Route::view('/welcome_laravel', 'welcome');

Route::get('user/profile/{name}', function ($name) {
    return "Profil Nama: $name";
})->where('name', '[A-Za-z]+');

Route::get('user/id/{id}', function ($id) {
    return "User ID: $id";
})->where('id', '[0-9]+');

// =================================================================
// ACARA 5 - Resource Controller
// =================================================================
Route::resource('management-user', ManagementUserController::class);

// =================================================================
// ACARA 6 - Custom Route
// =================================================================
Route::get('/user', [ManagementUserController::class, 'indexMahasiswa'])
    ->name('user.index');

// =================================================================
// ACARA 7 - Frontend Home
// =================================================================
Route::get('/home-frontend', [FrontendHomeController::class, 'index'])
    ->name('home.frontend');

// =================================================================
// ACARA 8 - Backend Dashboard (Admin)
// =================================================================
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard.index')
    ->middleware('auth');

// =================================================================
// ACARA 13 - CRUD Pengalaman Kerja
// =================================================================
Route::resource('pengalaman_kerja', PengalamanKerjaController::class)->middleware('auth');

// =================================================================
//ACARA 15 - Pendidikan CRUD
Route::resource('pendidikan', PendidikanController::class);
    
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Auth::routes();

// --- LOGIN ---
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

// --- LOGOUT ---
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// --- REGISTER ---
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// --- PASSWORD RESET ---
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// --- EMAIL VERIFICATION ---
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

// --- PASSWORD CONFIRMATION ---
Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);


// =================================================================
// ACARA 11 - Member Area
// =================================================================
Route::get('/member-area', [HomeController::class, 'index'])
    ->name('home')  // Name 'home' agar redirect login berfungsi
    ->middleware('auth');

// =================================================================
// ACARA 17 - Session dan Request
// =================================================================

Route::get('/session/create', [SessionController::class, 'create']);
Route::get('/session/show', [SessionController::class, 'show']);
Route::get('/session/delete', [SessionController::class, 'delete']);

// =================================================================
// - Pegawai Route (acara 17,18)
// =================================================================
Route::get('/pegawai/{nama}', [PegawaiController::class, 'index']);
Route::get('/formulir', [PegawaiController::class, 'formulir'])->name('formulir.index');
Route::post('/formulir/proses', [PegawaiController::class, 'proses'])->name('formulir.proses');

// Route untuk testing error handling dengan segment (acara 18)
Route::get('/cobaerror/{segment?}', [CobaController::class, 'index']);

// =================================================================
// ACARA 19 - Upload File 
// =================================================================
Route::get('/upload', [UploadController::class, 'index'])->name('upload');
Route::post('/upload/proses', [UploadController::class, 'upload'])->name('upload.proses');
Route::post('/upload/resize', [UploadController::class, 'upload_resize'])->name('upload.resize');
// ACARA 20 - Route untuk testing upload dengan Dropzone 
Route::get('/dropzone', [DropzoneController::class, 'dropzone']);
Route::post('/dropzone/store', [DropzoneController::class, 'dropzone_store'])->name('dropzone.store');
// ACARA 20 - Route untuk testing upload PDF 
Route::get('/pdf/upload', [PdfUploadController::class, 'pdf_upload']);
Route::post('/pdf/store', [PdfUploadController::class, 'pdf_store'])->name('pdf.store');


// =================================================================
// FALLBACK ROUTE (404)
// =================================================================
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

// Route untuk testing error handling
Route::get('/test-error/{kode?}', function($kode = null) {
    if ($kode == '404') {
        abort(404, 'Halaman tidak ditemukan');
    } elseif ($kode == '403') {
        abort(403, 'Akses ditolak');
    } elseif ($kode == '500') {
        abort(500, 'Terjadi kesalahan server');
    }
    return 'Tidak ada error - silakan coba /test-error/404';
});

//acara12
// --- 1. Test CheckAge Middleware ---
Route::get('/profile', function () {
    return view('profile', ['message' => 'Selamat datang di Profile!']);
})->middleware('check.age');

// Route redirect untuk CheckAge (jika age <= 200)
Route::get('/home', function () {
    return 'Halaman Home - Akses Ditolak!';
})->name('home.redirect');  

// --- 2. Test Before & After Middleware ---
Route::get('/test-middleware', function () {
    return '<div style="background: lightblue; padding: 20px; margin: 10px;">
            [CONTROLLER] Halaman ini diproses oleh controller
            </div>';
})->middleware(['before', 'after']);

// --- 3. Test CheckRole Middleware (Individual) ---
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin']);

Route::get('/user/profile', function () {
    return view('user.profile');
})->middleware(['auth', 'role:user']);

Route::get('/moderator/panel', function () {
    return 'Moderator Panel';
})->middleware(['auth', 'role:moderator']);

// --- 4. Test Middleware Groups ---

// Group 'admin'
Route::middleware('admin')->group(function () {
    Route::get('/admin/users', function () {
        return view('admin.users');
    })->name('admin.users');
    
    Route::get('/admin/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');
});

// Group 'user'
Route::middleware('user')->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
    
    Route::get('/user/settings', function () {
        return view('user.settings');
    })->name('user.settings');
});

// --- 5. Test Log Request Middleware ---
Route::get('/logged-page', function () {
    return 'Halaman ini akan di-log setelah response dikirim';
})->middleware('log.request');