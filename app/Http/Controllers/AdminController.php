<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // HALAMAN ADMIN KONTAK
    public function kontak(Request $request)
    {
        $query = Kontak::query();

        // SEARCH
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%");
            });
        }

        // Belum dibaca di atas, terbaru dulu
        $kontaks = $query->orderBy('is_read')
                         ->latest()
                         ->get();

        return view('admin.kontak', compact('kontaks'));
    }

    // HAPUS 1 PESAN
    public function kontakHapus($id)
    {
        Kontak::findOrFail($id)->delete();
        return back()->with('success', 'Pesan berhasil dihapus');
    }

    // HAPUS BANYAK PESAN
    public function kontakHapusBanyak(Request $request)
    {
        if (!$request->ids) {
            return back()->with('success', 'Tidak ada pesan yang dipilih');
        }

        Kontak::whereIn('id', $request->ids)->delete();
        return back()->with('success', 'Pesan terpilih berhasil dihapus');
    }

    // TANDAI DIBACA
    public function kontakTandaiDibaca($id)
    {
        Kontak::where('id', $id)->update(['is_read' => true]);
        return back();
    }

    // ADMIN KONTAK EDIT
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'nomor_hp' => 'required'
        ]);

        $user = User::findOrFail(1); // 1 user seeded

        // Normalisasi nomor HP ke +62
        $nomor = preg_replace('/[^0-9]/', '', $request->nomor_hp);

        if (str_starts_with($nomor, '0')) {
            $nomor = '62' . substr($nomor, 1);
        } elseif (!str_starts_with($nomor, '62')) {
            $nomor = '62' . $nomor;
        }

        $user->update([
            'email' => $request->email,
            'nomor_hp' => '+' . $nomor
        ]);

        return back()->with('success', 'Data berhasil diperbarui');
    }
}
