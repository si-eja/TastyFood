<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Galeri;
use App\Models\Tentang;
use App\Models\Berita;
use App\Models\Kontak;
use App\Models\Lokasi;
use App\Models\Menu;
use App\Models\MenuRate;
use App\Models\Service;
use App\Models\User;
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
        $galeriHome = Galeri::where('section', 'thumbnail')->get();

        // Tentang kami
        $tentang = Tentang::first();

        // Menu view
        $menus = Menu::with(['rates' => function ($q) {
            $q->latest();
        }])->latest()->take(4)->get();

        return view('home', compact(
            'beritaUtama', 
            'beritaKecil',
            'galeriHome',
            'tentang',
            'menus'
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
    /**
     * =========================
     * MENU (USER)
     * =========================
     */
    public function menu()
    {
        $allMenu = Menu::with(['rates' => function ($q) {
            $q->latest();
        }])->latest()->get();

        $allRate = MenuRate::with('menu')->latest()->get();

        return view('menu', compact('allMenu', 'allRate'));
    }
    /**
     *========================= 
     * LOKASI (USER)
     * ========================
     */
    public function public()
    {
        $data['lokasi'] = Lokasi::first();
        return view('kontak', $data);
    }

    /**
     *========================= 
     * TEMPLATE (USER)
     *=========================
     */
    public static function get()
    {
        return [
            'userGlobal' => Service::select('email', 'nomor_hp')->first(),
            'locationGlobal' => Lokasi::select('nama_lokasi', 'map_embed')->first(),
            'adminGlobal' => Admin::select('name', 'email')->first()
        ];
    }

    /* =========================
     * ADMIN PAGES
     * ========================= */

    public function admin(Request $request)
    {
        $data['totalBerita'] = Berita::count();
        $data['totalMenu']   = Menu::count();
        $data['totalGaleri'] = Galeri::where('section', 'thumbnail')->count();
        $data['location'] = Lokasi::first();
        $data['user'] = Service::first();
        $query = Kontak::query();
        $data['kontak'] = $query->orderBy('is_read')
                         ->latest()
                         ->get();
        $data['menus'] = Menu::withCount('rates')
            ->latest()
            ->get();
        return view('admin.dashadm', $data);
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
    /**
     * =========================
     * MENU (ADMIN) - DINAMIS
     * =========================
    */
    public function adminMenu(Request $request)
    {
        $menus = Menu::withCount('rates')
            ->when($request->search, function ($q) use ($request) {
                $q->where('nama_menu', 'like', "%{$request->search}%");
            })
            ->latest()
            ->get();
        return view('admin.menu', compact('menus'));
    }
    /**
     * =========================
     * LOKASI (ADMIN)
     * =========================
     */
    public function edit()
    {
        $location = Lokasi::first();
        return view('admin.dashadm', compact('location'));
    }
}
