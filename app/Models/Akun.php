<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;
    
    // Properti $fillable berfungsi untuk mengizinkan mass assignment.
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
    ];
}

// Penjelasan:
// 1.Namespace: App\Models; — Menunjukkan bahwa file ini berada di dalam folder app/Models.

// 2.use Illuminate\Database\Eloquent\Factories\HasFactory:
// Trait ini digunakan untuk mempermudah pembuatan instance model menggunakan factory di Laravel.

// 3.use Illuminate\Database\Eloquent\Model:
// Kelas Akun mewarisi dari Model, yang memungkinkan model ini untuk terhubung dengan tabel database dan memanfaatkan semua fitur Eloquent ORM.

// 4.$fillable:
// Properti ini berisi array dari kolom yang dapat diisi secara massal menggunakan metode seperti create atau update. Ini melindungi aplikasi dari serangan Mass Assignment Vulnerability, memastikan hanya kolom yang diizinkan yang dapat diisi dari input pengguna.

// Properti fillable yang diizinkan:
// nama: Nama pengguna akun.
// email: Email pengguna akun.
// password: Password untuk otentikasi akun.
// role: Peran pengguna, misalnya admin atau user.