<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Registrasi Akun',
            'user_id' => auth()->id()
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email:dns|unique:users',
            'nama' => 'required',
            'password' => 'required|min:8'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('sukses', 'Registrasi Berhasil! Silahkan login!');
    }


    // $validatedData = $request->validate([
    //         'visi' => 'required',
    //         'misi' => 'required'
    //     ]);

    //     Visi::create($validatedData);

    //     return redirect('/dashboard/admin/visi')->with('tambah', 'Visi & Misi Baru Telah Ditambahkan !');
}
