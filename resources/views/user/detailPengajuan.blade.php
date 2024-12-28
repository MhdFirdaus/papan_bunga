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
                        <img src="{{ $pengajuan->gambar_paket }}" alt="Paket A" class="image-preview mb-3">
                        <h5>{{ $pengajuan->nama_paket }}</h5>
                        <p class="text-secondary">Rp. {{ number_format($pengajuan->total_pembayaran, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Kolom kanan: Detail Penyewaan -->
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h5>Detail Penyewaan</h5>
                        <span class="status-badge">{{ $pengajuan->status }}</span>
                        <form class="mt-3">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" value="{{ $pengajuan->nama }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">No Telepon</label>
                                <input type="text" class="form-control" id="telepon" value="{{ $pengajuan->telepon }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan" value="{{ $pengajuan->lokasi }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" rows="2" readonly>{{ $pengajuan->alamat }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" value="{{ $pengajuan->tanggal }}" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="waktu" class="form-label">Waktu</label>
                                    <input type="time" class="form-control" id="waktu" value="{{ $pengajuan->waktu }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="dari" class="form-label">Dari</label>
                                <input type="text" class="form-control" id="dari" value="{{ $pengajuan->dari }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="ucapan" class="form-label">Ucapan</label>
                                <textarea class="form-control" id="ucapan" rows="3" readonly>{{ $pengajuan->ucapan }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metode-pembayaran" class="form-label">Metode Pembayaran</label>
                                <input type="text" class="form-control" id="metode-pembayaran" value="{{ $pengajuan->metode_pembayaran }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="bukti-pembayaran" class="form-label">Bukti Pembayaran</label>
                                <img src="{{ $pengajuan->bukti_pembayaran }}" alt="Bukti Pembayaran" class="image-preview">
                            </div>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">Ajukan Pembatalan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Pembatalan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin mengajukan pembatalan untuk pengajuan ini?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('pengajuan.ajukanPembatalan', $pengajuan->id) }}" method="POST">
                        @csrf
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ajukan Pembatalan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>