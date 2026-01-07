<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Style -->
    <style>
        body {
            background-color: #426abb;
        }

        .anime-cover {
            height: 100%;
            width: 300px;
            object-fit: cover;
        }

        .anime-sinopsis {
        max-height: 80px;    
        overflow-y: auto;      
        font-size: 0.9rem;
        line-height: 1.4;
        }
        .anime-sinopsis::-webkit-scrollbar {
        width: 4px;
        }
        .anime-sinopsis::-webkit-scrollbar-thumb {
        background: #bbb;
        border-radius: 4px;
        }

        .card {
            display: flex;
            flex-direction: column;
        }

        .card-body {
            flex: 1;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('anime.index') }}">
            Anime List
        </a>
        <a href="{{ route('anime.create') }}" class="btn btn-outline-light btn-sm">
            + Tambah Anime
        </a>
    </div>
</nav>

<div class="container mb-5">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>
</body>
</html>
