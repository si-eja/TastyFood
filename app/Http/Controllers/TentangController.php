<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    /**
     * =====================
     * USER (PUBLIC)
     * =====================
     */
    public function index()
    {
        $tentang = Tentang::first();

        return view('tentang-kami', compact('tentang'));
    }

    /**
     * =====================
     * ADMIN
     * =====================
     */
    public function adminIndex()
    {
        $tentang = Tentang::first();

        // kalau belum ada data, buat default
        if (!$tentang) {
            $tentang = Tentang::create([
                'web_title'    => 'Tentang Kami',
                'about_title'  => 'Tasty Food',
                'about_desc_1' => '',
                'about_desc_2' => '',
                'visi_desc_1'  => '',
                'visi_desc_2'  => '',
                'misi_desc_1'  => '',
                'misi_desc_2'  => '',
            ]);
        }

        return view('admin.tentang', compact('tentang'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'web_title'    => 'required|string|max:255',
            'about_title'  => 'required|string|max:255',
            'about_desc_1' => 'required',
            'visi_desc_1'  => 'required',
            'misi_desc_1'  => 'required',
        ]);

        Tentang::updateOrCreate(
            ['id' => 1],
            $request->only([
                'web_title',
                'about_title',
                'about_desc_1',
                'about_desc_2',
                'visi_desc_1',
                'visi_desc_2',
                'misi_desc_1',
                'misi_desc_2',
            ])
        );

        return back()->with('success', 'Data Tentang Kami berhasil disimpan');
    }
}
