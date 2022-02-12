<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profile.index', [
            'title' => 'Profile',
            'pekerjaan' => Pekerjaan::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.profile.edit', [
            'title' => 'Edit Profile'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'tahun_masuk' => 'required',
            'tahun_keluar' => 'required',
            'status_alumni' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'no_wa' => 'required|numeric',
            'instagram' => 'required',
            'facebook' => 'required',
            'linked_in' => 'required',
            'avatar' => 'image|file|max:5120',
        ]);


        if ($request->file('avatar')) {

            if ($request->file('avatar')) {
                Storage::delete($request->oldImage);
            }

            $validatedData['avatar'] = $request->file('avatar')->store('user-avatar');
        }

        $user = auth::user();
        // Pemasukan::where('id', $pemasukan->id)
        //     ->update($validatedData);
        User::where('id', $user->id)
            ->update($validatedData);
        // Auth::user()->update($validatedData);

        return redirect('/dashboard')->with('edit', 'Profile Berhasil Di Edit !');
        //     return $request;
        //     $validatedData = $request->validate([
        //         'nama' => 'required',
        //         'email' => 'required|email:dns',
        //         'tahun_masuk' => 'required',
        //         'tahun_keluar' => 'required',
        //         'status_alumni' => 'required',
        //         'tempat_lahir' => 'required',
        //         'tanggal_ahir' => 'required',
        //         'alamat' => 'required',
        //         'no_wa' => 'required|numeric',
        //         'instagram' => 'required',
        //         'facebook' => 'required',
        //         'linked_in' => 'required',
        //         'avatar' => 'image|file|max:5120',
        //     ]);

        //     if ($request->file('avatar')) {
        //         $validatedData['avatar'] = $request->file('avatar')->store('user-avatar');
        //     }
        //     // if ($request->file('avatar')) {

        //     //     if ($request->file('avatar')) {
        //     //         Storage::delete($request->oldImage);
        //     //     }

        //     //     $validatedData['avatar'] = $request->file('avatar')->store('user-avatar');
        //     // }

        //     $user = auth::user();
        //     // Pemasukan::where('id', $pemasukan->id)
        //     //     ->update($validatedData);
        //     User::where('id', $user->id)
        //         ->update($validatedData);
        //     // Auth::user()->update($validatedData);

        //     return redirect('/dashboard')->with('edit', 'Profile Berhasil Di Edit !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy1(User $user, Pekerjaan $pekerjaan)
    {
    }
}
