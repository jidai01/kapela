<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanKub;
use App\Models\KegiatanWilayah;
use App\Models\PenerimaanSakramen;
use App\Models\Kub;
use App\Models\Wilayah;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

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

    public function cetakkegiatanwilayah(Request $request)
    {
        $title = 'Laporan Kegiatan Wilayah';

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
            ->orderBy('tanggal_kegiatan', 'desc')
            ->get();

        $pdf = Pdf::loadView('report-pdf/laporankegiatanwilayahpdf', compact('kegiatanwilayah', 'title'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan_kegiatan_wilayah.pdf');
    }

    public function kegiatankub(Request $request)
    {
        $title = 'Kegiatan KUB';

        $id_kub = $request->input('id_kub');
        $tanggal_mulai = $request->input('tanggal_mulai');
        $tanggal_selesai = $request->input('tanggal_selesai');

        $kegiatankub = KegiatanKub::with('kub')
            ->when($id_kub, function ($query) use ($id_kub) {
                return $query->where('id_kub', $id_kub);
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

        $kub = Kub::all();

        return view('report-display/laporankegiatankub', compact('kegiatankub', 'title', 'kub'));
    }

    public function cetakkegiatankub(Request $request)
    {
        $title = 'Laporan Kegiatan KUB';

        $id_kub = $request->input('id_kub');
        $tanggal_mulai = $request->input('tanggal_mulai');
        $tanggal_selesai = $request->input('tanggal_selesai');

        $kegiatankub = KegiatanKub::with('kub')
            ->when($id_kub, function ($query) use ($id_kub) {
                return $query->where('id_kub', $id_kub);
            })
            ->when($tanggal_mulai, function ($query) use ($tanggal_mulai, $tanggal_selesai) {
                if ($tanggal_selesai) {
                    return $query->whereBetween('tanggal_kegiatan', [$tanggal_mulai, $tanggal_selesai]);
                } else {
                    return $query->where('tanggal_kegiatan', '>=', $tanggal_mulai);
                }
            })
            ->orderBy('tanggal_kegiatan', 'desc')
            ->get();

        $pdf = Pdf::loadView('report-pdf/laporankegiatankubpdf', compact('kegiatankub', 'title'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan_kegiatan_kub.pdf');
    }

    public function penerimaansakramen()
    {
        $title = "Laporan Penerimaan Sakramen";
        return view('report-display/laporanpenerimaansakramen', compact('title'));
    }

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
