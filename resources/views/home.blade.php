<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth/style.css') }}"> <!-- Link ke file CSS -->
</head>

<body>
    <!-- Navbar Section -->
    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Logo and Brand Name -->
            <div class="d-flex align-items-center">
                <img src="/images/mitra.png" alt="Boardify Logo" class="logo mr-2"> <!-- Gunakan kelas logo di sini -->
                <a href="a" class="navbar-brand">Ayumi Florist</a>
            </div>
            <!-- Navigation Links -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a style="color: rgba(150, 234, 211, 1);" class="nav-link active" href="http://127.0.0.1:8000/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/template') }}">Pesan Sekarang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/lokasi') }}">Lokasi</a>
                </li>
            </ul>

            <!-- Login Button -->
            <a href="{{ route('auth.login') }}" class="btn btn-outline-success ms-2 custom-login-btn">Masuk</a>

        </div>
    </div>

    <!-- Main Content -->
    <div class="containerrr" style="margin-top: 150px;">
        <div class="row">
            <div class="col-12 text-center">
            <h5 class="special-text">Sewa papan bunga</h5>
            <h4 class="special-text">untuk setiap moment spesial</h4>
            <br>
            <h5 class="special-textt">Wujudkan setiap moment indah kepada orang orang-orang tersayang</h5>
            
            <img src="/images/logoo.png" alt="Papan Bunga Digital" class="img-fluid mt-4" />
            <br>
            <br>
            <h4 style="font-weight: bold;">Misi Kami</h4>
            <br>
            <h6>“Menjadi platform digital utama dalam menyediakan layanan penyewaan papan bunga yang berkualitas, </h6>
            <h6>mudah, dan cepat, serta menjadi pilihan utama pelanggan”</h6>
            <br>
            <br>
            </div>
        </div>
    </div>
    <div class="containerr">
        <br>
        <br>
    <!-- Logo and Brand Name -->
    <div class="d-flex justify-content-center align-items-center">
            <img src="/images/mitra.png" alt="Boardify Logo" class="logo mr-2"> <!-- Gunakan kelas logo di sini -->
            <a href="a" class="navbar-brand"></a>
        </div>
    <header>
      <h1>Bagaimana cara menyewa?</h1>
      <p>Berikut adalah 4 langkah untuk mulai menyewa papan bunga secara digital.</p>
    </header>
    <div class="content">
      <div class="steps">
        <div class="step">
          <div class="step-number">1</div>
          <div class="step-text">
          <h2>Pilih paket</h2>
          <p>Pilih paket yang diinginkan.</p>
          </div>
        </div>
        <div class="step">
          <div class="step-number">2</div>
          <div class="step-text">
          <h2>Isi form penyewaan</h2>
          <p>selesaikan form penyewaan untuk melakukan
          penyewaan papan bunga.</p>
          </div>
        </div>
        <div class="step">
          <div class="step-number">3</div>
          <div class="step-text">
          <h2>Sesuaikan teks</h2>
          <p>masukkan kalimat ucapan yang anda inginkan.</p>
          </div>
        </div>
        <div class="step">
          <div class="step-number">4</div>
          <div class="step-text">
            <h2>Pembayaran</h2>
            <p>pilih metode pembayaran untuk menyelesaikan
            transaksi online anda, ini 100% aman.</p>
          </div>
        </div>
      </div>
      <div class="image">
        <img src="/images/bagai3.png" alt="Mockup aplikasi" />
        <br>
        <br>
        <br>
      </div>
    </div>
  </div>
  <footer>
    <div class="footer-container">
      <div align="left" class="footer-section">
        <h4>Tentang Kami</h4>
        <p>
          Ayumi Florist adalah sebuah platform yang menyediakan media</p>
        <p> pemasaran papan bunga  di Kabupaten Bengkalis secara digital. </p> 
        
      </div>
      <div align="right" class="footer-section">
        <h4>Email</h4>
        <p>ayumiflorist@gmail.com</p>
        <h4>WhatsApp</h4>
        <p>+62 82284172603</p>
        <p>+62 81213452191</p>
        <h4>Alamat</h4>
        <p>Jl. Pertanian, Senggoro, Kec. Bengkalis, Kabupaten</p> 
        <p>Bengkalis, Riau 28711</p>
      </div>
    </div>
  </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
