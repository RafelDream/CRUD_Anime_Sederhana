@extends('layouts.app')

@section('title', 'Tambah Anime')

@section('content')

<div class="card shadow">
    <div class="card-body">

        <form action="{{ route('anime.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Sinopsis</label>
                <textarea name="sinopsis" class="form-control" rows="4"></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Genre</label>
                    <input type="text" name="genre" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Episode</label>
                    <input type="number" name="episode" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Cover</label>
                <input type="file" name="cover" class="form-control">
            </div>
            <div class="d-flex gap-2">
            <a href="{{ route('anime.index') }}" class="btn btn-secondary">
            Kembali
            </a>
            <button class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>

@endsection
