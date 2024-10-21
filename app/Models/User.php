<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // Menggunakan beberapa trait untuk menambahkan fungsionalitas pada model ini.

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',      // Nama pengguna
        'email',     // Email pengguna
        'password',  // Password pengguna
        'role',      // Peran pengguna (misalnya: admin, user)
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',        // Menyembunyikan password dari output JSON
        'remember_token',  // Token untuk mengingat sesi pengguna
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // Mengonversi kolom ini menjadi tipe datetime
        'password' => 'hashed',             // Menyimpan password dalam bentuk hashed
    ];
}

// Penjelasan:
// Namespace: App\Models; — Menunjukkan bahwa file ini berada dalam direktori app/Models.

// Menggunakan Trait:

// HasApiTokens: Memungkinkan penggunaan token API untuk otentikasi menggunakan Laravel Sanctum.
// HasFactory: Memungkinkan penggunaan factory untuk membuat data dummy.
// Notifiable: Menyediakan kemampuan untuk mengirim notifikasi ke pengguna.
// $fillable:

// Properti ini mendefinisikan atribut yang dapat diisi secara massal, yang mengizinkan input dari pengguna untuk diisi langsung ke dalam model.
// Atribut yang dapat diisi meliputi:
// nama: Nama pengguna.
// email: Alamat email pengguna.
// password: Password untuk otentikasi.
// role: Peran pengguna di dalam aplikasi (misalnya: admin atau user).
// $hidden:

// Menentukan atribut yang tidak akan ditampilkan ketika model dikonversi menjadi array atau JSON, untuk alasan keamanan.
// Atribut yang disembunyikan meliputi:
// password: Tidak ditampilkan dalam output untuk mencegah kebocoran data.
// remember_token: Token sesi untuk mengingat pengguna.
// $casts:

// Mendefinisikan konversi tipe untuk atribut tertentu saat menyimpan dan mengambil dari database.
// Atribut yang dicast meliputi:
// email_verified_at: Mengonversi nilai ini menjadi objek datetime.
// password: Menyimpan password dalam bentuk yang di-hash, meningkatkan keamanan.