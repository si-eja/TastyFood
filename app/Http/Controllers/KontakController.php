<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    // simpan pesan kontak dari user
    public function store(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required|string|max:255',
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        Kontak::create($data);

        return redirect()->back()->with(
            'success',
            '🎉 Pesan Anda berhasil dikirim! Terima kasih telah menghubungi kami.'
        );
    }
}
