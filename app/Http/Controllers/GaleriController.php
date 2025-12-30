<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * =============================
     * TAMPILKAN DATA ADMIN GALERI
     * =============================
     */
    public function index()
    {
        // 1 banner saja
        $banner = Galeri::where('section', 'banner')
            ->where('is_active', true)
            ->first();

        // galeri selain banner
        $galeris = Galeri::whereIn('section', ['slider', 'thumbnail'])
            ->orderBy('section')
            ->orderBy('order')
            ->get();

        return view('admin.galeri', compact('banner', 'galeris'));
    }

    /**
     * =============================
     * SIMPAN DATA BARU
     * =============================
     */
    public function store(Request $request)
    {
        $request->validate([
            'section'   => 'required|in:banner,slider,thumbnail',
            'title'     => 'nullable|string|max:255',
            'image'     => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'caption'   => 'nullable|string|max:255',
            'order'     => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $path = $request->file('image')->store('galeri', 'public');

        Galeri::create([
            'section'   => $request->section,
            'title'     => $request->section === 'banner' ? $request->title : null,
            'image'     => $path,
            'caption'   => $request->caption,
            'order'     => $request->order ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 1,
        ]);

        return back()->with('success', 'Data galeri berhasil ditambahkan');
    }

    /**
     * =============================
     * UPDATE DATA
     * =============================
     */
    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'section'   => 'required|in:banner,slider,thumbnail',
            'title'     => 'nullable|string|max:255',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'caption'   => 'nullable|string|max:255',
            'order'     => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $data = [
            'section'   => $request->section,
            'caption'   => $request->caption,
            'order'     => $request->order ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 1,
            'title'     => $request->section === 'banner' ? $request->title : null,
        ];

        // kalau upload gambar baru
        if ($request->hasFile('image')) {
            if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
                Storage::disk('public')->delete($galeri->image);
            }

            $data['image'] = $request->file('image')->store('galeri', 'public');
        }

        $galeri->update($data);

        return back()->with('success', 'Data galeri berhasil diupdate');
    }

    /**
     * =============================
     * HAPUS DATA
     * =============================
     */
    public function destroy(Galeri $galeri)
    {
        if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
            Storage::disk('public')->delete($galeri->image);
        }

        $galeri->delete();

        return back()->with('success', 'Data galeri berhasil dihapus');
    }
}
