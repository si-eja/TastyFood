<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
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

    public function berita()
    {
        return view('berita');
    }

    public function detberita()
    {
        return view('detber');
    }

    /**
     * =========================
     * GALERI (USER) - DINAMIS
     * =========================
     */
    public function galeri()
    {
        // =========================
        // SLIDER (pakai banner)
        // =========================
        $sliders = Galeri::where('section', 'banner')
            ->where('is_active', 1)
            ->orderBy('order')
            ->orderBy('id')
            ->get();

        // =========================
        // THUMBNAIL
        // =========================
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

    public function tentang()
    {
        return view('tentang');
    }

    /* =========================
     * ADMIN PAGES (STATIC VIEW)
     * ========================= */

    public function admin()
    {
        return view('admin.dashadm');
    }

    public function adminBerita()
    {
        return view('admin.berita');
    }

    /**
     * ❗ DISARANKAN TIDAK DIPAKAI
     * Admin galeri seharusnya lewat GaleriController
     */
    public function adminGaleri()
    {
        return redirect()->route('admin.galeri');
    }

    public function adminKontak()
    {
        return view('admin.kontak');
    }

    public function adminTentang()
    {
        return view('admin.tentang');
    }

    public function Adetberita()
    {
        return view('admin.detber');
    }

    public function login()
    {
        return view('login.login');
    }
}
