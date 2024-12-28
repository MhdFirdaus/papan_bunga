<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth/styletemplate.css') }}"> <!-- Link ke file CSS -->
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
                    <a class="nav-link" href="http://127.0.0.1:8000/">Home</a>
                </li>
                <li class="nav-item">
                    <a style="color: rgba(150, 234, 211, 1);" class="nav-link active" class="nav-link" href="{{ url('/template') }}">Pesan Sekarang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/lokasi') }}">Lokasi</a>
                </li>
            </ul>
            <!-- Login Button -->
            <a href="{{ route('auth.login') }}" class="btn btn-outline-success ms-2 custom-login-btn">Masuk</a>

        </div>
    </div>
    <br>
    <div class="containerr">
        <br><br>
        <br><br>
        <header>
  <h2 align="center">Preview beberapa paket yang tersedia</h2>
</header>
<h6 align="center">"Jika Anda ingin menyewa papan bunga dengan berbagai ucapan yang sesuai keinginan, silahkan klik salah </h6>
<h6 align="center">satu  paket yang tersedia di bawah ini untuk membuat momen Anda lebih spesial!"</h6>
<br>
<section class="templates">
  <div class="template">
    <a href="{{ route('auth.login') }}">
      <img src="/images/paketA.png" alt="Template 1">
    </a>
  </div>
  <div class="template">
    <a href="{{ route('auth.login') }}">
      <img src="/images/paketB.png" alt="Template 1">
    </a>
  </div>
  <div class="template">
    <a href="{{ route('auth.login') }}">
      <img src="/images/paketC.png" alt="Template 1">
    </a>
  </div>
  <div class="template">
    <a href="{{ route('auth.login') }}">
      <img src="/images/paketD.png" alt="Template 1">
    </a>
  </div>
  <div class="template">
    <a href="{{ route('auth.login') }}">
      <img src="/images/paketE.png" alt="Template 1">
    </a>
  </div>
  <div class="template">
    <a href="{{ route('auth.login') }}">
      <img src="/images/paketF.png" alt="Template 1">
    </a>
  </div>
  <div class="template">
    <a href="{{ route('auth.login') }}">
      <img src="/images/paketG.png" alt="Template 1">
    </a>
  </div>
</section>
<br>
<br>
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
