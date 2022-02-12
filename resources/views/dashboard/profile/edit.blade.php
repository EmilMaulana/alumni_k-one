@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">
    <div class="row mt-4 justify-content-center">
        <div class="col-xl-7 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Data Diri</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form method="post" action="/profile/edit" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <h6 class="heading-small text-muted mb-4">Data Diri</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Siswa</label>
                                    <input type="text" name="nama" class="form-control rounded-top @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Lengkap" value="{{ auth()->user()->nama }}">
                                    @error('nama')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" >Tempat Lahir</label>
                                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Tempat Lahir" value="{{ auth()->user()->tempat_lahir }}" required>
                                    @error('tempat_lahir')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" >Tanggal Lahir</label>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Tanggal Lahir" value="{{ auth()->user()->tanggal_lahir }}" required>
                                    @error('tanggal_lahir')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" cols="30" rows="3" placeholder="Alamat">{{ auth()->user()->alamat }}</textarea>
                                    @error('alamat')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">RT</label>
                                    <input type="text" id="rt" name="rt" class="form-control @error('rt') is-invalid @enderror" placeholder="RT" value="{{ auth()->user()->rt }}" required>
                                    @error('rt')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">RW</label>
                                    <input type="text" id="rw" name="rw" class="form-control @error('rw') is-invalid @enderror" placeholder="RW" value="{{ auth()->user()->rw }}" required>
                                    @error('rw')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Foto Profil</label>
                                    <input type="hidden" name="oldImage" class="form-control" required value="{{ auth()->user()->avatar }}">
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="img-preview img-fluid mb-3 col-sm-8 d-block">
                                    <input class=" @error('avatar') is-invalid @enderror" type="file" id="avatar" name="avatar" onchange="previewImage()">
                                    @error('avatar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label class="form-control-label">Jurusan</label>
                                        <select class="form-control" id="jurusan" name="jurusan" required>
                                            <option value="TEKNIK KENDARAAN RINGAN OTOMOTIF">TEKNIK KENDARAAN RINGAN OTOMOTIF</option>
                                            <option value="TEKNIK KOMPUTER DAN JARINGAN">TEKNIK KOMPUTER DAN JARINGAN</option>
                                            <option value="REKAYASA PERANGKAT LUNAK">REKAYASA PERANGKAT LUNAK</option>
                                            <option value="DESAIN PEMODELAN DAN INFORMASI BANGUNAN">DESAIN PEMODELAN DAN INFORMASI BANGUNAN</option>
                                            <option value="OTOMATISASI DAN TATA KELOLA PERKANTORAN">OTOMATISASI DAN TATA KELOLA PERKANTORAN</option>
                                            <option value="AKUNTANSI KEUANGAN LEMBAGA">AKUNTANSI KEUANGAN LEMBAGA</option>
                                            <option value="SENI KARAWITAN SUNDA">SENI KARAWITAN SUNDA</option>
                                        </select>
                                        @error('jurusan')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Tahun Masuk</label>
                                        <input type="text" id="tahun_masuk" name="tahun_masuk" class="form-control @error('tahun_masuk') is-invalid @enderror" placeholder="2022" value="{{ auth()->user()->tahun_masuk }}" required>
                                        @error('tahun_masuk')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Tahun Keluar</label>
                                        <input type="text" id="tahun_keluar" name="tahun_keluar" class="form-control @error('tahun_keluar') is-invalid @enderror" placeholder="2022" value="{{ auth()->user()->tahun_keluar }}" required>
                                        @error('tahun_keluar')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h6 class="heading-small text-muted mb-4">Status Alumni</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Status</label>
                                        <select class="form-control" id="status_alumni" name="status_alumni" required>
                                            <option value="BEKERJA">BEKERJA</option>
                                            <option value="KULIAH">KULIAH</option>
                                            <option value="WIRAUSAHA">WIRAUSAHA</option>
                                            <option value="TUNAKARYA">TUNAKARYA</option>
                                        </select>
                                        @error('status_alumni')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">INFO KONTAK</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">Email</label>
                                        <input  class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ auth()->user()->email }}" type="email" required>
                                        @error('email')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">No WhatsApp</label>
                                        <input class="form-control @error('no_wa') is-invalid @enderror" name="no_wa" id="no_wa" placeholder="No WhatsApp" value="{{ auth()->user()->no_wa }}" type="text" required>
                                        @error('no_wa')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-city">Instagram</label>
                                    <input type="text" id="instagram" name="instagram" class="form-control @error('instagram') is-invalid @enderror" placeholder="Instagram" value="{{ auth()->user()->instagram }}" required>
                                    @error('instagram')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-country">Facebook</label>
                                    <input type="text" id="facebook" name="facebook" class="form-control @error('facebook') is-invalid @enderror" placeholder="Facebook" value="{{ auth()->user()->facebook }}" required>
                                    @error('facebook')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-country">Linked In</label>
                                    <input type="text" id="linked_in" name="linked_in" class="form-control @error('linked_in') is-invalid @enderror" placeholder="Linked In" required value="{{ auth()->user()->linked_in }}">
                                    @error('linked_in')
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Description -->
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
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

