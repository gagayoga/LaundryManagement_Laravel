<?php

namespace App\Http\Controllers;

use App\Models\Detailtransaksi;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function index()
    {
        $batas = 20;
        $transaksis = Transaksi::where('status', 'Selesai')->where('status_bayar', 'Dibayar')->paginate($batas);
        $users = User::get();

        return view('dashboard.transaksi.index', compact('transaksis', 'users'));
    }

    public function terbaru()
    {
        $batas = 20;
        $transaksis = Transaksi::where('status', 'Selesai')->where('status_bayar', 'Dibayar')->latest()->paginate($batas);

        return view('dashboard.transaksi.index', compact('transaksis'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('query');

        $transaksis = Transaksi::where(function ($query) use ($searchQuery) {
            $query->where('kode_invoice', 'like', '%'.$searchQuery.'%')
            ->orWhere('diskon', 'like', '%'.$searchQuery.'%')
            ->orWhereHas('user', function ($query) use ($searchQuery) {
                $query->where('username', 'like', '%'.$searchQuery.'%');
            })
            ->orWhereHas('member', function ($query) use ($searchQuery) {
                $query->where('nama', 'like', '%'.$searchQuery.'%');
            });
        })
        ->orderBy('kode_invoice', 'asc')
        ->paginate(20);

        return view('dashboard.transaksi.index', compact('transaksis'));
    }

    public function semua()
    {
        $batas = 20;
        $transaksis = Transaksi::paginate($batas);

        return view('dashboard.transaksi.index', compact('transaksis'));
    }

    public function tambah()
    {
        $transaksis = Transaksi::get();
        $outlets = Outlet::get();
        $members = Member::get();
        $pakets = Paket::get();

        // transaksi invoice
        // Mendapatkan transaksi terakhir untuk mendapatkan nomor urut
        $latestTransaction = Transaksi::latest()->first();
        // Mendapatkan tanggal hari ini dalam format yang sesuai
        $today = now()->format('Ymd');
        $todays = now()->format('Y-m-d');
        // Inisialisasi nomor urut awal
        $nomorUrut = 1;
        // Jika ada transaksi sebelumnya, tambahkan nomor urut berikutnya
        if ($latestTransaction) {
            $nomorUrut = (int) substr($latestTransaction->kode_invoice, -4) + 1;
        }
        // Format nomor urut dengan 4 digit dan tambahkan "TRS" dan tanggal
        $nomorUrutFormatted = sprintf('%04d', $nomorUrut);
        $kodeInvoice = "TRS-{$today}-{$nomorUrutFormatted}";

        return view('dashboard.transaksi.form', compact('transaksis', 'todays', 'kodeInvoice', 'outlets', 'members', 'pakets'));
    }

    // function untuk menyimpan data tarnsaksi
    public function simpan(Request $request)
    {
        $member = Member::find($request->id_member);
        if (!$member) {
            return null;
        }

        // Validasi input data
        $validator = Validator::make($request->all(), [
            'id_outlet' => 'required',
            'kode_invoice' => 'required',
            'id_member' => 'required',
            'id_paket' => 'required',
            'tanggal' => 'required',
            'batas_waktu' => 'required',
            'qty' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
            'status_bayar' => 'required',
        ]);

        // Mengecek apakah validasi berhasil atau tidak, jika tidak maka akan muncul error
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator);
        }

        // Jika validasi terpenuhi semuanya maka akan menambahkan data ke dalam database
        Transaksi::create([
            'id_outlet' => $request->id_outlet,
            'kode_invoice' => $request->kode_invoice,
            'id_member' => $request->id_member,
            'tanggal' => $request->tanggal,
            'batas_waktu' => $request->batas_waktu,
            'tanggal_bayar' => $request->tanggal_bayar,
            'biaya_tambahan' => $request->biaya_tambahan,
            'diskon' => $request->diskon,
            'pajak' => $request->pajak,
            'status' => $request->status,
            'status_bayar' => $request->status_bayar,
            'id_user' => auth()->user()->id,
        ]);

        // mengupdate data pelanggan di transaksi countnya berdasarkan pelanggan yang melakuakn transaksi
        $member->increment('transaksi_count');
        // mengecek apakah pelanggan sudah melakukan transaksi lebih dari 10, jika ya maka status pelanggan akan berubah menjadi member
        if ($member->transaksi_count >= 5) {
            $member->status = 'Member';
            $member->save();
        }

        // mengecek apakah paket ada berdasarkan id paket yang di pilih di combobox
        $paketId = $request->input('id_paket');
        $paket = Paket::find($paketId);
        // menampilkan harga paket berdasarkan id paket yang di pilih
        $hargaPaket = $paket ? $paket->harga : 0;
        // menyimpan harga paket ke dalam sesi (session)
        session(['harga_paket' => $paket ? $paket->harga : null]);

        // Hitung total harga
        $totalHarga = ($hargaPaket * $request->qty) + ($request->pajak + $request->biaya_tambahan) - $request->diskon;

        $transaksi = Transaksi::where('kode_invoice', $request->kode_invoice)->first();
        // menambahkan data ke detailtrabsanski sebagai tabel perantara anatara transaksi dengan tabel paket
        Detailtransaksi::create([
            'id_transaksi' => $transaksi->id,
            'id_paket' => $request->id_paket,
            'qty' => $request->qty,
            'totalharga' => $totalHarga,
            'keterangan' => $request->keterangan,
        ]);

        session()->flash('success', 'Transaksi successfully!');

        return redirect()->route('transaksi');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        $detail = Detailtransaksi::where('id_transaksi', $id)->first();
        $outlets = Outlet::get();
        $members = Member::get();
        $pakets = Paket::get();

        return view('dashboard.transaksi.form', compact('transaksi', 'detail', 'outlets', 'pakets', 'members'));
    }

    public function update($id, Request $request)
    {
        // Mencari transaksi berdasarkan ID
        $transaksi = Transaksi::find($id);
        $detail = Detailtransaksi::where('id_transaksi', $id)->first();

        if (!$transaksi) {
            return redirect()->route('transaksi')->with('error', 'Transaksi tidak ditemukan');
        }

        // Validasi input data
        $validator = Validator::make($request->all(), [
            'id_outlet' => 'required',
            'kode_invoice' => 'required',
            'id_member' => 'required',
            'id_paket' => 'required',
            'tanggal' => 'required',
            'batas_waktu' => 'required',
            'qty' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
            'status_bayar' => 'required',
        ]);

        // Mengecek apakah validasi berhasil atau tidak, jika tidak maka akan muncul error
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator);
        }

        // Perbarui data transaksi
        $transaksi->id_outlet = $request->id_outlet;
        $transaksi->kode_invoice = $request->kode_invoice;
        $transaksi->id_member = $request->id_member;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->batas_waktu = $request->batas_waktu;
        $transaksi->tanggal_bayar = $request->tanggal_bayar;
        $transaksi->biaya_tambahan = $request->biaya_tambahan;
        $transaksi->diskon = $request->diskon;
        $transaksi->pajak = $request->pajak;
        $transaksi->status = $request->status;
        $transaksi->status_bayar = $request->status_bayar;
        $transaksi->id_user = auth()->user()->id;
        $transaksi->save();

        // mengecek apakah paket ada berdasarkan id paket yang di pilih di combobox
        $paketId = $request->input('id_paket');
        $paket = Paket::find($paketId);
        // menampilkan harga paket berdasarkan id paket yang di pilih
        $hargaPaket = $paket ? $paket->harga : 0;
        // Hitung total harga
        $totalHarga = ($hargaPaket * $request->qty) + ($request->pajak + $request->biaya_tambahan) - $request->diskon;

        $detail->id_paket = $request->id_paket;
        $detail->qty = $request->qty;
        $detail->keterangan = $request->keterangan;
        $detail->totalharga = $totalHarga;
        $detail->save();

        // Kembalikan pengguna ke halaman transaksi dengan pesan sukses
        return redirect()->route('transaksi')->with('success', 'Transaksi berhasil diupdate!');
    }

    public function hapus($id)
    {
        // Temukan data transaksi yang akan dihapus
        $transaksis = Transaksi::find($id);

        if ($transaksis) {
            // Hapus data dari tabel transaksi
            $transaksis->delete();
            // Hapus juga data terkait dari tabel detailtransaksis
            $transaksis->Detailtransaksi()->delete();

            $memberId = $transaksis->id_member;
            $member = Member::find($memberId);
            if ($member) {
                $member->decrement('transaksi_count');
                // Jika transaksi_count di bawah 10, ubah status member jika sudah berubah
                if ($member->transaksi_count < 10 && $member->status === 'Member') {
                    $member->status = 'Pelanggan';
                    $member->save();
                }
            }

            session()->flash('success', 'Data transaksi berhasil dihapus.');
        } else {
            session()->flash('error', 'Transaksi tidak ditemukan.');
        }

        return redirect()->route('transaksi');
    }
}
