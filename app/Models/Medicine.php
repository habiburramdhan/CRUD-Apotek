<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory; // Menggunakan trait HasFactory untuk mendukung penggunaan factory di Laravel.

    // Kolom yang diizinkan untuk diisi secara massal (mass assignment)
    protected $fillable = [
        'type',   // Jenis obat (misalnya: tablet, kapsul, sirup, dll.)
        'name',   // Nama obat
        'price',  // Harga obat
        'stock'   // Jumlah stok obat
    ];
}


// Penjelasan:
// Namespace: App\Models; — File ini berada dalam direktori app/Models.

// use HasFactory:

// Trait HasFactory memungkinkan Anda untuk membuat data dummy atau seeding menggunakan factory Laravel. Hal ini memudahkan pengujian atau pengisian data dummy.
// Kelas Medicine:

// Kelas ini mewarisi dari Model, yang berarti bahwa Medicine adalah representasi dari tabel yang berhubungan dengan database dan menggunakan ORM Eloquent untuk berinteraksi dengan data.
// $fillable:

// Array ini menentukan kolom yang diizinkan untuk mass assignment, yaitu ketika input data diisikan secara massal seperti pada create() atau update(). Properti ini melindungi aplikasi dari serangan Mass Assignment Vulnerability.
// Kolom fillable:
// type: Menyimpan jenis obat (misalnya: kapsul, tablet, sirup).
// name: Nama obat yang disimpan.
// price: Harga obat dalam format numerik.
// stock: Stok obat yang tersedia.
// Jika ada yang perlu ditambahkan atau diubah, beri tahu saya!