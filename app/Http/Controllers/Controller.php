<?php

namespace App\Http\Controllers; 
// Namespace untuk mengorganisir dan memastikan class Controller ini tidak bentrok dengan class lain yang mungkin memiliki nama yang sama.

use Illuminate\Foundation\Auth\Access\AuthorizesRequests; 
// Mengimpor trait AuthorizesRequests untuk menangani otorisasi pengguna dalam aplikasi, misalnya otorisasi berdasarkan role.

use Illuminate\Foundation\Validation\ValidatesRequests; 
// Mengimpor trait ValidatesRequests untuk menangani validasi data, memastikan bahwa input yang diterima sesuai dengan aturan validasi yang telah ditentukan.

use Illuminate\Routing\Controller as BaseController; 
// Mengimpor class BaseController yang menjadi class induk dari Controller ini. BaseController menyediakan fungsi dasar yang umum digunakan oleh semua controller di Laravel.

class Controller extends BaseController 
// Mendefinisikan class Controller yang akan digunakan sebagai base untuk semua controller lain di aplikasi.
{
    use AuthorizesRequests, ValidatesRequests; 
    // Menggunakan (meng-include) dua trait: 
    // - AuthorizesRequests untuk otorisasi pengguna.
    // - ValidatesRequests untuk validasi data input di controller ini atau yang mewarisi class ini.
}
