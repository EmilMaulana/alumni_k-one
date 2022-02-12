@extends('layouts.dashboard')

@section('content')


<div class="header jumbotron jumbotron-fluid">
    <div class="container-fluid d-flex align-items-center" style=" z-index: 1; position: relative; ">
        <div class="row justify-content-center">
            <div class=" col-md-12" style="font-family: Varela Round, sans-serif;">
                <h2 class="text-white text-center">Halo, {{ auth()->user()->nama }}</h2>
                {{-- <h4 class="text-white mt-0 mb-5"><span class="text-info">SMKN 1 KAWALI</span> "PASTI BISA PASTI HEBAT"</h4> --}}
                {{-- <a href="#!" class="btn btn-neutral">Edit profile</a> --}}
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-11 card bg-white shadow">
            <div class="card-body">
                <h2 class="mt-3 text-capitalize text-dark">{{ $post->title }}</h2>
                <a class="">Oleh : <a href="/dashboard?user={{ $post->user->nama }}" class="text-decoration-none">{{ $post->user->nama }}</a>
                <hr>
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top " class="img-fluid">
                    </div>
                <article class="my-3 text-dark">
                    <p class="text-dark">{!! $post->body !!}</p>
                </article>
            </div>
        </div>
    </div>
</div>

@endsection