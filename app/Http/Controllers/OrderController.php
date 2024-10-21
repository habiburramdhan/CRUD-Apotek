<?php

namespace App\Http\Controllers;
// Namespace digunakan untuk mengorganisir controller ini dan menghindari bentrokan dengan class lain.

use App\Models\Order;
// Mengimpor model Order, yang akan digunakan untuk mengelola data pesanan (order) dalam aplikasi.

use Illuminate\Http\Request;
// Mengimpor Request untuk menangani permintaan HTTP yang diterima oleh controller.

class OrderController extends Controller
// Membuat class OrderController, yang bertanggung jawab untuk mengelola operasi CRUD (Create, Read, Update, Delete) terkait dengan pesanan.
{
    /**
     * Menampilkan daftar semua pesanan.
     */
    public function index()
    {
        //
        // Di sini, kode untuk mengambil dan menampilkan daftar pesanan dari database akan ditempatkan.
    }

    /**
     * Menampilkan form untuk membuat pesanan baru.
     */
    public function create()
    {
        //
        // Di sini, kode untuk menampilkan form input bagi pengguna untuk membuat pesanan baru akan ditempatkan.
    }

    /**
     * Menyimpan pesanan baru ke dalam database.
     */
    public function store(Request $request)
    {
        //
        // Di sini, kode untuk memproses data dari form create dan menyimpannya ke dalam database akan ditempatkan.
    }

    /**
     * Menampilkan detail dari pesanan tertentu berdasarkan ID-nya.
     */
    public function show(Order $order)
    {
        //
        // Di sini, kode untuk menampilkan detail spesifik dari satu pesanan akan ditempatkan.
    }

    /**
     * Menampilkan form untuk mengedit pesanan berdasarkan ID-nya.
     */
    public function edit(Order $order)
    {
        //
        // Di sini, kode untuk menampilkan form untuk mengedit pesanan tertentu akan ditempatkan.
    }

    /**
     * Memperbarui data pesanan yang ada di database berdasarkan ID-nya.
     */
    public function update(Request $request, Order $order)
    {
        //
        // Di sini, kode untuk memproses pembaruan data pesanan berdasarkan input pengguna akan ditempatkan.
    }

    /**
     * Menghapus pesanan dari database berdasarkan ID-nya.
     */
    public function destroy(Order $order)
    {
        //
        // Di sini, kode untuk menghapus pesanan dari database berdasarkan ID akan ditempatkan.
    }
}
