<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered; // Mengimpor event Registered
use Illuminate\Auth\Listeners\SendEmailVerificationNotification; // Mengimpor listener untuk mengirim email verifikasi
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider; // Mengimpor kelas dasar untuk EventServiceProvider
use Illuminate\Support\Facades\Event; // Mengimpor facade Event

class EventServiceProvider extends ServiceProvider
{
    /**
     * Pemetaan event ke listener untuk aplikasi.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class, // Mendengarkan event Registered
        ],
    ];

    /**
     * Mendaftarkan event untuk aplikasi Anda.
     */
    public function boot(): void
    {
        // Tempat untuk menjalankan logika saat provider boot
    }

    /**
     * Menentukan apakah event dan listener harus ditemukan secara otomatis.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false; // Menentukan bahwa penemuan otomatis dinonaktifkan
    }
}
