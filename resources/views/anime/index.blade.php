@extends('layouts.app')

@section('title', 'Daftar Anime')

@section('content')

<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="80">Cover</th>
                        <th>Judul</th>
                        <th>Genre</th>
                        <th>Episode</th>
                        <th>Status</th>
                        <th>Sinopsis</th>
                        <th width="130">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($anime as $item)
                    <tr>
                        <td>
                            @if($item->cover)
                                <img src="{{ asset('storage/'.$item->cover) }}"
                                     style="width:60px;height:90px;object-fit:cover"
                                     class="rounded">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>

                        <td class="fw-semibold">
                            {{ $item->title }}
                        </td>
                        <td>{{ $item->genre }}</td>
                        <td>{{ $item->episode }}</td>
                        <td>
                            <span class="badge bg-{{ $item->status=='ongoing'?'warning':'success' }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td style="max-width:300px">
                            <div style="max-height:70px; overflow:auto; font-size:0.9rem">
                                {{ $item->sinopsis ?? '-' }}
                            </div>
                        </td>

                        <td>
                            <a href="{{ route('anime.edit', $item->id) }}"
                               class="btn btn-sm btn-primary mb-1">
                                Edit
                            </a>

                            <form action="{{ route('anime.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus anime?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $anime->links() }}
        </div>

    </div>
</div>

@endsection
