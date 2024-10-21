<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Menyiapkan layanan aplikasi.
     */
    public function boot(): void
    {
        // Mendaftarkan rute untuk siaran
        Broadcast::routes();

        // Memuat definisi saluran dari file routes/channels.php
        require base_path('routes/channels.php');
    }
}


