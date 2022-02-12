@extends('layouts.dashboard')

@section('content')


<div class="container-fluid">
    <div class="row justify-content-center mt-4">
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center bg-info justify-content-center">
                    <h6 class="m-0 font-weight-bold text-white">Data Diri</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row justify-content-center">
                        <img src="{{ asset('storage/' . $user->avatar) }}" class="img-fluid my-2 col-lg-5 d-block">
                    </div>
                    <div class="table-responsive table-striped">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td class="bg-primary text-white">Nama Lengkap</td>
                                    <td class="text-dark">{{ $user->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Tahun Masuk - Keluar</td>
                                    <td class="text-dark">{{ $user->tahun_masuk }} - {{ $user->tahun_keluar }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Jurusan</td>
                                    <td class="text-dark">{{ $user->jurusan }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Status Alumni</td>
                                    <td class="text-dark">{{ $user->status_alumni }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Tempat Lahir</td>
                                    <td class="text-dark">{{ $user->tempat_lahir }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Tanggal Lahir</td>
                                    <td class="text-dark">{{ $user->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Alamat</td>
                                    <td class="text-dark">{{ $user->alamat }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">No WhatsApp</td>
                                    <td class="text-dark">{{ $user->no_wa }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Email</td>
                                    <td class="text-dark">{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Instagram</td>
                                    <td class="text-dark">{{ $user->instagram }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-primary text-white">Linked In</td>
                                    <td class="text-dark">{{ $user->linked_in }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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