<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/member-area';

    /**
     * ❌ JANGAN gunakan property $namespace ketika pakai [Controller::class, 'method']
     * protected $namespace = 'App\\Http\\Controllers'; // <-- HAPUS/KOMENTARI INI
     */

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             // ❌ HAPUS ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             // ❌ HAPUS ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}