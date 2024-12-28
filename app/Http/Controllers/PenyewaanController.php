<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Models\Pengajuan; // Pastikan model PengajuanPenyewaan diimpor
use App\Models\ProdukPaket;
use App\Models\DataPapan;



// Pastikan model PengajuanPenyewaan diimpor
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    public function index()
    {
        $penyewaan = Penyewaan::all();
        $pengajuan = Pengajuan::where('status',  'Menunggu Konfirmasi')->get();
        $pengajuanBatal = Pengajuan::where('status', 'Pengajuan Pembatalan')->get();
        $penyewaanDitolak = Pengajuan::where('status', 'Ditolak', 'Dibatalkan')->get();




        // Mengirimkan kedua variabel ke view
        return view('admin.kelolaPenyewaan', compact('penyewaan', 'pengajuan', 'pengajuanBatal', 'penyewaanDitolak'));
    }

    public function updateStatus($id, $status)
    {
        // Temukan data penyewaan berdasarkan ID
        $penyewaan = Penyewaan::find($id);


        if ($penyewaan) {
            // Update status di database
            $penyewaan->status = $status;
            $penyewaan->save();
            if ($status === 'Selesai') {
                $produkPaket = ProdukPaket::where('nama_produk', $penyewaan->jenis_paket)->first();


                if ($produkPaket) {
                    $papan = DataPapan::where('jenis_papan', $produkPaket->jenis_papan)->first();


                    if ($papan) {
                        // Tambahkan kembali stok papan
                        $papan->stok += $produkPaket->jumlah_papan;
                        $papan->save();
                    }
                }
            }


            return response()->json(['message' => 'Status updated successfully.'], 200);
        }

        return response()->json(['message' => 'Penyewaan not found.'], 404);
    }
    public function konfirmasiPengajuan($id)
    {
        // Temukan pengajuan penyewaan berdasarkan ID
        $pengajuan = Pengajuan::find($id);


        if ($pengajuan) {
            // Temukan produk paket berdasarkan jenis_paket
            $produkPaket = ProdukPaket::where('nama_produk', $pengajuan->jenis_paket)->first();


            if (!$produkPaket) {
                return response()->json(['message' => 'Produk paket tidak ditemukan.'], 404);
            }


            // Validasi stok papan yang terkait dengan produk paket
            $papan = DataPapan::where('jenis_papan', $produkPaket->jenis_papan)->first();


            if (!$papan || $papan->stok < $produkPaket->jumlah_papan) {
                return response()->json(['message' => 'Stok papan tidak mencukupi.'], 400);
            }


            // Kurangi stok papan
            $papan->stok -= $produkPaket->jumlah_papan;
            $papan->save();


            // Membuat data penyewaan baru berdasarkan pengajuan
            $penyewaan = new Penyewaan();
            $penyewaan->nama = $pengajuan->nama;
            $penyewaan->telepon = $pengajuan->telepon;
            $penyewaan->lokasi = $pengajuan->lokasi;
            $penyewaan->alamat = $pengajuan->alamat;
            $penyewaan->jenis_paket = $pengajuan->jenis_paket;
            $penyewaan->total_pembayaran = $pengajuan->total_pembayaran;
            $penyewaan->waktu = $pengajuan->waktu;
            $penyewaan->tanggal = $pengajuan->tanggal;
            $penyewaan->dari = $pengajuan->dari;
            $penyewaan->ucapan = $pengajuan->ucapan;
            $penyewaan->metode_pembayaran = $pengajuan->metode_pembayaran;
            $penyewaan->bukti_pembayaran = $pengajuan->bukti_pembayaran;
            $penyewaan->total_pembayaran = $pengajuan->total_pembayaran;
            $penyewaan->status = 'Diproses';
            $penyewaan->save();


            // Hapus pengajuan setelah dikonfirmasi
            $pengajuan->delete();


            return response()->json(['message' => 'Pengajuan berhasil dikonfirmasi dan stok papan diperbarui.'], 200);
        }


        return response()->json(['message' => 'Pengajuan tidak ditemukan.'], 404);
    }





    public function kelolaPenyewaan()
    {
        $penyewaanMasuk = Penyewaan::where('status', 'Menunggu Konfirmasi')->get();
        $pengajuanPembatalan = Penyewaan::where('status', 'Pengajuan Pembatalan')->get();
        $penyewaan = Penyewaan::all();

        return view('admin.kelolaPenyewaan', [
            'penyewaanMasuk' => $penyewaanMasuk,
            'pengajuanPembatalan' => $pengajuanPembatalan,
            'penyewaan' => $penyewaan
        ]);
    }
    public function tolakPengajuan($id)
    {
        $pengajuan = Penyewaan::findOrFail($id);
        $pengajuan->status = 'Ditolak'; // Ubah status menjadi Ditolak
        $pengajuan->save();

        return redirect()->back()->with('success', 'Pengajuan telah ditolak.');
    }

    public function tolakPenyewaan(Request $request, $id)
    {
        // Temukan penyewaan berdasarkan ID
        $pengajuan = Pengajuan::find($id);

        if ($pengajuan) {
            // Ubah status menjadi 'Ditolak'
            $pengajuan->status = 'Ditolak';
            $pengajuan->save();

            return response()->json(['message' => 'Penyewaan telah ditolak.'], 200);
        }

        return response()->json(['message' => 'Penyewaan tidak ditemukan.'], 404);
    }
    public function dashboard()
    {
        $totalPenyewaan = Penyewaan::count(); // Hitung semua penyewaan
        $penyewaanMasuk = Pengajuan::where('status', 'Menunggu Konfirmasi')->count(); // Hitung penyewaan dengan status "masuk"
        $penyewaanSelesai = Penyewaan::where('status', 'Selesai')->count(); // Hitung penyewaan dengan status "selesai"
        $pengajuan = Pengajuan::where('status',  'Menunggu Konfirmasi')->get();

        return view('admin.home', compact('totalPenyewaan', 'penyewaanMasuk', 'penyewaanSelesai', 'pengajuan'));
    }


    public function tolakPembatalan($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'Ditolak'; // Set status ke ditolak
        $pengajuan->save();

        return redirect()->route('admin.pengajuanBatal')->with('success', 'Pengajuan berhasil ditolak.');
    }

    // Aksi untuk mengonfirmasi pengajuan pembatalan
    public function konfirmasiPembatalan($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'Menunggu Konfirmasi'; // Set status ke dikonfirmasi
        $pengajuan->save();

        return redirect()->route('admin.pengajuanBatal')->with('success', 'Pengajuan berhasil dikonfirmasi.');
    }

    public function detailPengajuan($id)
    {
        // Cari data penyewaan berdasarkan ID
        $pengajuan = Pengajuan::findOrFail($id);

        // Return view dengan data penyewaan
        return view('admin.detailPengajuan', compact('pengajuan'));
    }
    public function detailPenyewaan($id)
    {
        // Cari data penyewaan berdasarkan ID
        $penyewaan = Penyewaan::findOrFail($id);

        // Return view dengan data penyewaan
        return view('admin.detailPenyewaan', compact('penyewaan'));
    }
}
