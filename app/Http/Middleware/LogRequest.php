<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogRequest
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        // Lanjutkan request ke aplikasi
        return $next($request);
    }

    /**
     * ✅ METHOD INI YANG MENJALANKAN LOG SETELAH RESPONSE DIKIRIM
     * Handle tasks after the response has been sent to the browser.
     */
    public function terminate($request, $response)
    {
        // Tulis log ke file storage/logs/laravel.log
        Log::info('Terminable Middleware Log', [
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'user' => $request->user() ? $request->user()->name : 'Guest',
            'timestamp' => now(),
        ]);
    }
}