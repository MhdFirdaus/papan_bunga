<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penyewaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .status-badge {
            background-color: #ffd700;
            color: #000;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }


        .form-control[readonly] {
            background-color: #f9f9f9;
        }


        .image-preview {
            max-width: 100%;
            max-height: 150px;
            object-fit: cover;
        }
    </style>
</head>


<body>
    <div class="container my-5">
        <a href="{{ url('/user/pemesanan') }}" class="btn btn-outline-secondary mb-3">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>


        <div class="row">
            <!-- Kolom kiri: Detail Paket -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ $penyewaan->gambar_paket }}" alt="Paket A" class="image-preview mb-3">
                        <h5>{{ $penyewaan->nama_paket }}</h5>
                        <p class="text-secondary">Rp. {{ number_format($penyewaan->total_pembayaran, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>


            <!-- Kolom kanan: Detail Penyewaan -->
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h5>Detail Penyewaan</h5>
                        <span class="status-badge">{{ $penyewaan->status }}</span>
                        <form class="mt-3">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" value="{{ $penyewaan->nama }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">No Telepon</label>
                                <input type="text" class="form-control" id="telepon" value="{{ $penyewaan->telepon }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan" value="{{ $penyewaan->lokasi }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" rows="2" readonly>{{ $penyewaan->alamat }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" value="{{ $penyewaan->tanggal }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="waktu" class="form-label">Waktu</label>
                                    <input type="time" class="form-control" id="waktu" value="{{ $penyewaan->waktu }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="dari" class="form-label">Dari</label>
                                <input type="text" class="form-control" id="dari" value="{{ $penyewaan->dari }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="ucapan" class="form-label">Ucapan</label>
                                <textarea class="form-control" id="ucapan" rows="3" readonly>{{ $penyewaan->ucapan }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metode-pembayaran" class="form-label">Metode Pembayaran</label>
                                <input type="text" class="form-control" id="metode-pembayaran" value="{{ $penyewaan->metode_pembayaran }}" readonly>
                            </div>
                            <div class="mb-3">
    <label for="bukti-pembayaran" class="form-label">Bukti Pembayaran</label>
    <img src="{{ asset('bukti_pembayaran/' . $penyewaan->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="image-preview">
</div>

                            <button type="button" class="btn btn-danger">Ajukan Pembatalan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>



