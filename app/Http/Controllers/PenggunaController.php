<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
use File;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PenggunaController extends Controller
{
    public function index()
    {
        $users = User::paginate(20, ['*'], 'page_number');
        $outlets = Outlet::all();

        return view('dashboard.pengguna.index', compact('users', 'outlets'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('query');

        $users = User::where(function ($query) use ($searchQuery) {
            $query->where('nama', 'like', '%'.$searchQuery.'%')
                  ->orWhere('email', 'like', '%'.$searchQuery.'%')
                  ->orWhereHas('outlet', function ($query) use ($searchQuery) {
                      $query->where('nama', 'like', '%'.$searchQuery.'%');
                  });
        })
            ->orderBy('nama', 'asc')
            ->paginate(20);

        $outlets = Outlet::all();

        return view('dashboard.pengguna.index', compact('users', 'outlets'));
    }

    public function terbaru()
    {
        $batas = 20;
        $outlets = Outlet::all();
        $users = User::latest()->paginate($batas);

        return view('dashboard.pengguna.index', compact('users', 'outlets'));
    }

    public function status()
    {
        $batas = 20;
        $users = User::where('status', 'Online')->paginate($batas);

        return view('dashboard.pengguna.index', compact('users'));
    }

    public function tambah()
    {
        $mode = 'tambah';
        $users = User::get();
        $outlets = Outlet::all();

        return view('dashboard.pengguna.form', compact('users', 'outlets', 'mode'));
    }

    public function simpan(Request $request)
    {
        // // Validasi inputan user
        $request->validate([
           'password' => 'required|min:8',
            'confirmpassword' => 'required|same:password',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // membuat object dari model user
        $user = new User();
        // memasukan data inputan form ke database melalui request sesuai fieldnya
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->id_outlet = $request->id_outlet;
        $user->role = $request->role;

        // membuat variabel imageuser yang menampung inputan image user
        $imageuser = $request->image;
        // membuat variabel naamfile yang mencari nama filenya
        $namafile = time().'.'.$imageuser->getClientOriginalExtension();

        // memindahkan file inputan ke dalam folder image/upload di public
        $imageuser->move('images/upload', $namafile);

        // mendefinisikan inputan image dan menyimpan di database
        $user->image = $namafile;
        $user->save();

        session()->flash('success', 'Data berhasil di tambahkan');

        return redirect()->route('pengguna');
    }

    public function edit($id)
    {
        $mode = 'edit';
        $user = User::find($id);
        $outlets = Outlet::all();

        return view('dashboard.pengguna.form', compact('user', 'outlets', 'mode'));
    }

    public function update($id, Request $request)
    {
        $users = User::find($id);

        if ($request->has('image')) {
            $users->nama = $request->nama;
            $users->email = $request->email;
            $users->id_outlet = $request->id_outlet;
            $users->role = $request->role;

            $imageuser = $request->image;

            $namafile = time().'.'.$imageuser->getClientOriginalExtension();

            Image::make($imageuser)->resize(200, 150)->save('thumb/'.$namafile);
            $imageuser->move('images/upload', $namafile);
            $users->image = $namafile;
        } else {
            $users->nama = $request->nama;
            $users->email = $request->email;
            $users->id_outlet = $request->id_outlet;
            $users->role = $request->role;
        }

        $users->update();

        session()->flash('success', 'Data berhasil diupdate.');

        return redirect()->route('pengguna');
    }

    public function hapus($id)
    {
        User::find($id)->delete();

        session()->flash('success', 'Data berhasil dihapus.');

        return redirect()->route('pengguna');
    }
}
