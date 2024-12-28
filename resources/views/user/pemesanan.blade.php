<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user/styleakun.css') }}"> <!-- Link ke file CSS -->
</head>


<body>
    <!-- Navbar Section -->
    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Logo and Brand Name -->
            <div class="d-flex align-items-center">
                <img src="/images/mitra.png" alt="Boardify Logo" class="logo mr-2"> <!-- Gunakan kelas logo di sini -->
                <a href="a" class="navbar-brand">Boardify</a>
            </div>
            <!-- Navigation Links -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a style="color: rgba(150, 234, 211, 1);" class="nav-link active" href="http://127.0.0.1:8000/user/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/user/template') }}">Pesan Sekarang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/user/lokasi') }}">Lokasi</a>
                </li>
            </ul>


            <!-- Login Button -->


            <a href="{{ url('/user/akun') }}" class="btn btn-outline-success ms-2 custom-login-btn">
                <i class="bi bi-person"></i> Akun
            </a>




        </div>
    </div>
    <!-- Content -->
    <section class="account-info">
        <div class="profile-section">
            <i class="bi bi-person-circle user-icon"></i>
            <p class="greeting">Hi, {{ Auth::user()->name }}</p>
            <div class="buttons">
                <a href="{{ url('/user/akun') }}">
                    <button class="">Akun</button>
                </a>


                <a href="{{ url('/user/pemesanan') }}">
                    <button class="active">Pemesanan</button>
                </a>


            </div>
        </div>


        <!-- Informasi Akun -->
        <div class="info-section">
            <h3>Informasi Akun</h3>
            <div>
                <div class="card-view">
                    <div class="card">
                        <div class="card-header">
                            Pemesanan Anda
                        </div>
                        <div class="card-body">
                            @foreach($combined['penyewaan'] as $penyewaan)
                            <div class="d-flex align-items-start mb-3">
                                <!-- Bagian Gambar -->
                                <img src="{{ $penyewaan->gambar_paket }}" alt="Gambar Paket" class="img-fluid" style="width: 100px; height: auto; object-fit: cover;">


                                <!-- Bagian Informasi -->
                                <div class="w-100">
                                    <p>Status : {{ $penyewaan->status }}</p>
                                    <p>Tanggal Sewa : {{ $penyewaan->tanggal }}</p>
                                    <p>Alamat : {{ $penyewaan->alamat }}</p>
                                    <p>Metode Pembayaran : {{ $penyewaan->metode_pembayaran }}</p>
                                    <p>Total Harga : Rp. {{ number_format($penyewaan->total_pembayaran, 0, ',', '.') }}</p>
                                </div>


                                <!-- Button detail di pojok kanan bawah -->
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('penyewaan.detail', $penyewaan->id) }}">
                                        <button type="button" class="btn btn-primary">Detail</button>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                            @foreach($combined['pengajuan'] as $pengajuan)
                            <div class="d-flex align-items-start mb-3">
                                <div class="me-3">
                                    <img src="{{ $pengajuan->gambar_paket }}" alt="Gambar Paket" class="img-fluid" style="width: 100px; height: auto; object-fit: cover;">
                                </div>
                                <div class="w-100">
                                    <p>Status : {{ $pengajuan->status }}</p>
                                    <p>Judul Pengajuan : {{ $pengajuan->tanggal }}</p>
                                    <p>Tanggal Pengajuan : {{ $pengajuan->alamat }}</p>
                                    <p>Keterangan : {{ $pengajuan->metode_pembayaran }}</p>
                                    <p>Total Harga : Rp. {{ number_format($pengajuan->total_pembayaran, 0, ',', '.') }}</p>
                                </div>


                                <!-- Button detail di pojok kanan bawah -->
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('pengajuan.detail', $pengajuan->id) }}">
                                        <button type="button" class="btn btn-primary">Detail</button>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-container">
            <div align="left" class="footer-section">
                <br><br>
                <h4>Tentang Kami</h4>
                <p>
                    Ayumi Florist adalah sebuah platform yang menyediakan media</p>
                <p> pemasaran papan bunga di Kabupaten Bengkalis secara digital. </p>
                <br>
            </div>
            <div align="right" class="footer-section">
                <br><br>
                <h4>Email</h4>
                <p>ayumiflorist@gmail.com</p>
                <h4>WhatsApp</h4>
                <p>+62 82284172603</p>
                <p>+62 81213452191</p>
                <h4>Alamat</h4>
                <p>Jl. Pertanian, Senggoro, Kec. Bengkalis, Kabupaten</p>
                <p>Bengkalis, Riau 28711</p>
                <br>
            </div>
        </div>
    </footer>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>



