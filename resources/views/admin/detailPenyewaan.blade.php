<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penyewaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f9f9f9;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            color: #333;
        }

        .status {
            padding: 5px 10px;
            background-color: #ffeeba;
            border-radius: 5px;
            color: #856404;
            font-weight: bold;
        }

        .content {
            display: flex;
            gap: 20px;
        }

        .transaction-box {
            flex: 1;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background-color: #f1f1f1;
        }

        .transaction-box h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .transaction-detail {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .transaction-detail p {
            margin: 5px 0;
        }

        .form-box {
            flex: 2;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            width: 100%;
        }

        .form-group textarea {
            resize: none;
            height: 80px;
        }

        .download-button {
            margin-top: 20px;
            text-align: center;
        }

        .download-button button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .download-button button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Detail Penyewaan</h1>
            <span class="status"><?= $penyewaan->status ?></span>
            <a href="{{ url('/user/pemesanan') }}" class="btn btn-outline-secondary mb-3">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="content">
            <div class="transaction-box">
                <h2>Bukti Transaksi</h2>
                <div class="transaction-detail">
                    <img src="<?= $penyewaan->bukti_pembayaran ?>" alt="Bukti Transaksi" class="image-preview">
                </div>
                <div class="download-button">
                    <button>Unduh Gambar</button>
                </div>
            </div>
            <div class="form-box">
                <div class="form-group">
                    <label for="jenis-paket">Jenis Paket</label>
                    <input type="text" id="jenis-paket" value="<?= $penyewaan->jenis_paket ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="text" id="tanggal" value="<?= $penyewaan->tanggal ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" id="harga" value="Rp. <?= number_format($penyewaan->total_pembayaran, 0, ',', '.') ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="waktu">Waktu</label>
                    <input type="text" id="waktu" value="<?= $penyewaan->waktu ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" value="<?= $penyewaan->nama ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="dari">Dari</label>
                    <input type="text" id="dari" value="<?= $penyewaan->dari ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nomor-telepon">Nomor Telepon</label>
                    <input type="text" id="nomor-telepon" value="<?= $penyewaan->telepon ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="ucapan">Ucapan</label>
                    <textarea id="ucapan" readonly><?= $penyewaan->ucapan ?></textarea>
                </div>
                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" id="kecamatan" value="<?= $penyewaan->lokasi ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" value="<?= $penyewaan->alamat ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="metode-pembayaran">Metode Pembayaran</label>
                    <input type="text" id="metode-pembayaran" value="<?= $penyewaan->metode_pembayaran ?>" readonly>
                </div>
            </div>
        </div>
    </div>
</body>

</html>