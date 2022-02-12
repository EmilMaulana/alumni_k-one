<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <title>{{ $title }} - ALUMNI SMKN 1 KAWALI</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ asset('assets/css/maicons.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
{{-- {{ asset('') }} --}}
  <link rel="stylesheet" href="{{ asset('assets/vendor/animate/animate.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  {{-- font awesome --}}
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
	
  {{-- icon --}}
  <link rel="icon" href="{{ asset('assets/img/smk.png') }}" width="90px;" type="image/png">

  

</head>
<body class="bg-white badan">

  <!-- Back to top button -->
  <div class="back-to-top"></div>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky shadow" >
      <div class="container">
          <img class="header-logo-image" src="{{ asset('assets/img/smk.png') }}" alt="Logo" width="40px;" height="40px;">
          <h4 class="fw-bold my-auto mx-2">Alumni<span class="text-info">K-ONE</span></h4>
          {{-- <h4 class="text-info fw-bold baposka">BAPOSKA</h4> --}}
          <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
          </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto ">
            {{-- <li class="nav-item">
              <a class="nav-link text-uppercase text-dark " href="/">Home</a>
            </li>
            <li class="nav-item mr-5">
              <a class="nav-link text-uppercase text-dark" href="/profil">Profil</a>
            </li> --}}
            @auth
              <li class="nav-item mr-2 my-2">
                <form action="/dashboard" method="get">
                    @csrf
                    <button type="submit" class="btn btn-info" href="#"><i class="fas fa-tachometer-alt text-white mr-2"></i>Dashboard</button>
                </form>
              </li>
              <li class="nav-item my-1">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger" href="#"><i class="fas fa-sign-out-alt mr-2"></i> Keluar</button>
                </form>
              </li>
            @else
                <li class="nav-item my-1">
                  <a href="/login" class="btn btn-outline-info ml-lg-2 my-1"><i class="fas fa-sign-in-alt mr-2"></i> Masuk</a>
                </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>
  </header>

    @yield('content')

  <div class="jumbotron jumbotron-fluid bg-light mb-n2">
    <div class="container">
      <div class="row justify-content-center">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.4716914219107!2d108.36043621431992!3d-7.186894072531966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f43087e24f9d3%3A0x34cfd3589f2615d0!2sSMK%20Negeri%201%20Kawali!5e0!3m2!1sid!2sid!4v1602471655418!5m2!1sid!2sid"
          width="1200" height="450" frameborder="0" style="border:1;" allowfullscreen=""
          aria-hidden="false" tabindex="0">
        </iframe>
      </div>
    </div>
  </div>

  <footer class="page-footer bg-white">
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-lg-3 mb-3">
          <h5 class="text-dark">Tentang</h5>
          <h6 class="text-dark mt-n3 text-capitalize">
            OSIS SMK Negeri 1 Kawali Merupakan Organisasi Siswa Intra Sekolah yang memiliki tujuan untuk memajukan SMK Negeri 1 Kawali dalam ruang akademis dan nonakademis dengan berbagai macam pendekatan.
          </h6>
        </div>
        <div class="col-lg-3 mb-3">
          <h5 class="text-dark">Tautan</h5>
          <h6 class="text-dark mt-n3">
            <li>
              <a href="https://smkn1kawali.sch.id/" class="text-decoration-none" target="_blank">SMKN 1 KAWALI</a>
            </li>
            <li>
              <a href="https://lms.smkn1kawali.sch.id/" class="text-decoration-none" target="_blank">Media Digital</a>
            </li>
            <li>
              <a href="https://point.smkn1kawali.sch.id/" class="text-decoration-none" target="_blank">Point Siswa</a>
            </li>
            <li>
              <a href="https://osis.smkn1kawali.sch.id/" class="text-decoration-none" target="_blank">OSIS SMKN 1 KAWALI</a>
            </li>
          </h6>
        </div>
        <div class="col-lg-3 mb-3 social-media-button">
          <h5 class="text-dark">Info Kontak</h5>
          <h6 class="text-dark mt-n3"><i class="fas fa-map-marked-alt text-dark"></i> : Jl. Talagasari No.35 Kawali - Kabupaten Ciamis - Jawa Barat 46253</h6>
          <h6 class="text-dark"><i class="fas fa-phone text-dark"></i> : 0265-791727</h6>
          <h6 class="text-dark"><i class="fas fa-envelope text-dark"></i> : smkn1kawali@gmail.com</h6>
            <a class="text-center bg-dark text-white" target="_blank" href="https://www.instagram.com/baposka/"><span class="mai-logo-instagram"></span></a>
            <a class="text-center bg-dark text-white" target="_blank" href="https://www.youtube.com/channel/UC7DCxqbbLGhEj5APTceYklQ"><span class="mai-logo-youtube"></span></a>
            <a class="text-center bg-dark text-white" target="_blank" href="https://facebook.com/smkn1kawali"><span class="mai-logo-facebook"></span></a>
        </div>
        <div class="col-lg-3 mb-3">
          <div class="img-fluid text-center">
            <img src="{{ asset('assets/img/smk-hebat.png') }}" width="80%" alt="">
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <small class="text-center text-dark mt-3" id="copyright">&copy; 2021. SMKN 1 KAWALI developed by <a class="" href="https://instagram.com/emilmaul_/" target="_blank">Emil Maulana</a> All rights reserved.</small>
      </div>
    </div>
  </footer>
    
    

  
  
<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/js/google-maps.js') }}"></script>

<script src="{{ asset('assets/vendor/wow/wow.min.js') }}"></script>

<script src="{{ asset('assets/js/theme.js') }}"></script>

{{-- solid template --}}
<script src="https://unpkg.com/animejs@3.0.1/lib/anime.min.js"></script>
<script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
<script src="{{ asset('assets/dist/js/main.min.js') }}"></script>

{{-- login --}}
<!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

   {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}

    

  
</body>
</html>
