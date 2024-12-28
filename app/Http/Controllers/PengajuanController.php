<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class PengajuanController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'lokasi' => 'required|string',
            'alamat' => 'required|string',
            'jenis_paket' => 'required|string',
            'waktu' => 'required',
            'tanggal' => 'required|date',
            'dari' => 'required|string|max:255',
            'ucapan' => 'nullable|string',
            'metode_pembayaran' => 'required|string',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar_paket' =>  'required|string',
            'total_pembayaran' => 'required|numeric', // Tambahkan validasi untuk total_pembayaran
        ]);

        // Proses upload bukti pembayaran jika ada
        $buktiPembayaran = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $buktiPembayaran = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        // Simpan data ke database
        Pengajuan::create([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'lokasi' => $request->lokasi,
            'alamat' => $request->alamat,
            'jenis_paket' => $request->jenis_paket,
            'waktu' => $request->waktu,
            'tanggal' => $request->tanggal,
            'dari' => $request->dari,
            'ucapan' => $request->ucapan,
            'metode_pembayaran' => $request->metode_pembayaran,
            'bukti_pembayaran' => $buktiPembayaran,
            'gambar_paket' => $request->gambar_paket ,
            'total_pembayaran' => $request->total_pembayaran, // Ambil nilai dari form
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Pengajuan berhasil disimpan.');
    }
}
