<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register()
    {
        // Menampilkan data outlet dan menampilkan halaman register
        $outlets = Outlet::all();

        return view('auth/register', compact('outlets'));
    }

    public function registerSimpan(Request $request)
    {
        // Membuat objek validator required terhadap inputan
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'id_outlet' => 'required',
        ]);

        // Mengecek validasi apakah berhasil atau tidak, jika tidak maka akan muncul error
        if ($validator->fails()) {
            smilify('error', $validator);

            return redirect()->back()
                ->withInput();
        }

        // Menegecek apakah nama sama usernamenya sudah terdapat di database, Jika sudah akan muncul error
        $user = User::where('nama', $request->nama)->orWhere('email', $request->email)->first();
        if ($user) {
            smilify('error', 'Sign Up gagal, data sudah terdaftar di program kami');

            return redirect()->back()
                ->withInput();
        }

        // Jika validasi terpenuhi semuanya maka akan menambahkan data ke dalam database
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_outlet' => $request->id_outlet,
        ]);

        // lalu kembali ke halaman login
        return redirect()->route('sign-in');
    }

    public function login()
    {
        // menampilkan halaman login
        return view('auth/login');
    }

    public function loginAksi(Request $request)
    {
        // // Membuat objek validator untuk validasi semua inputan
        // $validator = Validator::make($request->all(), [
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);

        // // Mengecek apakah validasi berhasil atau tidak, jika tidak maka akan muncul error
        // if ($validator->fails()) {
        //     smilify('error', $validator);

        //     return redirect()->back()
        //     ->withInput();
        // }

        // Mengecek apakah username dan password sesuai dengan database, jika tidak maka akan muncul error
        if (!Auth::attempt($request->only('email', 'password'))) {
            smilify('error', 'Login gagal, periksa username Or password Anda!');

            return redirect()->back()
            ->withInput();
        }

        $users = Auth::User();
        $users->status = 'Online';
        $users->save();

        // Memvalidasi role user dan mengarahkan pengguna berdasarkan role mereka
        if (Auth::User()->role === 'Administrator') {
            $users = User::all();

            return redirect()->route('dashboard', compact('users'));
        } else {
            return redirect()->route('dashboard')->withSuccess('Login Successfuly!'); // Menambahkan session flash success
        }
    }

    public function logout(Request $request)
    {
        $users = Auth::User();
        $users->status = 'Offline';
        $users->save();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
