@extends('layouts.dashboard')

@section('content')

<div class="jumbotron jumbotron jumbotron-fluid bg-gradient bg-primary">
    <div class="container-fluid d-flex align-items-center" style=" z-index: 1; position: relative; ">
        <div class="row">
            <div class=" col-md-12" style="font-family: Varela Round, sans-serif;">
                <h4 class="text-white m-auto">Selamat Datang Admin, {{ auth()->user()->nama }}</h4>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah User
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $total_user }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Cerita
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $post }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-window-restore fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-info">
                
            </div> 
            <div class="card-body">
                <div class="row justify-content-center mb-3">
                    <div class="col-md-5 mx-1 my-1 text-center">
                        <form action="/master/admin/user/tampil">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control rounded-top " id="search" required placeholder="Ketik Nama"  value="">
                            </div>
                            <button class="btn btn-danger mx-1 mb-3" type="submit"><i class="fas fa-print fa-sm"></i> Print</button>
                            <a href="/dashboard/admin/user" class="btn btn-success mx-1 mb-3"><i class="fas fa-sync-alt fa-sm"></i> Refresh</a>
                        </form>
                    </div>
                    <div class="col-md-4 mx-1 my-1">
                        <form action="/master/admin">
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari Nama" name="search" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive table-striped mx-3">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-dark">No</th>
                                <th class="text-dark">Nama</th>
                                <th class="text-dark">Tahun Masuk - Tahun Keluar</th>
                                <th class="text-dark">Jurusan</th>
                                <th class="text-dark">Status Alumni</th>
                                <th class="text-dark">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $user)
                            <tr>
                                <td class="text-dark">{{ $loop->iteration }}</td>
                                <td class="text-dark">{{ $user->nama }}</td>
                                <td class="text-dark">{{ $user->tahun_masuk }} - {{ $user->tahun_keluar }}</td>
                                <td class="text-dark">{{ $user->jurusan }}</td>
                                <td class="text-dark">{{ $user->status_alumni }}</td>
                                <td>
                                    <a href="/master/admin/user/{{ $user->nama }}" class="btn btn-primary my-2"><i class="fas fa-eye text-white"></i></a>
                                    {{-- <button data-toggle="modal" data-target="#HapusModal" class="btn btn-danger my-2 rounded-circle"><i class="fas fa-trash-alt text-white"></i></button> --}}
                                </td>
                            </tr>
                            {{-- modal hapus --}}
                                <div class="modal" id="HapusModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header bg-danger justify-content-center">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-dark">Apakah Kamu Yakin Akan Menghapus Data User ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            {{-- <a href="/master/admin/user" type="button" class="btn btn-secondary" data-bs-dismiss="HapusModal"><i class="fas fa-redo-alt"></i> Tutup</a> --}}
                                            <form action="/master/admin/user/{{ $user->nama }}" method="POST" class="d-inline" >
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger my-2"><i class="fas fa-trash-alt text-white text-center"></i> Hapus</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- modal hapus --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection