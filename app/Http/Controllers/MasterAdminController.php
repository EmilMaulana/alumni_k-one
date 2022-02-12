<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class MasterAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->guest()) {
            abort(403);
        }

        $user = User::latest();

        if (request('search')) {
            $user->where('email', 'LIKE', '%' . $request->search . '%')
                ->orWhere('nama', 'LIKE', '%' . $request->search . '%');
        }

        return view('dashboard.admin.index', [
            'title' => 'Dashboard Admin',
            'total_user' => User::all()->count(),
            'user' => $user->paginate(20),
            'post' => Post::all()->count(),
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
        return view('dashboard.admin.user.show', [
            'title' => 'Detail Profil',
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function print(Request $request)
    {
        // dd(request('search'));
        $user = User::latest();
        if (request('search')) {
            $user->where('nama', 'LIKE', '%' . $request->search . '%');
        }

        return view('dashboard.admin.user.print', [
            'title' => 'Print Data User',
            'user' => $user->get()

        ]);
    }

    public function tampil(Request $request)
    {
        //dd(request('search'));
        $user = User::latest();
        if (request('search')) {
            $user->where('nama', 'LIKE', '%' . $request->search . '%');
        }

        return view('dashboard.admin.user.search', [
            'title' => 'Print Data User',
            'user' => $user->get()

        ]);
    }
}
