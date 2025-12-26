<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    // LIST
    public function index()
    {
        $galeris = Galeri::orderBy('order')->get();
        return view('admin.galeri.index', compact('galeris'));
    }

    // FORM TAMBAH
    public function create()
    {
        return view('admin.galeri.create');
    }

    // SIMPAN
    public function store(Request $request)
    {
        $data = $request->validate([
            'page_title' => 'required|string',
            'image' => 'required|string',
            'caption' => 'nullable|string',
            'type' => 'required|in:slider,thumbnail',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        Galeri::create($data);

        return redirect()->back()->with('success', 'Galeri berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $data = $request->validate([
            'page_title' => 'required|string',
            'image' => 'nullable|string',
            'caption' => 'nullable|string',
            'type' => 'required|in:slider,thumbnail',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $galeri->update($data);

        return redirect()->back()->with('success', 'Galeri berhasil diperbarui');
    }

    // HAPUS
    public function destroy($id)
    {
        Galeri::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Galeri berhasil dihapus');
    }
}
