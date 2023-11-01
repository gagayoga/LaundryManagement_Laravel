<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        $batas = 10;
        $pakets = Paket::get();
        $transaksis = Transaksi::latest()->paginate($batas);
        $outlets = Outlet::get();
        $members = Member::get();
        $users = User::latest()->paginate($batas);
        $no = $batas * ($users->currentPage() - 1);
        $totalusers = User::count();
        $totalpakets = Paket::count();
        $totalmembers = Member::count();
        $totaloutlets = Outlet::count();

        return view('dashboard.index', compact('users', 'transaksis', 'no', 'members', 'pakets', 'totalusers', 'outlets', 'totaloutlets', 'totalpakets', 'totalmembers'));
    }

    public function profile()
    {
        $outlets = Outlet::all();
        $users = auth()->user(); // Mendapatkan informasi pengguna yang login

        return view('dashboard.profile', compact('users', 'outlets'));
    }

    public function updatepassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8',
            'confirm-password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $users = User::find(auth()->user()->id);

        $users->update([
            'password' => $request->password,
        ]);

        session()->flash('success', 'Password berhasil disimpan.');

        return redirect()->route('profile');
    }

    public function update(Request $request)
    {
        $users = User::find(auth()->user()->id);

        $users->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'id_outlet' => $request->id_outlet,
        ]);

        session()->flash('success', 'Data berhasil disimpan.');

        return redirect()->route('profile');
    }

    public function searchmenu(Request $request)
    {
        $query = $request->input('searchmenu');

        $menu = ['dashboard', 'penggunha', 'outlet', 'paket', 'transaksi', 'member'];

        if (in_array($query, $menu)) {
            return redirect(route($query));
        } else {
            return view('dashboard.error.index', compact('query'));
        }
    }

    public function page404()
    {
        return view('dashboard.error.index');
    }
}