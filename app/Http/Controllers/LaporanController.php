<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanKub;
use App\Models\KegiatanWilayah;
use App\Models\PenerimaanSakramen;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function kegiatanwilayah()
    {
        $title = "Laporan Kegiatan Wilayah";
        return view('report-display/laporankegiatanwilayah', compact('title'));
    }
    
    public function kegiatankub()
    {
        $title = "Laporan Kegiatan Kub";
        return view('report-display/laporankegiatankub', compact('title'));
    }
    
    public function penerimaansakramen()
    {
        $title = "Laporan Penerimaan Sakramen";
        return view('report-display/laporanpenerimaansakramen', compact('title'));
    }

    public function cetakkegiatanwilayah(Request $request)
    {
        $id_wilayah = $request->id_wilayah;
        $kegiatanwilayah = KegiatanWilayah::where('id_wilayah', $id_wilayah)->get();
        $pdf = Pdf::loadview('laporankegiatanwilayahpdf', compact('kegiatanwilayah'));
        return $pdf->download();
    }

    public function cetakkegiatankub(Request $request)
    {
        $id_kub = $request->id_kub;
        $kegiatankub = KegiatanKub::where('id_kub', $id_kub)->get();
        $pdf = Pdf::loadview('laporankegiatankubpdf', compact('kegiatankub'));
        return $pdf->download();
    }

    public function cetakpenerimaansakramen(Request $request)
    {
        $id = $request->id;
        $penerimaansakramen = PenerimaanSakramen::where('id', $id)->get();
        $pdf = Pdf::loadview('laporanpenerimaansakramenpdf', compact('penerimaansakramen'));
        return $pdf->download();
    }
}
