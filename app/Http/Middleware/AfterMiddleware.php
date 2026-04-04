<?php

namespace App\Http\Middleware;

use Closure;

class AfterMiddleware
{
    public function handle($request, Closure $next)
    {
        // Lanjutkan request dulu
        $response = $next($request);
        
        // ✅ Lakukan sesuatu SETELAH request diproses
        echo "<div style='background: lightgreen; padding: 10px; margin: 10px;'>
                [AFTER] Response dikirim
              </div>";
        
        return $response;
    }
}