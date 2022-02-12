@extends('layouts.main')

@section('content')

<div class="jumbotron jumbotron-fluid bg-white">
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-7 text-center wow fadeInLeft">
                <h2 class="fw-bold text-center">Registrasi Akun Alumni</h2>
                <h3 class="fw-bold text-center">SMK NEGERI 1 KAWALI</h3>
                <div class="divider mx-auto"></div>
                    <img src="{{ asset('assets/img/register.svg') }}" class="" width="50%" alt="">
            </div>
            <div class="col-md-5 wow fadeInRight">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="/register" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="name"><span class="text-danger">*</span> Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control rounded-top @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Lengkap" required value="{{ old('nama') }}">
                                @error('nama')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="nis"><span class="text-danger">*</span> Email</label>
                                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="Alamat Email" required value="{{ old('email') }}">
                                @error('email')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password"><span class="text-danger">*</span> Password</label>
                                <input type="password" name="password" class="form-control  rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                                <small><span class="text-danger">*</span> Password Minimal 8 karakter</small>
                                @error('password')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <a href="/" class="btn btn-danger mt-2 text-decoration-none"><i class="fas fa-backward"></i> Kembali</a>
                                    <button class="btn btn-primary mt-2" type="submit">Register <i class="fas fa-sign-in-alt"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- <small class="d-block text-center mt-4">Already Registered ? <a href="/login">Login</a></small> --}}
            </div>
        </div>
    </div>
</div>

@endsection