{{-- <div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="input-username">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Username" value="{{ auth()->user()->nama }}" required>
                @error('nama')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" >Tempat Lahir</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Tempat Lahir" value="{{ auth()->user()->tempat_lahir }}" required>
                @error('tempat_lahir')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" >Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Tanggal Lahir" value="{{ auth()->user()->tanggal_lahir }}" required>
                @error('tanggal_lahir')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label class="form-control-label">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" cols="30" rows="3" placeholder="Alamat">{{ auth()->user()->alamat }}</textarea>
                @error('alamat')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label class="form-control-label">RT</label>
                <input type="text" id="rt" name="rt" class="form-control @error('rt') is-invalid @enderror" placeholder="RT" value="{{ auth()->user()->rt }}" required>
                @error('rt')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label class="form-control-label">RW</label>
                <input type="text" id="rw" name="rw" class="form-control @error('rw') is-invalid @enderror" placeholder="RW" value="{{ auth()->user()->rw }}" required>
                @error('rw')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label">Foto Profil</label>
                <input type="hidden" name="oldImage" class="form-control" required value="{{ auth()->user()->avatar }}">
                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="img-preview img-fluid mb-3 col-sm-8 d-block">
                <input class=" @error('avatar') is-invalid @enderror" type="file" id="avatar" name="avatar" onchange="previewImage()" required>
                @error('avatar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>
<h6 class="heading-small text-muted mb-4">Data Pendidikan</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-10">
            <div class="form-group">
                <label class="form-control-label">Jurusan</label>
                <select class="form-control" id="jurusan" name="jurusan" required>
                    <option value="TEKNIK KENDARAAN RINGAN OTOMOTIF">TEKNIK KENDARAAN RINGAN OTOMOTIF</option>
                    <option value="TEKNIK KOMPUTER DAN JARINGAN">TEKNIK KOMPUTER DAN JARINGAN</option>
                    <option value="REKAYASA PERANGKAT LUNAK">REKAYASA PERANGKAT LUNAK</option>
                    <option value="DESAIN PEMODELAN DAN INFORMASI BANGUNAN">DESAIN PEMODELAN DAN INFORMASI BANGUNAN</option>
                    <option value="OTOMATISASI DAN TATA KELOLA PERKANTORAN">OTOMATISASI DAN TATA KELOLA PERKANTORAN</option>
                    <option value="AKUNTANSI KEUANGAN LEMBAGA">AKUNTANSI KEUANGAN LEMBAGA</option>
                    <option value="SENI KARAWITAN SUNDA">SENI KARAWITAN SUNDA</option>
                </select>
                @error('jurusan')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label class="form-control-label">Tahun Masuk</label>
                <input type="text" id="tahun_masuk" name="tahun_masuk" class="form-control @error('tahun_masuk') is-invalid @enderror" placeholder="2022" value="{{ auth()->user()->tahun_masuk }}" required>
                @error('tahun_masuk')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label class="form-control-label">Tahun Keluar</label>
                <input type="text" id="tahun_keluar" name="tahun_keluar" class="form-control @error('tahun_keluar') is-invalid @enderror" placeholder="2022" value="{{ auth()->user()->tahun_keluar }}" required>
                @error('tahun_keluar')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>
<h6 class="heading-small text-muted mb-4">Status Alumni</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label">Status</label>
                <select class="form-control" id="status_alumni" name="status_alumni" required>
                    <option value="BEKERJA">BEKERJA</option>
                    <option value="KULIAH">KULIAH</option>
                    <option value="WIRAUSAHA">WIRAUSAHA</option>
                    <option value="TUNAKARYA">TUNAKARYA</option>
                </select>
                @error('status_alumni')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>
<hr class="my-4" />
<!-- Address -->
<h6 class="heading-small text-muted mb-4">INFO KONTAK</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="input-address">Email</label>
                <input  class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ auth()->user()->email }}" type="email" required>
                @error('email')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="input-address">No WhatsApp</label>
                <input class="form-control @error('no_wa') is-invalid @enderror" name="no_wa" id="no_wa" placeholder="No WhatsApp" value="{{ auth()->user()->no_wa }}" type="text" required>
                @error('no_wa')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label class="form-control-label" for="input-city">Instagram</label>
            <input type="text" id="instagram" name="instagram" class="form-control @error('instagram') is-invalid @enderror" placeholder="Instagram" value="{{ auth()->user()->instagram }}" required>
            @error('instagram')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label class="form-control-label" for="input-country">Facebook</label>
            <input type="text" id="facebook" name="facebook" class="form-control @error('facebook') is-invalid @enderror" placeholder="Facebook" value="{{ auth()->user()->facebook }}" required>
            @error('facebook')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label class="form-control-label" for="input-country">Linked In</label>
            <input type="text" id="linked_in" name="linked_in" class="form-control @error('linked_in') is-invalid @enderror" placeholder="Linked In" required value="{{ auth()->user()->linked_in }}">
            @error('linked_in')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    </div>
</div> --}}

@endsection