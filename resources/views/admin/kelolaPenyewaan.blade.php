<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Penyewaan</title>
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-container {
            flex: 1;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            overflow-x: auto;
            /* Membuat kontainer dapat discroll secara horizontal */
            white-space: nowrap;
            /* Menjaga agar card-card tidak melompat ke baris baru */
        }

        .card-container .card {
            display: inline-block;
            /* Menyusun card secara horizontal */
            margin-right: 10px;
            /* Jarak antar card */
        }

        body {
            font-family: Arial, sans-serif;
        }

        .main-content {
            margin-left: 240px;
            padding: 20px;
        }

        .section-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .card-container {
            flex: 1;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
        }

        .card-container h3 {
            margin-top: 0;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            /* Menambah padding untuk memberi ruang lebih dalam card */
            margin-bottom: 10px;
            width: 250px;
            /* Menentukan lebar card agar sedikit lebih lebar */
        }


        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f1f1f1;
        }

        select {
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        button {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <ul class="sidebar-nav">
            <li><a href="{{ url('/admin/home') }}"><i class="fas fa-home"></i> Beranda</a></li>
            <li><a href="{{ url('/admin/kelolaProduk') }}"><i class="fas fa-box"></i> Kelola Produk</a></li>
            <li class="active"><a href="{{ url('/admin/kelolaPenyewaan') }}"><i class="fas fa-cogs"></i> Kelola Penyewaan</a></li>
            <li><a href="#"><i class="fas fa-user-circle"></i> Akun</a></li>
            <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <nav class="navbar">
            <div class="navbar-container">
                <img src="/images/mitra.png" alt="Ayumi Florist Logo" class="logo">
                <span class="navbar-title">Kelola Penyewaan</span>
            </div>
        </nav>

        <div class="content">

            <h2 class="kelpen">Kelola Penyewaan</h2>

            <div class="section-container">
                <div class="card-container">
                    <h3 class="kelpen">Penyewaan Masuk</h3>
                    @if(isset($pengajuan) && $pengajuan->count())
                    @foreach($pengajuan as $p)
                    <div class="card">
                        <p><strong>Penyewaan {{ $p->id }}</strong></p>
                        <p>Status: {{ $p->status }}</p>
                        <p>Nama: {{ $p->nama }}</p>
                        <p>Tanggal: {{ $p->tanggal }}</p>
                        <p><a href="{{ route('detail.pengajuan', $p->id) }}" class="link-nama" style="color: green; text-decoration: none;">Detail</a></p>

                        <!-- Form Tolak -->
                        <form action="{{ route('tolak.penyewaan', $p->id) }}" method="POST">
                            @csrf
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal{{ $p->id }}">Tolak</button>
                        </form>

                        <!-- Form Konfirmasi -->
                        <form action="{{ route('pengajuan.konfirmasi', $p->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Konfirmasi</button>
                        </form>
                    </div>

                    <!-- Modal Tolak -->
                    <div class="modal fade" id="confirmModal{{ $p->id }}" tabindex="-1" aria-labelledby="confirmModalLabel{{ $p->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmModalLabel{{ $p->id }}">Tolak Penyewaan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menolak penyewaan ini?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('tolak.penyewaan', $p->id) }}" method="POST">
                                        @csrf
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Tolak</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p>Tidak ada penyewaan masuk.</p>
                    @endif
                </div>


                <div class="card-container">
                    <h3>Pengajuan Pembatalan</h3>
                    @if(isset($pengajuanBatal) && $pengajuanBatal->count())
                    @foreach($pengajuanBatal as $p)
                    <div class="card">
                        <p><strong>Penyewaan {{ $p->id }}</strong></p>
                        <p>Status: {{ $p->status }}</p>
                        <p>Nama: {{ $p->nama }}</p>
                        <p>Tanggal: {{ \Carbon\Carbon::parse($p->tanggal)->format('d F Y') }}</p>
                        <p><a href="{{ route('detail.pengajuan', $p->id) }}" class="link-nama" style="color: inherit; text-decoration: none;">Detail</a></p>


                        <!-- Tombol Tolak -->
                        <form action="{{ route('admin.pengajuanTolak', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('POST') <!-- Untuk menandakan bahwa ini adalah POST request -->
                            <button type="submit" class="btn btn-danger">Tolak</button>
                        </form>

                        <!-- Tombol Konfirmasi -->
                        <form action="{{ route('admin.pengajuanKonfirmasi', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('POST') <!-- Untuk menandakan bahwa ini adalah POST request -->
                            <button type="submit" class="btn btn-success">Konfirmasi</button>
                        </form>
                    </div>
                    @endforeach
                    @else
                    <p>Tidak ada pengajuan pembatalan.</p>
                    @endif
                </div>
            </div>

            <div class="section-container">
                <div class="card-container">
                    <h3>Penyewaan Ditolak</h3>
                    <div id="rejectedRentals">
                        @if(isset($penyewaanDitolak) && $penyewaanDitolak->count())
                        @foreach($penyewaanDitolak as $p)
                        <div class="card">
                            <p><strong>Penyewaan {{ $p->id }}</strong></p>
                            <p>Status: {{ $p->status }}</p>
                            <p>Nama: {{ $p->nama }}</p>
                            <p>Tanggal: {{ $p->tanggal }}</p>
                        </div>
                        @endforeach
                        @else
                        <p>Tidak ada penyewaan ditolak.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="rentals">
                <h3>Daftar Penyewaan</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Penyewaan</th>
                            <th>Nama</th>
                            <th>Tanggal Penyewaan</th>
                            <th>Total Pembayaran</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penyewaan as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>
                                <a href="{{ route('detail.penyewaan', $p->id) }}" class="link-nama" style="color: inherit; text-decoration: none;">
                                    {{ $p->nama }}
                                </a>
                            </td>
                            <td>{{ $p->tanggal }}</td>
                            <td>Rp {{ number_format($p->total_pembayaran, 2, ',', '.') }}</td>
                            <td>
                                <select onchange="updateStatus(this.value, '{{ $p->id }}')">
                                    <option value="Menunggu Konfirmasi" {{ $p->status == 'Menunggu Konfirmasi' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                    <option value="Diproses" {{ $p->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="Dalam penyewaan" {{ $p->status == 'Dalam penyewaan' ? 'selected' : '' }}>Dalam penyewaan</option>
                                    <option value="Selesai" {{ $p->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="Dibatalkan" {{ $p->status == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function rejectRental(id) {
            const rejectedRentalsContainer = document.getElementById('rejectedRentals');
            const card = document.querySelector(`[data-id='${id}']`);

            if (card) {
                const rejectedCard = card.cloneNode(true);
                rejectedCard.querySelector('button').remove();
                rejectedRentalsContainer.appendChild(rejectedCard);

                card.remove(); // Remove from current list
            }
        }
    </script>
    <script>
        function updateStatus(status, id) {
            console.log('Status:', status); // Pastikan status terkirim dengan benar
            console.log('ID Penyewaan:', id); // Pastikan ID terkirim dengan benar

            // URL endpoint yang digunakan untuk update status
            const url = `{{ url('/update-status') }}/${id}/${status}`;

            // Menggunakan fetch untuk mengupdate status
            fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Pastikan CSRF token ada
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        status
                    }) // Kirim data sebagai JSON
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal memperbarui status');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert(data.message); // Tampilkan pesan jika berhasil
                        // Optional: Lakukan refresh halaman atau pembaruan data di UI
                    } else {
                        throw new Error(data.message || 'Terjadi kesalahan');
                    }
                })
                .catch(error => {
                    alert(`Error: ${error.message}`); // Tampilkan pesan error jika ada masalah
                });
        }
    </script>

</body>

</html>