<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    // halaman edit
    public function edit()
    {
        $tentang = Tentang::first();
        return view('admin.tentang.edit', compact('tentang'));
    }

    // proses update
    public function update(Request $request)
    {
        $tentang = Tentang::first();

        $data = $request->validate([
            'web_title' => 'required|string',

            'about_title' => 'required|string',
            'about_desc_1' => 'required',
            'about_desc_2' => 'required',
            'about_image_1' => 'nullable|string',
            'about_image_2' => 'nullable|string',

            'visi_desc_1' => 'required',
            'visi_desc_2' => 'required',
            'visi_image_1' => 'nullable|string',
            'visi_image_2' => 'nullable|string',

            'misi_desc_1' => 'required',
            'misi_desc_2' => 'required',
            'misi_image' => 'nullable|string',
        ]);

        $tentang->update($data);

        return redirect()->back()->with('success', 'Data Tentang berhasil diperbarui');
    }
}
