<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    // ========================
    // TAMBAH MENU
    // ========================
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|max:150',
            'subjudul'  => 'nullable|max:150',
            'deskripsi' => 'required',
            'gambar'    => 'required|image|mimes:jpg,jpeg,png,webp|max:10128',
        ]);

        $path = $request->file('gambar')->store('menu', 'public');

        Menu::create([
            'nama_menu' => $request->nama_menu,
            'subjudul'  => $request->subjudul,
            'deskripsi' => $request->deskripsi,
            'gambar'    => $path,
            'slug' => Str::slug($request->nama_menu) . '-' . time(),
        ]);

        return back()->with('success', 'Menu berhasil ditambahkan');
    }

    // ========================
    // EDIT MENU
    // ========================
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama_menu' => 'required|max:150',
            'subjudul'  => 'nullable|max:150',
            'deskripsi' => 'required',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10128',
        ]);

        if ($request->hasFile('gambar')) {
            FacadesStorage::disk('public')->delete($menu->gambar);
            $menu->gambar = $request->file('gambar')->store('menu', 'public');
        }

        $menu->update([
            'nama_menu' => $request->nama_menu,
            'subjudul'  => $request->subjudul,
            'deskripsi' => $request->deskripsi,
            'slug'      => Str::slug($request->nama_menu) . '-' . time(),
        ]);

        return back()->with('success', 'Menu berhasil diperbarui');
    }

    // ========================
    // HAPUS MENU (ADA VALIDASI KOMENTAR)
    // ========================
    public function destroy(Menu $menu)
    {
        if ($menu->rates()->count() > 0) {
            return back()->withErrors('Menu tidak bisa dihapus karena memiliki komentar');
        }

        FacadesStorage::disk('public')->delete($menu->gambar);
        $menu->delete();

        return back()->with('success', 'Menu berhasil dihapus');
    }

    // ========================
    // TAMBAH KOMENTAR
    // ========================
    public function storeRate(Request $request, Menu $menu)
    {
        $request->validate([
            'komentar' => 'required|min:5',
        ]);

        MenuRate::create([
            'menu_id'  => $menu->id,
            'komentar' => $request->komentar,
        ]);

        return back()->with('success', 'Komentar berhasil dikirim');
    }
}
