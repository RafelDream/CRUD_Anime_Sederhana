@extends('layouts.app')

@section('title', 'Edit Anime')

@section('content')

<div class="card shadow">
    <div class="card-body">

        <form action="{{ route('anime.update', $anime->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="title" value="{{ $anime->title }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Sinopsis</label>
                <textarea name="sinopsis" class="form-control" rows="4">{{ $anime->sinopsis }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Genre</label>
                    <input type="text" name="genre" value="{{ $anime->genre }}" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Episode</label>
                    <input type="number" name="episode" value="{{ $anime->episode }}" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="ongoing" {{ $anime->status=='ongoing'?'selected':'' }}>Ongoing</option>
                    <option value="completed" {{ $anime->status=='completed'?'selected':'' }}>Completed</option>
                </select>
            </div>

            @if($anime->cover)
                <img src="{{ asset('storage/'.$anime->cover) }}" width="120" class="mb-3">
            @endif

            <div class="mb-3">
                <input type="file" name="cover" class="form-control">
            </div>

            <div class="d-flex gap-2">

    <a href="{{ route('anime.index') }}" class="btn btn-secondary">
        Kembali
    </a>
            <button class="btn btn-primary">Update</button>
        </form>

    </div>
</div>

@endsection
