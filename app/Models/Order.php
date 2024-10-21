<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory; // Menggunakan trait HasFactory untuk mendukung pembuatan data dummy atau seeding menggunakan factory di Laravel.
}

// Penjelasan:
// Namespace: App\Models; — Model ini berada dalam direktori app/Models.

// use HasFactory:

// Trait HasFactory memungkinkan model Order ini digunakan bersama dengan factory untuk menghasilkan data palsu (dummy data) selama pengujian atau seeding. Ini sangat berguna saat Anda perlu mengisi database dengan data simulasi.
// Kelas Order:

// Kelas ini merupakan turunan dari kelas Model, yang berarti bahwa Order adalah representasi dari tabel yang berhubungan dengan database. Kelas ini menggunakan Eloquent ORM untuk mempermudah interaksi dengan database, seperti pengambilan dan penyimpanan data.
// Note:
// Kode ini masih sangat sederhana dan belum memiliki properti seperti $fillable atau relasi apapun dengan model lain.
// Biasanya, pada model Order, akan ada properti tambahan seperti fillable untuk mengizinkan kolom tertentu dalam proses mass assignment, atau relasi dengan model lain (misalnya: hubungan dengan pengguna atau produk).