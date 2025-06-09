<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanWilayah;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function kegiatanwilayah()
    {
        $title = "Laporan Kegiatan Wilayah";
        return view('report-admin.laporankegiatanwilayah', compact('title'));
    }

    public function cetakkegiatanwilayah(Request $request)
    {
        $request->validate([
            'bulan' => 'required|numeric|min:1|max:12',
            'tahun' => 'required|numeric|min:2000',
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $kegiatan = KegiatanWilayah::with('wilayah')
            ->whereMonth('tanggal_kegiatan', $bulan)
            ->whereYear('tanggal_kegiatan', $tahun)
            ->get();

        $title = "Laporan Kegiatan Wilayah Bulan $bulan Tahun $tahun";

        $pdf = Pdf::loadView('report-admin.laporankegiatanwilayah_pdf', compact('kegiatan', 'title', 'bulan', 'tahun'));
        return $pdf->download("laporan-kegiatan-$bulan-$tahun.pdf");
    }
}
