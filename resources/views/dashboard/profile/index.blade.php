@extends('layouts.dashboard')

@section('content')


<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center bg-info justify-content-center">
                    <h6 class="m-0 font-weight-bold text-white">Data Diri</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row justify-content-center">
                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="img-fluid my-2 col-lg-5 d-block">
                    </div>
                    <div class="table-responsive table-striped">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td class="bg-primary text-white">Nama Lengkap</td>
                                    <td class="text-dark">{{ auth()->user()->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Tahun Masuk - Keluar</td>
                                    <td class="text-dark">{{ auth()->user()->tahun_masuk }} - {{ auth()->user()->tahun_keluar }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Jurusan</td>
                                    <td class="text-dark">{{ auth()->user()->jurusan }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Status Alumni</td>
                                    <td class="text-dark">{{ auth()->user()->status_alumni }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Tempat Lahir</td>
                                    <td class="text-dark">{{ auth()->user()->tempat_lahir }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Tanggal Lahir</td>
                                    <td class="text-dark">{{ auth()->user()->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Alamat</td>
                                    <td class="text-dark">{{ auth()->user()->alamat }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">No WhatsApp</td>
                                    <td class="text-dark">{{ auth()->user()->no_wa }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Email</td>
                                    <td class="text-dark">{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Instagram</td>
                                    <td class="text-dark">{{ auth()->user()->instagram }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Linked In</td>
                                    <td class="text-dark">{{ auth()->user()->linked_in }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <a href="/dashboard/profile/edit" class="btn btn-info mx-3 mb-2 justify-content-center"><i class="fas fa-edit"></i> Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-7">
            @if (session()->has('tambah'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('tambah') }}
                </div>
            @endif
            @if (session()->has('hapus'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('hapus') }}
                </div>
            @endif
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center bg-info">
                    <h6 class="m-0 font-weight-bold text-white text-center">Riwayat Pekerjaan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <button class="btn btn-success my-2 rounded-circle" data-toggle="modal" data-target="#TambahModal"><i class="fas fa-plus"></i></button>

                    <div class="table-responsive table-striped">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun Masuk</th>
                                    <th>Nama Instansi</th>
                                    <th>Jabatan</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pekerjaan as $pekerjaan)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $pekerjaan->tahun_masuk }}</td>
                                        <td>{{ $pekerjaan->nama_instansi }}</td>
                                        <td>{{ $pekerjaan->jabatan }}</td>
                                        <td>{{ $pekerjaan->alamat }}</td>
                                        <td>
                                            <form action="/dashboard/profile/pekerjaan/{{ $pekerjaan->id }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger my-2 rounded-circle" onclick="return confirm('Apakah Kamu Yakin Akan Menghapus Data Riwayat Pekerjaan ?')"><i class="fas fa-trash-alt text-white text-center"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal --}}
<div class="modal" tabindex="-1" id="TambahModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-info">
            <h5 class="modal-title text-white"><i class="fas fa-users mr-1"></i> Tambah Riwayat Pekerjaan</h5>
        </div>
        <div class="modal-body">
            <form method="post" action="/dashboard/profile/pekerjaan/create" class="mx-3 my-3" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tahun Masuk</label>
                    <input type="text" name="tahun_masuk" class="form-control rounded-top @error('tahun_masuk') is-invalid @enderror" id="tahun_masuk" required placeholder="Tahun Masuk">
                    @error('tahun_masuk')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Instansi</label>
                    <input type="text" name="nama_instansi" placeholder="Nama Instansi" class="form-control rounded-top @error('nama_instansi') is-invalid @enderror" id="nama_instansi" required placeholder=""  value="">
                    @error('nama_instansi')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control  @error('jabatan') is-invalid @enderror" id="jabatan" required placeholder="Jabatan" value="">
                    @error('jabatan')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3" required placeholder="Alamat"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary  my-2 mx-1 justify-content-center"><i class="fas fa-save mr-1"></i>Simpan</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            
        </div>
    </div>
</div>
{{-- modal --}}

<script>
    function previewImage() {
            const image = document.querySelector('#avatar');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display ='block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
</script>
    
@endsection