<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function index()
    {
        $outlets = Outlet::get();

        return view('dashboard.outlet.index', compact('outlets'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('query');

        $outlets = Outlet::where(function ($query) use ($searchQuery) {
            $query->where('nama', 'like', '%'.$searchQuery.'%')
                  ->orWhere('alamat', 'like', '%'.$searchQuery.'%')
                  ->orWhere('telepon', 'like', '%'.$searchQuery.'%');
        })
            ->orderBy('nama', 'asc')
            ->get();

        return view('dashboard.outlet.index', compact('outlets'));
    }

    public function terbaru()
    {
        $batas = 10;
        $outlets = Outlet::latest()->paginate($batas);

        return view('dashboard.outlet.index', compact('outlets'));
    }

    public function simpan(Request $request)
    {
        // // Validasi inputan user
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        Outlet::create($request->all());

        session()->flash('success', 'Data berhasil di tambahkan');

        return redirect()->route('outlet');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $outlets = Outlet::find($id);

        $outlets->update($request->all());

        session()->flash('success', 'Data berhasil diupdate.');

        return redirect()->route('outlet');
    }

    public function hapus($id)
    {
        Outlet::find($id)->delete();

        session()->flash('success', 'Data berhasil dihapus.');

        return redirect()->route('outlet');
    }
}