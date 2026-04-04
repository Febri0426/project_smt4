<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role  (admin, user, moderator, dll)
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }
        
        // Cek apakah user memiliki role yang sesuai
        // Asumsi: tabel users memiliki kolom 'role'
        if (Auth::user()->role !== $role) {
            abort(403, 'Unauthorized action. Anda tidak memiliki akses.');
        }
        
        return $next($request);
    }
}