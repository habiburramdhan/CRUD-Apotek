<?php

namespace Database\Seeders;

// gunakan Illuminate\Database\Console\Seeds\WithoutModelEvents jika diperlukan
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Menyemai database aplikasi.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // Membuat 10 pengguna menggunakan factory

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Membuat satu pengguna dengan nama 'Test User' dan email 'test@example.com' menggunakan factory
    }
}
