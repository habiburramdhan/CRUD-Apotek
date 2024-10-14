<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AkunController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Akun::all();
        return view("kelola.index",compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelola.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData= $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required|string|in:admin,user',
        ]);

        $generatedPassword= Str::random(12);

        Akun::create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => bcrypt($generatedPassword),
            'role' => $validatedData['role'],
        ]);

        return redirect()->back()->with('success', 'Berhasil Mengubah Data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Akun $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $users = Akun::find($id);
        return view('kelola.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',
        ]);

        Akun::where('id', $id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('kelola.home')->with('success', 'Berhasil Mengubah Data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Akun::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data');
    }
}
