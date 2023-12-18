<?php

namespace App\Http\Controllers;

use App\Models\Parkir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParkirController extends Controller
{
    public function masuk(Request $request)
    {
        // Validasi input
        $request->validate([
            'nomor_polisi' => 'required|string',
        ]);

        // Generate kode unik
        $kode_unik = uniqid();

        // Simpan data parkir
        Parkir::create([
            'kode_unik' => $kode_unik,
            'nomor_polisi' => $request->nomor_polisi,
            'waktu_masuk' => now(),
        ]);

        return response()->json(['kode_unik' => $kode_unik], 201);
    }

    public function keluar(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_unik' => 'required|string',
        ]);

        // Cari data parkir
        $parkir = Parkir::where('kode_unik', $request->kode_unik)
            ->whereNull('waktu_keluar')
            ->first();

        if (!$parkir) {
            return response()->json(['message' => 'Data parkir tidak ditemukan atau sudah keluar.'], 404);
        }

        // Hitung biaya parkir
        $waktu_masuk = $parkir->waktu_masuk;
        $waktu_keluar = now();
        $selisih_jam = $waktu_masuk->diffInHours($waktu_keluar);
        $biaya_parkir = $selisih_jam * 3000;

        // Update data parkir
        $parkir->update([
            'waktu_keluar' => $waktu_keluar,
        ]);

        return response()->json(['biaya_parkir' => $biaya_parkir], 200);
    }
}
