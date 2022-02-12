@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">
    @if (session()->has('success'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="card shadow my-4">
        <div class="card-header py-3 bg-info">
            {{-- <marquee class="m-0 font-weight-bold text-white">---- Data Yang Ditampilkan Merupakan Data Terbaru ---- Data Yang Ditampilkan Merupakan Data Terbaru ---- Data Yang Ditampilkan Merupakan Data Terbaru</marquee> --}}
        </div>
        <div class="card-body text-center">
            <div class="row justify-content-center mb-3">
                <div class="col-md-4 mx-3">
                        <a type="submit" href="/master/admin/user/{{ request('search') }}/print" class="btn btn-danger mx-1 my-1"><i class="fas fa-print fa-sm"></i> Print</a>
                    </form>
                </div>
            </div>
            <div class="table-responsive table-striped">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-dark">No</th>
                            <th class="text-dark">Nama</th>
                            <th class="text-dark">Tahun Masuk - Tahun Keluar</th>
                            <th class="text-dark">Jurusan</th>
                            <th class="text-dark">Status Alumni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $xx)
                        <tr>
                            <td class="text-dark">{{ $loop->iteration }}</td>
                            <td class="text-dark">{{ $xx->nama }}</td>
                            <td class="text-dark">{{ $xx->tahun_masuk }} - {{ $xx->tahun_keluar }}</td>
                            <td class="text-dark">{{ $xx->jurusan }}</td>
                            <td class="text-dark">{{ $xx->status_alumni }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection