<?php


namespace App\Http\Controllers;
use App\Models\Penyewaan;
use App\Models\Pengajuan; // Pastikan model PengajuanPenyewaan diimpor


use Illuminate\Support\Facades\Auth;




use Illuminate\Http\Request;


class PemesananUserController extends Controller
{


    public function indexx()
    {
        $penyewaan = Penyewaan::where('nama', Auth::user()->name)->get();
        $pengajuan = Pengajuan::where('nama', Auth::user()->name)->get();


        $combined = [
            'penyewaan' => $penyewaan,
            'pengajuan' => $pengajuan,
        ];
   
        return view('user.pemesanan', compact('combined'));    }
}





