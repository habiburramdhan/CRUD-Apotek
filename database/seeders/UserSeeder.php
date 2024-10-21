<?php
// Mendeklarasikan bahwa file ini berada di dalam namespace Database\Seeders
namespace Database\Seeders;

use App\Models\User; // Mengimpor model User dari folder App\Models untuk digunakan pada proses seeding.
use Illuminate\Database\Console\Seeds\WithoutModelEvents; // Mengimpor class ini untuk mencegah event listener dijalankan selama seeding.
use Illuminate\Database\Seeder; // Mengimpor class Seeder yang merupakan bagian dari Laravel untuk membuat seeder.
use Illuminate\Support\Facades\Hash; // Mengimpor facade Hash untuk mengenkripsi password.
use Illuminate\Support\Facades\Auth; // Mengimpor facade Auth, meskipun tidak digunakan dalam kode ini.

class UserSeeder extends Seeder // Mendefinisikan class UserSeeder yang merupakan turunan dari class Seeder.
{
    /**
     * Menjalankan seed untuk memasukkan data pengguna ke dalam tabel `users`.
     */
    public function run(): void // Fungsi `run` yang akan dipanggil saat menjalankan perintah seeding.
    {
        // Membuat user pertama dengan peran 'admin'.
        User::create([ // Memanggil method `create` dari model User untuk menambahkan data user baru.
            'name' => 'Administrator', // Nama user 'Administrator'.
            'email' => 'apotek_admin@gmail.com', // Email user 'Administrator'.
            'password' => Hash::make('adminapotek'), // Password dienkripsi dengan Hash::make.
            'role' => 'admin', // Menetapkan role sebagai 'admin'.
        ]);

        // Membuat user kedua dengan peran 'user'.
        User::create([ // Memanggil method `create` lagi untuk user baru dengan role 'user'.
            'name' => 'kasir', // Nama user 'kasir'.
            'email' => 'kasir_apotek@gmail.com', // Email user 'kasir'.
            'password' => Hash::make('kasirapotek'), // Password dienkripsi menggunakan Hash::make.
            'role' => 'user', // Menetapkan role sebagai 'user'.
        ]);
    }
}
