<?php

namespace App\Http\Controllers;

use App\Models\Detailtransaksi;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class DetailtransaksiController extends Controller
{
    public function index(Request $request)
    {
        $batas = 20;
        $detailtransaksis = Detailtransaksi::whereHas('transaksi', function ($query) {
            $query->where('status', 'Selesai')->where('status_bayar', 'Dibayar');
        })->paginate($batas);

        return view('dashboard.laporan.index', compact('detailtransaksis'));
    }

    public function filter(Request $request)
    {
        $bulan = $request->input('bulan');
        $batas = 20;

        $detailtransaksis = Detailtransaksi::query();

        if ($bulan) {
            $tahun = date('Y', strtotime($bulan)); // Mengambil tahun dari tanggal yang dipilih
            $bulan = date('m', strtotime($bulan));  // Mengambil bulan dari tanggal yang dipilih
            $awalBulan = "$tahun-$bulan-01";
            $akhirBulan = date('Y-m-t', strtotime($awalBulan));

            $detailtransaksis->whereHas('transaksi', function ($query) use ($awalBulan, $akhirBulan) {
                $query->whereBetween('tanggal', [$awalBulan, $akhirBulan]);
            })->paginate($batas);
        }

        return view('dashboard.laporan.index', compact('detailtransaksis'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('query');
        $batas = 20;

        $detailtransaksis = Detailtransaksi::where(function ($query) use ($searchQuery) {
            $query->where('keterangan', 'like', '%'.$searchQuery.'%')
            ->orWhereHas('transaksi', function ($query) use ($searchQuery) {
                $query->where('status', 'like', '%'.$searchQuery.'%');
            })
            ->orWhereHas('transaksi.member', function ($query) use ($searchQuery) {
                $query->where('nama', 'like', '%'.$searchQuery.'%');
            })
            ->orWhereHas('transaksi.outlet', function ($query) use ($searchQuery) {
                $query->where('nama', 'like', '%'.$searchQuery.'%');
            })
            ->orWhereHas('paket', function ($query) use ($searchQuery) {
                $query->where('nama_paket', 'like', '%'.$searchQuery.'%');
            });
        })->orderBy('keterangan', 'asc')
        ->paginate($batas);

        return view('dashboard.laporan.index', compact('detailtransaksis'));
    }

    public function generatelaporan()
    {
        $detailtransaksis = Detailtransaksi::all();

        $pdf = PDF::loadView('dashboard.laporan_pdf.detaillaporan', compact('detailtransaksis'));

        $pdf->setPaper('landscape');

        return $pdf->download('LaporanTransaksi.pdf');
    }

    public function terbaru()
    {
        $batas = 20;
        $detailtransaksis = Detailtransaksi::whereHas('transaksi', function ($query) {
            $query->where('status', 'Selesai')->where('status_bayar', 'Dibayar');
        })->latest()->paginate($batas);

        return view('dashboard.laporan.index', compact('detailtransaksis'));
    }

    public function semua()
    {
        $batas = 20;
        $detailtransaksis = Detailtransaksi::paginate(20);

        return view('dashboard.laporan.index', compact('detailtransaksis'));
    }
}
