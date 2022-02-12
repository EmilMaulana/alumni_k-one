@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-7 text-center wow fadeInLeft">
            <h4 class="fw-bold text-center">Masuk Ke Dashboard Alumni SMK NEGERI 1 KAWALI</h4>
            <h6 class=" text-center">Masukkan alamat email dan kata sandi Akun Alumni Anda yang terdaftar.</h6>
            <div class="divider mx-auto"></div>
                <img src="{{ asset('assets/img/login.svg') }}" class="" width="50%" alt="">
        </div>
        <div class="col-md-5 wow fadeInRight">
            @if (session()->has('sukses'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('sukses') }}
                </div>
            @endif
            @if (session()->has('hapus'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('hapus') }}
                </div>
            @endif
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST" action="/login">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="Alamat Email" required value="{{ old('email') }}">
                            @error('email')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                            </div>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                tabindex="2" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-check ml-1 mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
    
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                {{-- <a href="/" class="btn btn-danger mt-2 text-decoration-none"><i class="fas fa-backward"></i> Kembali</a> --}}
                                <button class="btn btn-primary mt-2" type="submit">Masuk <i class="fas fa-sign-in-alt"></i></button>
                            </div>
                        </div>
                    </form>
                    {{-- <a href="/" class=" w-100 btn btn-danger mt-2 text-decoration-none"><i class="fas fa-backward"></i> Back</a> --}}
                    {{-- <small class="d-block text-center mt-4">Not Registered ? <a href="/register">Register</a></small> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection