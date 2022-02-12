<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Laravel Alumni - Print User</title>

    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/img/smk.png') }}" width="90px;" type="image/png">
</head>
<body onload="window.print()">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
            @foreach ($user as $xx)
                <div class="row justify-content-center">
                        <img src="{{ asset('storage/' . $xx->avatar) }}" class="img-fluid my-2 col-md-5 d-block">
                    </div>
                <div class="table-responsive table-striped">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <td class="bg-primary text-white">Nama Lengkap</td>
                                <td class="text-dark">{{ $xx->nama }}</td>
                            </tr>
                            <tr>
                                <td class="bg-primary text-white">Tahun Masuk - Keluar</td>
                                <td class="text-dark">{{ $xx->tahun_masuk }} - {{ $xx->tahun_keluar }}</td>
                            </tr>
                            <tr>
                                <td class="bg-primary text-white">Jurusan</td>
                                <td class="text-dark">{{ $xx->jurusan }}</td>
                            </tr>
                            <tr>
                                <td class="bg-primary text-white">Status Alumni</td>
                                <td class="text-dark">{{ $xx->status_alumni }}</td>
                            </tr>
                            <tr>
                                <td class="bg-primary text-white">Tempat Lahir</td>
                                <td class="text-dark">{{ $xx->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <td class="bg-primary text-white">Tanggal Lahir</td>
                                <td class="text-dark">{{ $xx->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <td class="bg-primary text-white">Alamat</td>
                                <td class="text-dark">{{ $xx->alamat }}</td>
                            </tr>
                            <tr>
                                <td class="bg-primary text-white">No WhatsApp</td>
                                <td class="text-dark">{{ $xx->no_wa }}</td>
                            </tr>
                            <tr>
                                <td class="bg-primary text-white">Email</td>
                                <td class="text-dark">{{ $xx->email }}</td>
                            </tr>
                            <tr>
                                <td class="bg-primary text-white">Instagram</td>
                                <td class="text-dark">{{ $xx->instagram }}</td>
                            </tr>
                            <tr>
                                <td class="bg-primary text-white">Linked In</td>
                                <td class="text-dark">{{ $xx->linked_in }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- <div class="table-responsive">
                    <table class="table align-items-center table-hover" id="table">
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
                </div> --}}
            @endforeach
            </div>
        </div>
    </div>
</body>
</html>