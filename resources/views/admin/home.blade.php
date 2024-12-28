<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayumi Florist</title>
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <!-- Add Font Awesome link inside the <head> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="sidebar-nav">
            <li class="active">
            <a href="{{ url('/admin/home') }}">
            <i class="fas fa-home"></i> Beranda
                </a>
            </li>
            <li>
            <a href="{{ url('/admin/kelolaProduk') }}">
            <i class="fas fa-box"></i> Kelola Produk
                </a>
            </li>
            <li>
            <a href="{{ url('/admin/kelolaPenyewaan') }}">
            <i class="fas fa-cogs"></i> Kelola Penyewaan
                </a>
            </li>
            <li>
            <a href="#">
            <i class="fas fa-user-circle"></i> Akun
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar">
            <div class="navbar-container">
                <img src="/images/mitra.png" alt="Ayumi Florist Logo" class="logo">
                <span class="navbar-title">Ayumi Florist</span>
            </div>
        </nav>

        <!-- Content -->
        <div class="content">
            <div class="dashboard-header">
                <h2>Dashboard</h2>
            </div>

            <!-- Cards Section -->
            <div class="card">
    <h3>Total Penyewaan</h3>
    <p class="stat">{{ $totalPenyewaan }}</p> <!-- Menampilkan jumlah total penyewaan -->
</div>

<div class="card">
        <h3>Penyewaan Masuk</h3>
        <p class="stat">{{ $penyewaanMasuk }}</p>
    </div>
    <div class="card">
        <h3>Penyewaan Selesai</h3>
        <p class="stat">{{ $penyewaanSelesai }}</p>
    </div>
            </div>

            <!-- Rentals Section -->
            <div class="rentals">
                <h3>Penyewaan Masuk</h3>
                @if(isset($pengajuan) && $pengajuan->count())
        @foreach($pengajuan as $p)
            <div class="card">
                <p><strong>Penyewaan {{ $p->id }}</strong></p>
                <p>Status: {{ $p->status }}</p>
                <p>Nama: {{ $p->nama }}</p>
                <p>Tanggal: {{ $p->tanggal }}</p>
                
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

            <!-- Wallet Section -->
            <div class="wallet">
                <h3>Jumlah Penghasilan</h3>
                <p class="amount">RP. 120000.00</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
