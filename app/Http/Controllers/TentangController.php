<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $tentang = Tentang::firstOrFail();

        $data = $request->only([
            'web_title',
            'about_title',
            'about_desc_1',
            'about_desc_2',
            'visi_desc_1',
            'visi_desc_2',
            'misi_desc_1',
            'misi_desc_2',
        ]);

        $images = [
            'about_image_1',
            'about_image_2',
            'visi_image_1',
            'visi_image_2',
            'misi_image',
        ];

        foreach ($images as $img) {
            if ($request->hasFile($img)) {

                // hapus file lama (kalau ada)
                if ($tentang->$img && Storage::disk('public')->exists('tentang/'.$tentang->$img)) {
                    Storage::disk('public')->delete('tentang/'.$tentang->$img);
                }

                $file = $request->file($img);
                $filename = uniqid().'.'.$file->getClientOriginalExtension();

                // simpan ke storage/app/public/tentang
                $file->storeAs('tentang', $filename, 'public');

                $data[$img] = $filename;
            }
        }

        $tentang->update($data);

        return back()->with('success', 'Data Tentang berhasil diperbarui');
    }
}
