<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * =========================
     * HALAMAN ADMIN - LIST BERITA
     * =========================
     */
    public function index(Request $request)
    {
        $query = Berita::latest();

        // SEARCH JUDUL
        if ($request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $beritas = $query->paginate(8);

        return view('admin.berita', compact('beritas'));
    }

    /**
     * =========================
     * SIMPAN BERITA BARU
     * =========================
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'konten'  => 'required',
            'gambar'  => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal' => 'nullable|date',
        ]);

        $path = $request->file('gambar')->store('berita', 'public');

        $berita = new Berita();
        $berita->judul   = $request->judul;
        $berita->konten  = $request->konten;
        $berita->gambar  = $path;
        $berita->tanggal = $request->tanggal ?? now();
        $berita->save();

        return redirect()->back()->with('success', 'Berita berhasil ditambahkan');
    }

    /**
     * =========================
     * UPDATE BERITA
     * =========================
     */
    public function update(Request $request)
    {
        $berita = Berita::findOrFail($request->id);

        $request->validate([
            'judul'   => 'required|string|max:255',
            'konten'  => 'required',
            'gambar'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal' => 'nullable|date',
        ]);

        // JIKA UPLOAD GAMBAR BARU → HAPUS GAMBAR LAMA
        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $berita->gambar = $request->file('gambar')->store('berita', 'public');
        }

        $berita->judul   = $request->judul;
        $berita->konten  = $request->konten;
        $berita->tanggal = $request->tanggal ?? $berita->tanggal;
        $berita->save();

        return redirect()->back()->with('success', 'Berita berhasil diperbarui');
    }

    /**
     * =========================
     * HAPUS BERITA
     * =========================
     */
    public function destroy(Request $request)
    {
        $berita = Berita::findOrFail($request->id);

        // HAPUS FILE GAMBAR
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->back()->with('success', 'Berita berhasil dihapus');
    }
}
