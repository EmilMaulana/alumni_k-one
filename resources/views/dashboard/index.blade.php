@extends('layouts.dashboard')

@section('content')

{{-- style="min-height: 350px; background-image: url({{ asset('assets/img/header.jpg') }}); background-size: cover; background-position: center top;" --}}

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
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-3">
            @if ($posts->count())
                <a href="/dashboard/{{ $posts[0]->title }}" class="text-decoration-none">
                    <div class="card bg-white mt-2 mb-3">
                        <div class="card-header bg-primary text-white">
                            <span class="mx-2"><img class="img-profile rounded-circle" style="width: 40px; height: 40px;" src="{{ asset('storage/' . $posts[0]->user->avatar) }}"></span>
                            <span class="fw-bold">{{ $posts[0]->user->nama }}</span>
                            <small>{{ $posts[0]->created_at->isoFormat('dddd, D MMMM Y') }}</small>
                        </div>
                        <img src="{{ asset('storage/' . $posts[0]->image) }}" class="img-fluid">
                        <p class="card-text fw-bold text-dark mx-2 my-2">{{ $posts[0]->title }}</p>
                    </div>
                </a>
                @foreach ($posts->skip(1) as $post)
                    <a href="/dashboard/{{ $post->title }}" class="text-decoration-none">
                        <div class="card bg-white mt-2 mb-3">
                            <div class="card-header bg-primary text-white">
                                <span class="mx-2"><img class="img-profile rounded-circle" style="width: 40px; height: 40px;" src="{{ asset('storage/' . $post->user->avatar) }}"></span>
                                <span class="fw-bold">{{ $post->user->nama }}</span>
                                <small>{{ $post->created_at->isoFormat('dddd, D MMMM Y') }}</small>
                            </div>
                            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid">
                            <p class="card-text fw-bold text-dark mx-2 my-2">{{ $post->title }}</p>
                        </div>
                    </a>
                @endforeach
            @endif
            <div class="d-flex justify-content-center mt-5">
                {{ $posts->links() }}
            </div>
        </div>
        {{-- <div class="col-md-4">
            <div class="card bg-white shadow mt-2 mb-3">
                <div class="card-header bg-primary text-white">
                    <h6>Pengumuman</h6>
                </div>
            </div>
        </div> --}}
    </div>
</div>


@endsection