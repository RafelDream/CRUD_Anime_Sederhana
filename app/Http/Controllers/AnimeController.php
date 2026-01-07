<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function index()
    {
        $anime = Anime::latest()->paginate(10);
        return view('anime.index', compact('anime'));
    }

    public function create()
    {
        return view('anime.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required',
            'sinopsis' => 'nullable',
            'genre'    => 'required',
            'episode'  => 'required|integer',
            'status'   => 'required|in:ongoing,completed',
            'cover'    => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        Anime::create($data);

        return redirect()->route('anime.index')
            ->with('success', 'Anime berhasil ditambahkan');
    }

    public function edit($id)
    {
        $anime = Anime::findOrFail($id);
        return view('anime.edit', compact('anime'));
    }

    public function update(Request $request, $id)
    {
        $anime = Anime::findOrFail($id);

        $request->validate([
            'title'    => 'required',
            'sinopsis' => 'nullable',
            'genre'    => 'required',
            'episode'  => 'required|integer',
            'status'   => 'required|in:ongoing,completed',
            'cover'    => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $anime->update($data);

        return redirect()->route('anime.index')
            ->with('success', 'Anime berhasil diupdate');
    }

    public function destroy($id)
    {
        Anime::findOrFail($id)->delete();

        return redirect()->route('anime.index')
            ->with('success', 'Anime berhasil dihapus');
    }
}
