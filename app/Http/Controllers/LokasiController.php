<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    // UPDATE LOCATION
    public function update(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required|min:3',
            'map_embed' => 'required'
        ]);

        Lokasi::updateOrCreate(
            ['id' => 1],
            [
                'nama_lokasi' => $request->nama_lokasi,
                'map_embed' => $request->map_embed
            ]
        );

        return back()->with('success', 'Lokasi berhasil diperbarui');
    }
}
