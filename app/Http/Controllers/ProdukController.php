<?php

namespace App\Http\Controllers;

use App\Models\DataPapan;
use App\Models\ProdukPaket; 
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $dataPapan = DataPapan::all();
        $dataProduk = ProdukPaket::all();

        return view('admin.kelolaProduk', compact('dataPapan', 'dataProduk'));
    }

    // Fungsi untuk mengupdate data papan
    public function update(Request $request, $id_papan)
    {
        // Log data untuk debugging
        // Validasi input
        $validated = $request->validate([
            'jenis_papan' => 'required|string|max:255',
            'bentuk' => 'required|string|max:255',
            'ukuran' => 'nullable|string|max:255',
            'stok' => 'required|integer|min:0',
        ]);

        // Cari data papan berdasarkan ID
        $papan = DataPapan::find($id_papan);

        if (!$papan) {
            return redirect()->back()->with('error', 'Data papan tidak ditemukan.');
        }

        // Update data papan
        $papan->update($validated);

        return redirect()->route('admin.kelolaProduk')->with('success', 'Data papan berhasil diperbarui.');
    }

    // Fungsi untuk mengupdate produk
    public function updateProduk(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'jenis_papan' => 'required|string|max:255',
            'jumlah_papan' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Cari produk berdasarkan ID
        $produk = ProdukPaket::find($id);

        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        // Update data produk
        $produk->update($validated);

        // Jika ada file gambar baru, simpan dan perbarui
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('produk', 'public');
            $produk->gambar = $gambarPath;
            $produk->save();
        }

        return redirect()->route('admin.kelolaProduk')->with('success', 'Produk berhasil diperbarui.');
    }
}
