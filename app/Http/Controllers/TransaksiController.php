<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Handle the upload of payment proof via AJAX.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadBukti(Request $request)
    {
        // Validate the file input
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the uploaded file and get the file path
        $filePath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        // Return the file path as a JSON response
        return response()->json([
            'success' => true,
            'file_path' => $filePath
        ]);
    }

    /**
     * Store a new transaction.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'lokasi' => 'required|string',
            'alamat' => 'required|string',
            'waktu' => 'required',
            'tanggal' => 'required|date',
            'dari' => 'required|string|max:255',
            'pesan' => 'required|string',
            'metode_pembayaran' => 'required|string',
            'bukti_pembayaran' => 'nullable|string',
            'nama_paket' => 'required|string'
        ]);

        // Create a new transaction
        $transaksi = new Transaksi();
        $transaksi->nama = $request->nama;
        $transaksi->telepon = $request->telepon;
        $transaksi->lokasi = $request->lokasi;
        $transaksi->alamat = $request->alamat;
        $transaksi->waktu = $request->waktu;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->dari = $request->dari;
        $transaksi->pesan = $request->pesan;
        $transaksi->metode_pembayaran = $request->metode_pembayaran;
        
        // Save the payment proof path if exists
        if ($request->has('bukti_pembayaran')) {
            $transaksi->bukti_pembayaran = $request->bukti_pembayaran; // File path from AJAX upload
        }

        $transaksi->nama_paket = $request->nama_paket;
        $transaksi->save();

        // Redirect with success message
        return redirect()->route('user.home')->with('success', 'Transaksi berhasil dibuat.');
    }
}
