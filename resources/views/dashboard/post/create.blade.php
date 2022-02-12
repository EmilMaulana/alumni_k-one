@extends('layouts.dashboard')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 my-3">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('hapus'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('hapus') }}
                </div>
            @endif
            <div class="card bg-white shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center bg-info justify-content-center">
                    <h6 class="m-0 font-weight-bold text-white">Tambah Cerita</h6>
                </div>
                <div class="card-body">
                        <form method="POST" action="/dashboard/post/create" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Foto</label>
                                <img class="img-preview img-fluid mb-3 col-sm-8">
                                <input class=" @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">Body</label>
                                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                                <trix-editor input="body"></trix-editor>
                                @error('body')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Cerita</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($post as $post)
    <div class="row justify-content-center">
        <div class="col-md-6 my-3">
            <div class="card bg-white">
                <div class="card-header bg-primary text-white">
                    <span class="mx-2"><img class="img-profile rounded-circle" style="width: 40px; height: 40px;" src="{{ asset('storage/' . auth()->user()->avatar) }}"></span>
                    <span class="fw-bold">{{ auth()->user()->name }}</span>
                </div>
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid">
                <h5 class="fw-bold text-dark mx-2 my-2">{{ $post->title }}</h5>
                <p class="text-dark  mx-2 my-2">{{ $post->excerpt }}</p>
                <div class="card-footer text-center bg-white">
                        <button data-toggle="modal" data-target="#Hapus" class="btn btn-danger my-2 rounded-circle" ><i class="fas fa-trash-alt text-white text-center"></i> </button>
                </div>
            </div>
        </div>
        {{-- modal hapus --}}
            <div class="modal" id="Hapus">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header bg-danger justify-content-center">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                    <div class="modal-body">
                        <p class="text-dark">Apakah Kamu Yakin Akan Menghapus Cerita ?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="/dashboard/post/hapus/{{ $post->id }}" method="POST" class="d-inline" >
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger my-2"><i class="fas fa-trash-alt text-white text-center"></i> Hapus</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        {{-- modal hapus --}}
    </div>
    @endforeach
</div>

<script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/author/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })
        function previewImage() {
            const image = document.querySelector('#image');
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