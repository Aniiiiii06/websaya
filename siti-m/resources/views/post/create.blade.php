@extends('layouts.app')

@section('content')
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label">foto</label>
            <input class="form-control" type="file" name="foto" id="formFile">
            @error('foto')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">judul</label>
            <input type="text" name="judul" class="form-control" placeholder="masukan judul"
                id="exampleInputPassword1">
            @error('judul')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">konten</label>
            <textarea class="form-control" name="konten" placeholder="masukan konten" id="floatingTextarea2" style="height: 100px"></textarea>
            @error('konten')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
