<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Tumpukan middleware global aplikasi.
     *
     * Middleware ini dijalankan selama setiap permintaan ke aplikasi Anda.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class, 
        // Middleware untuk mengelola proxy yang dapat dipercaya, seperti AWS ELB atau Heroku.
        
        \Illuminate\Http\Middleware\HandleCors::class, 
        // Middleware untuk menangani kebijakan CORS (Cross-Origin Resource Sharing).

        \App\Http\Middleware\PreventRequestsDuringMaintenance::class, 
        // Middleware ini mencegah permintaan saat aplikasi dalam mode pemeliharaan.

        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class, 
        // Memvalidasi ukuran maksimum dari data POST yang dikirim ke server.

        \App\Http\Middleware\TrimStrings::class, 
        // Menghapus spasi berlebihan dari string input pengguna.

        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class, 
        // Mengubah string kosong menjadi null sebelum memproses input data.
    ];

    /**
     * Grup middleware untuk rute.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            // Middleware untuk mengenkripsi cookie.

            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            // Menambahkan cookie ke antrian dan memasukkannya ke dalam respons HTTP.

            \Illuminate\Session\Middleware\StartSession::class,
            // Memulai sesi untuk pengguna (digunakan untuk menyimpan data sementara seperti login).

            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            // Membagikan pesan error dari sesi ke view (misal: form validation).

            \App\Http\Middleware\VerifyCsrfToken::class,
            // Middleware untuk memverifikasi token CSRF pada permintaan POST untuk mencegah serangan CSRF.

            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            // Mengganti wildcard rute dengan model yang sesuai (route-model binding).
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
            // Membatasi jumlah permintaan API dari satu IP untuk mencegah flood requests (rate limiting).

            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            // Sama seperti pada grup web, melakukan substitusi binding rute dengan model yang sesuai.
        ],
    ];

    /**
     * Alias middleware aplikasi.
     *
     * Alias dapat digunakan sebagai pengganti nama class untuk memudahkan penugasan middleware pada rute dan grup.
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        // Middleware untuk memastikan pengguna telah terautentikasi.

        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        // Menggunakan HTTP Basic Authentication untuk melindungi rute.

        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        // Middleware untuk mengautentikasi sesi pengguna.

        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        // Middleware untuk mengatur header cache pada respons.

        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        // Memeriksa apakah pengguna memiliki otorisasi untuk melakukan tindakan tertentu (misal: peran atau izin).

        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        // Middleware untuk mengalihkan pengguna yang sudah login ke halaman tertentu (biasanya dashboard).

        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        // Memaksa pengguna untuk mengonfirmasi kata sandinya sebelum melakukan tindakan sensitif (seperti menghapus akun).

        'precognitive' => \Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests::class,
        // Middleware untuk menangani permintaan prediktif (digunakan untuk UI responsif seperti validasi instan).

        'signed' => \App\Http\Middleware\ValidateSignature::class,
        // Memverifikasi bahwa URL telah ditandatangani dengan benar dan belum kedaluwarsa.

        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        // Middleware untuk membatasi jumlah permintaan yang dapat dilakukan pengguna dalam waktu tertentu (misal: untuk mencegah DDoS).

        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        // Middleware untuk memastikan bahwa email pengguna telah diverifikasi sebelum mengakses rute tertentu.

        'IsLogin' => \App\Http\Middleware\IsLogin::class,
        // Custom middleware untuk memeriksa apakah pengguna telah login.

        'isGuest' => \App\Http\Middleware\IsGuest::class,
        // Custom middleware untuk memastikan pengguna yang belum login.

        'isAdmin' => \App\Http\Middleware\IsAdmin::class,
        // Custom middleware untuk memastikan bahwa pengguna adalah admin.
    ];
}
