<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Tentang;
use App\Models\Berita;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /* =========================
     * USER PAGES
     * ========================= */

    public function home()
    {
        return view('home');
    }

    /**
     * =========================
     * BERITA (USER)
     * =========================
     */
    public function berita()
    {
        $beritaTerbaru = Berita::latest()->first();

        $beritaLainnya = Berita::latest()
            ->skip(1)
            ->paginate(8);

        return view('berita', compact(
            'beritaTerbaru',
            'beritaLainnya'
        ));
    }

    /**
     * =========================
     * DETAIL BERITA (USER) - DINAMIS
     * =========================
     */
    public function detberita($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();

        return view('detber', compact('berita'));
    }

    /**
     * =========================
     * GALERI (USER)
     * =========================
     */
    public function galeri()
    {
        $sliders = Galeri::where('section', 'banner')
            ->where('is_active', 1)
            ->orderBy('order')
            ->orderBy('id')
            ->get();

        $thumbnails = Galeri::where('section', 'thumbnail')
            ->where('is_active', 1)
            ->orderBy('order')
            ->orderBy('id')
            ->get();

        return view('galeri', compact('sliders', 'thumbnails'));
    }

    public function kontak()
    {
        return view('kontak');
    }

    /**
     * =========================
     * TENTANG KAMI (USER)
     * =========================
     */
    public function tentang()
    {
        $tentang = Tentang::first();
        return view('tentang', compact('tentang'));
    }

    /* =========================
     * ADMIN PAGES
     * ========================= */

    public function admin()
    {
        return view('admin.dashadm');
    }

    /**
     * =========================
     * DETAIL BERITA (ADMIN) - DINAMIS
     * =========================
     */
    public function Adetberita($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();

        return view('admin.detber', compact('berita'));
    }

    /**
     * =========================
     * TENTANG KAMI (ADMIN)
     * =========================
     */
    public function adminTentang()
    {
        $tentang = Tentang::first();
        return view('admin.tentang', compact('tentang'));
    }

    public function login()
    {
        return view('login.login');
    }
}
