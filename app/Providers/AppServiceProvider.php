<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Mendaftarkan layanan aplikasi.
     */
    public function register(): void
    {
        // Di sini Anda dapat mendaftarkan layanan yang diperlukan untuk aplikasi
    }

    /**
     * Menyiapkan layanan aplikasi.
     */
    public function boot(): void
    {
        // Di sini Anda dapat menjalankan logika yang diperlukan saat aplikasi dijalankan
    }
}
