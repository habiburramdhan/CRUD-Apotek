<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit; // Mengimpor kelas Limit untuk pengaturan pembatasan laju
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider; // Mengimpor kelas dasar RouteServiceProvider
use Illuminate\Http\Request; // Mengimpor kelas Request
use Illuminate\Support\Facades\RateLimiter; // Mengimpor facade RateLimiter untuk mengatur pembatasan laju
use Illuminate\Support\Facades\Route; // Mengimpor facade Route untuk mendefinisikan rute

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home'; // Konstanta untuk rute home aplikasi

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        // Mengatur pembatasan laju untuk rute API
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
            // Mengatur pembatasan maksimum 60 permintaan per menit
            // berdasarkan ID pengguna yang sedang login atau alamat IP jika pengguna tidak terautentikasi
        });

        // Mendefinisikan rute aplikasi
        $this->routes(function () {
            // Rute untuk API
            Route::middleware('api')
                ->prefix('api') // Menggunakan prefix 'api' untuk semua rute di grup ini
                ->group(base_path('routes/api.php')); // Menggunakan file routes/api.php untuk mendefinisikan rute

            // Rute untuk web
            Route::middleware('web')
                ->group(base_path('routes/web.php')); // Menggunakan file routes/web.php untuk mendefinisikan rute
        });
    }
}
