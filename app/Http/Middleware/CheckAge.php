<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Ambil parameter 'age' dari URL
        $age = $request->input('age');
        
        // Cek jika usia <= 200, redirect ke home
        if ($age <= 200) {
            return redirect('home')->with('error', 'Usia harus lebih dari 200 tahun!');
        }
        
        // Jika usia > 200, lanjutkan request
        return $next($request);
    }
}