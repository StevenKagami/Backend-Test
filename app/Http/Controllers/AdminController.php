<?php

namespace App\Http\Controllers;

use App\Models\Parkir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function laporan(Request $request)
    {
        // Validasi input
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Ambil laporan berdasarkan date range
        $laporan = Parkir::whereBetween('created_at', [$request->start_date, $request->end_date])
            ->get();

        return response()->json(['laporan' => $laporan], 200);
    }

    public function exportLaporan(Request $request)
    {
        
    }
}

