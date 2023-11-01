<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::paginate(6, ['*'], 'page_number');
        $memberlatest = Member::latest();

        return view('dashboard.member.index', compact('members', 'memberlatest'));
    }

    public function tambah()
    {
        $users = User::get();
        $outlets = Outlet::all();

        return view('dashboard.member.form', compact('users', 'outlets'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('query');

        $members = Member::where(function ($query) use ($searchQuery) {
            $query->where('nama', 'like', '%'.$searchQuery.'%')
                  ->orWhere('alamat', 'like', '%'.$searchQuery.'%')
                  ->orWhere('telepon', 'like', '%'.$searchQuery.'%');
        })
            ->orderBy('nama', 'asc')
            ->paginate(10);

        return view('dashboard.member.index', compact('members'));
    }

    public function terbaru()
    {
        $batas = 6;
        $members = Member::latest()->paginate($batas);

        return view('dashboard.member.index', compact('members'));
    }

    public function simpan(Request $request)
    {
        // // Validasi inputan user\
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'telepon' => 'required',
         ]);

        // Cek apakah data dengan parameter yang sama sudah ada dalam database
        $existingMember = Member::where('nama', $request->nama)
        ->where('alamat', $request->alamat)
        ->where('telepon', $request->telepon)
        ->first();

        if ($existingMember) {
            // Data sudah ada dalam database, tampilkan pesan error
            session()->flash('error', 'Create data gagal, Data sudah terdapat di sistem.');

            return redirect()->route('member');
        }

        // Jika validasi terpenuhi semuanya maka akan menambahkan data ke dalam database
        Member::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telepon' => $request->telepon,
        ]);

        session()->flash('success', 'Data berhasil di tambahkan');

        return redirect()->route('member');
    }

    public function update($id, Request $request)
    {
        // // Validasi inputan user\
        $request->validate([
          'nama' => 'required',
          'alamat' => 'required',
          'jenis_kelamin' => 'required',
          'telepon' => 'required',
         ]);

        // Cari data berdasarkan id
        $members = Member::find($id);

        $members->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telepon' => $request->telepon,
        ]);

        session()->flash('success', 'Data berhasil diupdate.');

        return redirect()->route('member');
    }

    public function hapus($id)
    {
        Member::find($id)->delete();

        session()->flash('success', 'Data berhasil dihapus.');

        return redirect()->route('member');
    }
}