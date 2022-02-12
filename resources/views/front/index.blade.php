@extends('layouts.main')

@section('content')

<div class="jumbotron jumbotron-fluid bg-white">
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-7 text-center">
                <h2 class="wow fadeInRight fw-bold text-center">SISTEM INFORMASI ALUMNI</h2>
                <h3 class="wow fadeInLeft fw-bold text-center">SMK NEGERI 1 KAWALI</h3>
                <div class="divider mx-auto wow fadeInRight"></div>
                <h5 class="wow fadeInLeft text-center">Belum memiliki akun Alumni? Daftar segera di sini.</h5>
                @auth
                    <form action="/dashboard" method="get">
                        @csrf
                        <button type="submit" class="btn btn-info mt-2 mb-5 wow fadeInRight" href="#"><i class="fas fa-tachometer-alt text-white mr-2"></i>My Dashboard</button>
                    </form>
                @else
                    <a href="/register" class="btn btn-info text-white mt-2 mb-5 wow fadeInRight"><i class="fas fa-sign-in-alt mr-2"></i> Daftar</a>
                @endauth
            </div>
            <div class="col-md-5 mt-n5 wow fadeInRight">
                <img src="{{ asset('assets/img/home.svg') }}" alt="">
            </div>
        </div>
    </div>
</div>
<hr class="text-dark mt-n5">

{{-- carousel --}}
{{-- <div class="container">
    <div class="row mt-5">
        <div class="col-md-11">
            <h4 class="fw-bold">Pengumuman</h4>
        </div>
        <div class="col-md-1">
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control btn btn-outline-dark mx-auto" aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control btn btn-outline-dark mx-auto" aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div id="carouselExampleControls" class="carousel slide mt-2" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active rounded">
                    <h5>Judul Pengumuman</h5>
                </div> --}}
                {{-- @foreach ($album as $xx)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }} rounded" style="max-height: 500px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $xx->image) }}" class="d-block w-100" alt="...">
                    </div>
                @endforeach --}}
            {{-- </div>
        </div>
    </div>
</div> --}}
{{-- carousel --}}

{{-- <div class="container my-3">
    <div class="row mt-5">
        <div class="col-lg-4">
            <div class="card-service wow fadeInUp shadow">
                <div class="head">
                    <i class="fas fa-user-graduate display-5"></i>
                </div>
                <div class="body">
                    <h4 class="text-info fw-bold">{{ $bekerja }}</h4>
                    <h5 class="text-secondary">Alumni Bekerja</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-service wow fadeInUp shadow">
                <div class="head">
                    <i class="fas fa-user-graduate display-5"></i>
                </div>
                <div class="body">
                    <h4 class="text-info fw-bold">1120</h4>
                    <h5 class="text-secondary">Alumni Melanjutkan</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-service wow fadeInUp shadow">
                <div class="head">
                    <i class="fas fa-user-graduate display-5"></i>
                </div>
                <div class="body">
                    <h4 class="text-info fw-bold">2520</h4>
                    <h5 class="text-secondary">Alumni Wirausaha</h5>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection