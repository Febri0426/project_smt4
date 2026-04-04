<?php

namespace App\Http\Middleware;

use Closure;

class BeforeMiddleware
{
    public function handle($request, Closure $next)
    {
        // ✅ Lakukan sesuatu SEBELUM request diproses
        echo "<div style='background: yellow; padding: 10px; margin: 10px;'>
                [BEFORE] Request diterima: " . $request->url() . 
              "</div>";
        
        return $next($request);
    }
}