<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\PemesananUserController;
use App\Http\Controllers\DetailPenyewaanController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Route untuk autentikasi
Route::get('/auth/login', [LoginRegisterController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [LoginRegisterController::class, 'register'])->name('auth.register');

// Route untuk halaman berdasarkan level user
Route::get('/user/home', [LoginRegisterController::class, 'userHome'])->name('user.home');
Route::get('/admin/home', [LoginRegisterController::class, 'adminHome'])->name('admin.home');

// Route untuk proses autentikasi
Route::post('/postRegister', [LoginRegisterController::class, 'postRegister'])->name('postRegister');
Route::post('/postLogin', [LoginRegisterController::class, 'postLogin'])->name('postLogin');

// Route untuk logout
Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');


//rote template
Route::get('/template', function () {
    return view('template'); // Mengarahkan ke halaman bagaimana menyewa
});
Route::get('/user/template', function () {
    return view('user/template'); // Mengarahkan ke halaman bagaimana menyewa
});
Route::get('/user/template1', function () {
    return view('/user/template1'); // Mengarahkan ke halaman bagaimana menyewa
});
Route::get('/user/template2', function () {
    return view('/user/template2'); // Mengarahkan ke halaman bagaimana menyewa
});
Route::get('/user/template3', function () {
    return view('/user/template3'); // Mengarahkan ke halaman bagaimana menyewa
});
Route::get('/user/template4', function () {
    return view('/user/template4'); // Mengarahkan ke halaman bagaimana menyewa
});
Route::get('/user/template5', function () {
    return view('/user/template5'); // Mengarahkan ke halaman bagaimana menyewa
});
Route::get('/user/template6', function () {
    return view('/user/template6'); // Mengarahkan ke halaman bagaimana menyewa
});
Route::get('/user/template7', function () {
    return view('/user/template7'); // Mengarahkan ke halaman bagaimana menyewa
});

//route lokasi
Route::get('/lokasi', function () {
    return view('lokasi'); // Mengarahkan ke halaman bagaimana menyewa
});
Route::get('/user/lokasi', function () {
    return view('/user/lokasi'); // Mengarahkan ke halaman bagaimana menyewa
});

//route akun
Route::get('/user/akun', function () {
    return view('/user/akun'); // Mengarahkan ke halaman bagaimana menyewa
});
Route::get('/user/pemesanan', function () {
    return view('/user/pemesanan'); // Mengarahkan ke halaman bagaimana menyewa
});

// pengajuan penyewaan
// routes/web.php
Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');



//admin
Route::get('/admin/kelolaProduk', function () {
    return view('/admin/kelolaProduk'); // Mengarahkan ke halaman bagaimana menyewa
});
Route::get('/admin/kelolaProduk', [ProdukController::class, 'index'])->name('admin.kelolaProduk');
Route::put('/admin/kelolaProduk/update/{id_papan}', [ProdukController::class, 'update'])->name('kelolaProduk.update');


Route::get('/admin/kelolaPenyewaan', function () {
    return view('/admin/kelolaPenyewaan');
});
Route::get('/admin/kelolaPenyewaan', [PenyewaanController::class, 'index']);
Route::post('/update-status/{id}/{status}', [PenyewaanController::class, 'updateStatus'])->name('update.status');
Route::get('/update-status/{id}/{status}', [PenyewaanController::class, 'updateStatus']);
Route::post('/konfirmasi-pengajuan/{id}', [PenyewaanController::class, 'konfirmasiPengajuan'])->name('pengajuan.konfirmasi');
Route::post('/pengajuan/tolak/{id}', [PenyewaanController::class, 'tolakPengajuan'])->name('pengajuan.tolak');
Route::post('/pengajuan/{id}/tolakPenyewaan', [PenyewaanController::class, 'tolakPenyewaan'])->name('tolak.penyewaan');



Route::put('/admin/kelolaProduk/updateProduk/{id}', [ProdukController::class, 'updateProduk'])->name('kelolaProduk.updateProduk');


//akun
Route::get('/user/pemesanan', [PemesananUserController::class, 'indexx']);
// Routing untuk Detail Penyewaan
Route::get('/user/penyewaan/{id}/detail', [DetailPenyewaanController::class, 'showPenyewaanDetail'])->name('penyewaan.detail');


// Routing untuk Detail Pengajuan
Route::get('/user/pengajuan/{id}/detail', [DetailPenyewaanController::class, 'showPengajuanDetail'])->name('pengajuan.detail');


Route::post('/user/pengajuan/{id}/ajukan-pembatalan', [DetailPenyewaanController::class, 'ajukanPembatalan'])->name('pengajuan.ajukanPembatalan');
Route::get('/admin/home', [PenyewaanController::class, 'dashboard']);

Route::post('/konfirmasi-pengajuan/{id}', [PenyewaanController::class, 'konfirmasiPengajuan'])->name('pengajuan.konfirmasi');
Route::post('/pengajuan/tolak/{id}', [PengajuanController::class, 'tolak'])->name('tolak.penyewaan');
Route::get('/admin/dashboard', [PenyewaanController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/dashboard', [PenyewaanController::class, 'pengajuan'])->name('admin.dashboard');

// Route::post('/user/pengajuan/{id}/ajukan-pembatalan', [DetailPenyewaanController::class, 'ajukanPembatalan'])->name('pengajuan.ajukanPembatalan');
// Route::post('/admin/pengajuan/{id}/ajukan-pembatalan', [PenyewaanController::class, 'pengajuanBatal'])->name('admin.pengajuanBatal');
Route::post('/admin/pengajuan-batal/tolak/{id}', [PenyewaanController::class, 'konfirmasiPembatalan'])->name('admin.pengajuanTolak');
Route::post('/admin/pengajuan-batal/konfirmasi/{id}', [PenyewaanController::class, 'tolakPembatalan'])->name('admin.pengajuanKonfirmasi');
Route::get('/admin/pengajuan-batal', [PenyewaanController::class, 'index'])->name('admin.pengajuanBatal');


Route::get('/detail-pengajuan/{id}', [PenyewaanController::class, 'detailPengajuan'])->name('detail.pengajuan');
Route::get('/detail-penyewaan/{id}', [PenyewaanController::class, 'detailPenyewaan'])->name('detail.penyewaan');
