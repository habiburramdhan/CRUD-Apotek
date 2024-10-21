<?php

namespace App\Http\Controllers; 
// Namespace untuk mendefinisikan lokasi dari controller AkunController ini agar tidak terjadi konflik penamaan dengan class lain.

use App\Models\User; 
// Mengimpor model User untuk digunakan dalam mengelola data user.

use Illuminate\Http\Request; 
// Mengimpor class Request untuk menangani data HTTP yang dikirim dari form.

use Illuminate\Support\Facades\Hash; 
// Mengimpor facade Hash untuk melakukan hashing pada password.

use Illuminate\Support\Facades\Auth; 
// Mengimpor facade Auth untuk menangani autentikasi user.

use Illuminate\Support\Str; 
// Mengimpor facade Str untuk manipulasi string, seperti membuat password acak.

class AkunController extends Controller 
// Mendefinisikan class AkunController yang mengatur logika login, logout, dan pengelolaan akun user.
{   
    // Method untuk menampilkan halaman login.
    public function login(){
        return view('login'); // Mengembalikan view untuk halaman login.
    }

    // Method untuk menangani proses login.
    public function loginAuth(Request $request)
    {
        // Melakukan validasi input login (email dan password).
        $request->validate([
            'email' => 'required|email:dns', // Email harus format yang valid.
            'password' => 'required', // Password wajib diisi.
        ]);

        // Menyimpan input user yang hanya berisi email dan password.
        $user = $request->only(['email', 'password']);
        
        // Jika autentikasi berhasil, redirect ke halaman home.
        if(Auth::attempt($user)) {
            return redirect()->route('home.page');
        } else {
            // Jika autentikasi gagal, redirect kembali ke halaman login dengan pesan error.
            return redirect()->back()->with('failed', 'Proses login gagal, silahkan coba kembali dengan data yang benar!');
        }
    }

    // Method untuk logout user yang sedang login.
    public function logout(){
        Auth::logout(); // Melakukan logout pada user yang sedang aktif.
        return redirect()->route('login')->with('logout', 'Anda telah logout!'); // Redirect ke halaman login dengan pesan logout.
    }

    // Method untuk menampilkan daftar semua user.
    public function index()
    {
        $users = User::all(); // Mengambil semua data user dari database.
        return view("kelola.index",compact('users')); // Menampilkan view 'kelola.index' dan mengirim data user.
    }

    /**
     * Menampilkan form untuk membuat user baru.
     */
    public function create()
    {
        return view('kelola.create'); // Menampilkan form untuk membuat user baru.
    }

    /**
     * Menyimpan data user baru ke database.
     */
    public function store(Request $request)
    {
        // Melakukan validasi pada input user baru.
        $validatedData= $request->validate([
            'nama' => 'required|string|max:255', // Nama harus diisi dan merupakan string maksimal 255 karakter.
            'email' => 'required|email|unique:users', // Email harus valid dan unik di tabel users.
            'role' => 'required|string|in:admin,user', // Role harus diisi dan hanya bisa berisi admin atau user.
        ]);

        // Membuat password acak sepanjang 12 karakter.
        $generatedPassword= Str::random(12);

        // Menyimpan data user baru ke database dengan password yang telah di-hash.
        User::create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => bcrypt($generatedPassword), // Meng-enkripsi password sebelum disimpan.
            'role' => $validatedData['role'],
        ]);

        // Redirect ke halaman sebelumnya dengan pesan sukses.
        return redirect()->back()->with('success', 'Berhasil Mengubah Data!');
    }

    /**
     * Menampilkan user tertentu (belum diimplementasikan).
     */
    public function show(Akun $akun)
    {
        //
    }

    /**
     * Menampilkan form untuk mengedit data user berdasarkan ID.
     */
    public function edit($id)
    {
        $users = User::find($id); // Mengambil data user berdasarkan ID.
        return view('kelola.edit', compact('users')); // Menampilkan form edit dengan data user yang akan diubah.
    }

    /**
     * Mengupdate data user berdasarkan ID di database.
     */
    public function update(Request $request, $id)
    {
        // Melakukan validasi pada data yang akan di-update.
        $request->validate([
            'nama' => 'required|min:3', // Nama harus diisi minimal 3 karakter.
            'email' => 'required', // Email harus diisi.
            'role' => 'required', // Role harus diisi.
        ]);

        // Mengupdate data user sesuai dengan ID yang diberikan.
        User::where('id', $id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        // Redirect ke halaman kelola user dengan pesan sukses.
        return redirect()->route('kelola.home')->with('success', 'Berhasil Mengubah Data!');
    }

    /**
     * Menghapus user berdasarkan ID dari database.
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete(); // Menghapus data user berdasarkan ID.

        // Redirect ke halaman sebelumnya dengan pesan sukses.
        return redirect()->back()->with('deleted', 'Berhasil menghapus data');
    }
}
