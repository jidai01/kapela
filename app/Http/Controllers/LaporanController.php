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

        return $pdf->download('laporan_kegiatan_wilayah_' . Carbon::now()->format('d-m-Y') . '.pdf');
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

        return $pdf->download('laporan_kegiatan_kub_' . Carbon::now()->format('d-m-Y') . '.pdf');
    }

    public function penerimaansakramen(Request $request)
    {
        $title = 'Penerimaan Sakramen';

        $id = $request->input('id');
        $tanggal_mulai = $request->input('tanggal_mulai');
        $tanggal_selesai = $request->input('tanggal_selesai');

        $penerimaansakramen = PenerimaanSakramen::with(['umat', 'sakramen'])
            ->when($id, function ($query) use ($id) {
                return $query->where('id', $id);
            })
            ->when($tanggal_mulai, function ($query) use ($tanggal_mulai, $tanggal_selesai) {
                if ($tanggal_selesai) {
                    return $query->whereBetween('tanggal_penerimaan_sakramen', [$tanggal_mulai, $tanggal_selesai]);
                } else {
                    return $query->where('tanggal_penerimaan_sakramen', '>=', $tanggal_mulai);
                }
            })
            ->latest('tanggal_penerimaan_sakramen')
            ->get();

        return view('report-display/laporanpenerimaansakramen', compact('penerimaansakramen', 'title'));
    }

    public function cetakpenerimaansakramen(Request $request)
    {
        $title = 'Laporan Penerimaan Sakramen';

        $id_sakramen = $request->input('id_sakramen');
        $tanggal_mulai = $request->input('tanggal_mulai');
        $tanggal_selesai = $request->input('tanggal_selesai');

        $penerimaansakramen = PenerimaanSakramen::with(['umat', 'sakramen'])
            ->when($id_sakramen, function ($query) use ($id_sakramen) {
                return $query->where('id_sakramen', $id_sakramen);
            })
            ->when($tanggal_mulai, function ($query) use ($tanggal_mulai, $tanggal_selesai) {
                if ($tanggal_selesai) {
                    return $query->whereBetween('tanggal_penerimaan_sakramen', [$tanggal_mulai, $tanggal_selesai]);
                } else {
                    return $query->where('tanggal_penerimaan_sakramen', '>=', $tanggal_mulai);
                }
            })
            ->orderBy('tanggal_penerimaan_sakramen', 'desc')
            ->get();

        $pdf = Pdf::loadView('report-pdf/laporanpenerimaansakramenpdf', compact('penerimaansakramen', 'title'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan_penerimaan_sakramen_' . Carbon::now()->format('d-m-Y') . '.pdf');
    }
}
