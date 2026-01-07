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
        // Berita besar (1 paling terbaru)
        $beritaUtama = Berita::orderBy('id', 'desc')->first();

        // Berita kecil (4 setelah berita utama)
        $beritaKecil = Berita::where('id', '!=', optional($beritaUtama)->id)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();

        // Galeri home (6 thumbnail)
        $galeriHome = Galeri::where('section', 'thumbnail')
            ->limit(6)
            ->get();

        // Tentang kami
        $tentang = Tentang::first();

        return view('home', compact(
            'beritaUtama', 
            'beritaKecil',
            'galeriHome',
            'tentang'
        ));
    }

    /**
     * =========================
     * BERITA (USER)
     * =========================
     */
    public function berita()
    {
        $beritaTerbaru = Berita::orderBy('id', 'desc')->first();

        $beritaLainnya = Berita::where('id', '!=', optional($beritaTerbaru)->id)
            ->orderBy('id', 'desc')
            ->paginate(8);

        return view('berita', compact(
            'beritaTerbaru',
            'beritaLainnya'
        ));
    }

    /**
     * =========================
     * DETAIL BERITA (USER)
     * =========================
     */
    public function detberita($slug)
    {
        // Berita utama (detail)
        $berita = Berita::where('slug', $slug)->firstOrFail();

        // Berita lainnya (kecuali yang sedang dibuka)
        $beritaLainnya = Berita::where('id', '!=', $berita->id)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();

        return view('detber', compact('berita', 'beritaLainnya'));
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
