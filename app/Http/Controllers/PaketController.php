<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $outlets = Outlet::get();
        $pakets = Paket::get();

        return view('dashboard.paket.index', compact('outlets', 'pakets'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('query');

        $pakets = Paket::where(function ($query) use ($searchQuery) {
            $query->where('nama_paket', 'like', '%'.$searchQuery.'%')
                  ->orWhere('jenis', 'like', '%'.$searchQuery.'%')
                  ->orWhere('harga', 'like', '%'.$searchQuery.'%')
                  ->orWhereHas('outlet', function ($query) use ($searchQuery) {
                      $query->where('nama', 'like', '%'.$searchQuery.'%');
                  });
        })
            ->orderBy('nama_paket', 'asc')
            ->get();

        $outlets = Outlet::all();

        return view('dashboard.paket.index', compact('pakets', 'outlets'));
    }

    public function terbaru()
    {
        $batas = 6;
        $outlets = Outlet::latest()->paginate($batas);

        return view('dashboard.outlet.index', compact('outlets'));
    }

    public function simpan(Request $request)
    {
        // // Validasi inputan user\
        $request->validate([
            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required',
         ]);

        // Cek apakah data dengan parameter yang sama sudah ada dalam database
        $existingPaket = Paket::where('id_outlet', $request->id_outlet)
        ->where('jenis', $request->jenis)
        ->where('nama_paket', $request->nama_paket)
        ->first();

        if ($existingPaket) {
            // Data sudah ada dalam database, tampilkan pesan error
            session()->flash('error', 'Data sudah ada dalam database.');

            return redirect()->route('paket');
        }

        // Jika validasi terpenuhi semuanya maka akan menambahkan data ke dalam database
        Paket::create([
            'id_outlet' => $request->id_outlet,
            'jenis' => $request->jenis,
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
        ]);

        session()->flash('success', 'Data berhasil di tambahkan');

        return redirect()->route('paket');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required',
         ]);

        // Cari data berdasarkan id
        $pakets = Paket::find($id);

        $pakets->update([
            'id_outlet' => $request->id_outlet,
            'jenis' => $request->jenis,
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
        ]);

        session()->flash('success', 'Data berhasil diupdate.');

        return redirect()->route('paket');
    }

    public function hapus($id)
    {
        Paket::find($id)->delete();

        session()->flash('success', 'Data berhasil dihapus.');

        return redirect()->route('paket');
    }
}
