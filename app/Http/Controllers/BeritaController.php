<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    // LIST
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    // FORM TAMBAH
    public function create()
    {
        return view('admin.berita.create');
    }

    // SIMPAN
    public function store(Request $request)
    {
        $data = $request->validate([
            'page_title' => 'required|string',
            'judul' => 'required|string',
            'deskripsi_1' => 'required',
            'deskripsi_2' => 'nullable',
            'thumbnail' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $data['slug'] = Str::slug($request->judul);

        Berita::create($data);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $data = $request->validate([
            'page_title' => 'required|string',
            'judul' => 'required|string',
            'deskripsi_1' => 'required',
            'deskripsi_2' => 'nullable',
            'thumbnail' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $data['slug'] = Str::slug($request->judul);

        $berita->update($data);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil diperbarui');
    }

    // HAPUS
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil dihapus');
    }

    // DETAIL (opsional, frontend nanti)
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('berita.show', compact('berita'));
    }
}
