<?php

namespace App\Http\Controllers;

use App\Models\User; // Import Model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth
use Illuminate\Support\Facades\Hash; // Import Hash

class LoginRegisterController extends Controller
{
    // Tampilkan halaman login
    public function login() {
        return view('auth.login');
    }

    // Tampilkan halaman register
    public function register() {
        return view('auth.register');
    }

    // Halaman home user
    public function userHome() {
        return view('user.home');
    }

    // Halaman home admin
    public function adminHome() {
        return view('admin.home');
    }

    // Proses Registrasi
    public function postRegister(Request $request) {
        // Validasi Input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:8|max:20|confirmed',
        ]);

        // Simpan Data User
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Enkripsi password
        $user->level = 'user'; // Default level user
        $user->save();

        // Redirect ke halaman login jika berhasil
        if ($user) {
            return redirect('/auth/login')->with('success', 'Akun berhasil dibuat, silahkan login!');
        } else {
            return back()->with('failed', 'Registrasi gagal, coba lagi!');
        }
    }

    // Proses Login
    public function postLogin(Request $request) {
        // Validasi Input
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:20'
        ]);

        // Attempt Login
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user(); // Ambil data user yang sedang login
            
            // Redirect berdasarkan level user
            if ($user->level == 'user') {
                return redirect('/user/home')->with('success', 'Selamat datang, ' . $user->name . '!');
            } elseif ($user->level == 'admin') {
                return redirect('/admin/home')->with('success', 'Selamat datang Admin, ' . $user->name . '!');
            }
        }

        // Jika gagal login
        return back()->with('failed', 'Email atau password salah!');
    }

    // Proses Logout
    public function logout() {
        Auth::logout();
        return redirect('/')->with('success', 'Anda berhasil logout!');
    }
}
