<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanKub;
use App\Models\KegiatanWilayah;
use App\Models\PenerimaanSakramen;
use App\Models\Wilayah;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function kegiatanwilayah(Request $request)
    {
        $title = 'Kegiatan Wilayah';

        $id_wilayah = $request->input('id_wilayah');
        $tanggal_mulai = $request->input('tanggal_mulai');
        $tanggal_selesai = $request->input('tanggal_selesai');

        $kegiatanwilayah = KegiatanWilayah::with('wilayah')
            ->when($id_wilayah, function ($query) use ($id_wilayah) {
                return $query->where('id_wilayah', $id_wilayah);
            })
            ->when($tanggal_mulai, function ($query) use ($tanggal_mulai, $tanggal_selesai) {
                if ($tanggal_selesai) {
                    return $query->whereBetween('tanggal_kegiatan', [$tanggal_mulai, $tanggal_selesai]);
                } else {
                    return $query->where('tanggal_kegiatan', '>=', $tanggal_mulai);
                }
            })
            ->latest('tanggal_kegiatan')
            ->get();

        $wilayah = Wilayah::all();

        return view('report-display/laporankegiatanwilayah', compact('kegiatanwilayah', 'title', 'wilayah'));
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

    // public function byPenerbit($id) {
    //     $title = "Buku Penerbit";
    //     $content = "Ini halaman Buku Penerbit dari controller";
    //     $penerbit = Penerbit::find($id);

    //     return view('bukuPenerbit', compact('title', 'content', 'penerbit'));
    // }

    // public function cetakkegiatanwilayah(Request $request)
    // {
    //     $id_wilayah = $request->id_wilayah;
    //     $kegiatanwilayah = KegiatanWilayah::where('id_wilayah', $id_wilayah)->get();
    //     $pdf = Pdf::loadview('laporankegiatanwilayahpdf', compact('kegiatanwilayah'));
    //     return $pdf->download();
    // }

    // public function cetakkegiatankub(Request $request)
    // {
    //     $id_kub = $request->id_kub;
    //     $kegiatankub = KegiatanKub::where('id_kub', $id_kub)->get();
    //     $pdf = Pdf::loadview('laporankegiatankubpdf', compact('kegiatankub'));
    //     return $pdf->download();
    // }

    // public function cetakpenerimaansakramen(Request $request)
    // {
    //     $id = $request->id;
    //     $penerimaansakramen = PenerimaanSakramen::where('id', $id)->get();
    //     $pdf = Pdf::loadview('laporanpenerimaansakramenpdf', compact('penerimaansakramen'));
    //     return $pdf->download();
    // }
}
