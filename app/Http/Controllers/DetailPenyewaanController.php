<?php


namespace App\Http\Controllers;


use App\Models\Penyewaan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;


class DetailPenyewaanController extends Controller
{
    public function showPenyewaanDetail($id)
    {
        // Ambil data pemesanan berdasarkan ID
        $penyewaan = Penyewaan::findOrFail($id);


        // Kirim data ke view detail
        return view('user.detailPenyewaan', compact('penyewaan'));
    }


    public function showPengajuanDetail($id)
    {
        // Ambil data pengajuan berdasarkan ID
        $pengajuan = Pengajuan::findOrFail($id);


        // Kirim data ke view detail
        return view('user.detailPengajuan', compact('pengajuan'));
    }
    public function ajukanPembatalan(Request $request, $id)
    {
        $pengajuan = Pengajuan::find($id);


        if ($pengajuan) {
            $pengajuan->status = 'Pengajuan Pembatalan';
            $pengajuan->save();


            return response()->json(['success' => true]);
        }


        return response()->json(['success' => false]);
    }
}





