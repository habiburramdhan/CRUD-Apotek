<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Pemetaan model ke kebijakan (policy) untuk aplikasi.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Di sini Anda dapat mendefinisikan hubungan antara model dan kebijakan (policy)
    ];

    /**
     * Mendaftarkan layanan otentikasi / otorisasi.
     */
    public function boot(): void
    {
        // Di sini Anda dapat mengatur layanan otentikasi dan otorisasi
    }
}


// Penjelasan:
// Namespace: App\Providers; — Menunjukkan bahwa file ini berada dalam direktori app/Providers.

// Menggunakan ServiceProvider:

// Kelas ini merupakan turunan dari ServiceProvider, yang memungkinkan Anda untuk mendefinisikan berbagai layanan dalam aplikasi Anda, khususnya untuk otentikasi dan otorisasi.
// $policies:

// Properti ini digunakan untuk mendefinisikan hubungan antara model dan kebijakan (policy) dalam aplikasi. Anda bisa mengaitkan model tertentu dengan kebijakan yang menangani aturan akses untuk model tersebut.
// Misalnya, jika Anda memiliki model Post, Anda dapat menentukan kebijakan yang sesuai untuk mengatur siapa yang dapat membuat, melihat, mengedit, atau menghapus posting tersebut.
// Saat ini, array ini kosong, tetapi Anda dapat menambahkannya dengan pasangan model dan kebijakan.
// Method boot():

// Method ini digunakan untuk mendaftarkan layanan otentikasi dan otorisasi saat aplikasi dijalankan.
// Di dalam method ini, Anda dapat mengatur kebijakan otorisasi, seperti mendefinisikan aturan akses menggunakan Gate (yang saat ini tidak aktif karena baris use Illuminate\Support\Facades\Gate; dikomentari).
// Method ini saat ini kosong, tetapi Anda dapat menambahkan logika untuk mengatur otentikasi dan otorisasi di sini.