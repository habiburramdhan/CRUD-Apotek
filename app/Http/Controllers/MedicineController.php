<?php

namespace App\Http\Controllers;
// Namespace untuk mengorganisir controller ini, memastikan tidak bentrok dengan class lain.

use App\Models\Medicine;
// Mengimpor model Medicine untuk digunakan dalam manipulasi data obat.

use Illuminate\Http\Request;
// Mengimpor Request untuk menangani input HTTP dari form.

class MedicineController extends Controller
// Mendefinisikan controller untuk mengelola logika CRUD terkait obat.
{
    /**
     * Menampilkan daftar semua obat yang ada di database.
     */
    public function index()
    {
        // Mengambil semua data obat dari database menggunakan model Medicine.
        $medicines = Medicine::all();
        // Mengembalikan view 'medicine.index' dengan data obat yang diambil dari database.
        return view('medicine.index', compact('medicines'));
    }

    /**
     * Menampilkan form untuk menambahkan obat baru.
     */
    public function create()
    {
        // Mengembalikan view 'medicine.create' yang berisi form untuk menambah data obat.
        return view('medicine.create');
    }

    /**
     * Menyimpan data obat baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Melakukan validasi input, memastikan nama, jenis, harga, dan stok diisi dengan benar.
        $request->validate([
            'name' => 'required|min:3', // Nama obat minimal 3 karakter.
            'type' => 'required', // Jenis obat wajib diisi.
            'price' => 'required|numeric', // Harga harus berupa angka.
            'stock' => 'required|numeric', // Stok harus berupa angka.
        ]);

        // Menyimpan data obat ke dalam database.
        Medicine::create([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses.
        return redirect()->back()->with('success', 'Berhasil menambahkan data obat!');
    }

    /**
     * Menampilkan detail dari obat tertentu (belum diimplementasikan).
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Menampilkan form untuk mengedit data obat berdasarkan ID.
     */
    public function edit($id)
    {
        // Mengambil data obat berdasarkan ID yang dikirimkan.
        $medicine = Medicine::find($id);
        // Menampilkan view 'medicine.edit' dengan data obat yang akan diedit.
        return view('medicine.edit', compact('medicine'));
    }

    /**
     * Mengupdate data obat yang ada di database berdasarkan ID.
     */
    public function update(Request $request, $id)
    {
        // Melakukan validasi input untuk memastikan data yang dikirimkan valid.
        $request->validate([
            'name' => 'required|min:3', // Nama obat minimal 3 karakter.
            'type' => 'required', // Jenis obat wajib diisi.
            'price' => 'required|numeric', // Harga harus berupa angka.
        ]);

        // Mengupdate data obat di database sesuai ID.
        Medicine::where('id', $id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
        ]);

        // Redirect ke halaman medicine dengan pesan sukses.
        return redirect()->route('medicine.home')->with('success', 'Berhasil Mengubah Data!');
    }

    /**
     * Menghapus data obat berdasarkan ID.
     */
    public function destroy($id)
    {
        // Menghapus data obat di database berdasarkan ID yang dikirimkan.
        Medicine::where('id', $id)->delete();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses.
        return redirect()->back()->with('deleted', 'Berhasil menghapus data');
    }

    /**
     * Menampilkan daftar obat berdasarkan stok yang diurutkan dari yang terendah.
     */
    public function stock()
    {
        // Mengambil data obat dan mengurutkannya berdasarkan stok secara ascending (terendah ke tertinggi).
        $medicine = Medicine::orderBy('stock', 'ASC')->get();

        // Menampilkan view 'medicine.stock' dengan data obat yang telah diurutkan.
        return view('medicine.stock', compact('medicine'));
    }

    /**
     * Menampilkan data obat tertentu sebagai JSON untuk diedit stoknya.
     */
    public function stockEdit($id)
    {
        // Mengambil data obat berdasarkan ID.
        $medicine = Medicine::find($id);

        // Jika obat tidak ditemukan, kembalikan respon JSON dengan pesan error.
        if (!$medicine) {
            return response()->json(['message' => 'Medicine not found'], 404);
        }

        // Mengembalikan data obat sebagai respon JSON.
        return response()->json($medicine);
    }

    /**
     * Mengupdate stok obat berdasarkan ID.
     */
    public function stockUpdate(Request $request, $id)
    {
        // Melakukan validasi pada input stok, harus berupa angka.
        $request->validate([
            'stock' => 'required|numeric', 
        ]);

        // Mengambil data obat berdasarkan ID.
        $medicine = Medicine::find($id);

        // Jika obat tidak ditemukan, kembalikan respon JSON dengan pesan error.
        if (!$medicine) {
            return response()->json(['message' => 'Medicine not found'], 404);
        }

        // Jika stok baru lebih kecil atau sama dengan stok lama, kembalikan error.
        if ($request->stock <= $medicine->stock) {
            return response()->json(["message" => "Stock yang diinput tidak boleh kurang dari stock sebelumnya"], 400);
        }

        // Mengupdate stok obat dengan nilai yang baru.
        $medicine->update([
            'stock' => $request->stock,
        ]);

        // Kembalikan respon JSON dengan pesan sukses.
        return response()->json(['message' => 'Stock updated successfully'], 200);
    }
}
