<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user/styleLokasiUser.css') }}"> <!-- Link ke file CSS -->
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
                    <a class="nav-link" href="http://127.0.0.1:8000/user/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/user/template') }}">Pesan Sekarang</a>
                </li>
                <li class="nav-item">
                <a style="color: rgba(150, 234, 211, 1);" class="nav-link active" class="nav-link" href="{{ url('/user/template') }}">Lokasi</a>
                </li>
            </ul>
            <!-- Login Button -->
            <a href="{{ url('/user/akun') }}" class="btn btn-outline-success ms-2 custom-login-btn">
            <i class="bi bi-person"></i> Akun
            </a>

        </div>
    </div>
    <br>
    <div class="containerr">
        <br><br>
        <header>
  <h2 align="center">Dimana lokasi toko mitra kami?</h2>
</header>
<section class="location-section">
      <div class="location-container">
        <h3 align="left">Ayumi Florist</h3>
        <br>
        <div class="location-content">
          <div class="location-map">
            <img src="/images/lokasi1.png" alt="Map Ayumi Florist">
          </div>
          <div class="location-image">
            <img src="/images/toko.png" alt="Ayumi Florist Store">
          </div>
        </div>
        <div class="button-container">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <button onclick="redirectToGoogleMaps()" class="location-button">
          <i class="fas fa-map-marker-alt"></i> Lihat lokasi
        </button>

          <script>
            function redirectToGoogleMaps() {
              // URL Google Maps untuk lokasi Ayumi Florist
              const url = "https://www.google.com/maps/place/AYUMI+FLORIST/@1.4783577,102.1271127,21z/data=!4m14!1m7!3m6!1s0x31d15e2fc188c287:0x4b8c1957010a2ed!2sAYUMI+FLORIST!8m2!3d1.4784442!4d102.1273004!16s%2Fg%2F11vpjkmy26!3m5!1s0x31d15e2fc188c287:0x4b8c1957010a2ed!8m2!3d1.4784442!4d102.1273004!16s%2Fg%2F11vpjkmy26?entry=ttu&g_ep=EgoyMDI0MTExOS4yIKXMDSoASAFQAw%3D%3D";
              window.open(url, "_blank"); // Membuka URL di tab baru
            }
          </script>
        </div>
      </div>
      <br><br>
      <footer>
    <div class="footer-container">
      <div align="left" class="footer-section">
        <br><br>
        <h4>Tentang Kami</h4>
        <p>
          Ayumi Florist adalah sebuah platform yang menyediakan media</p>
        <p> pemasaran papan bunga  di Kabupaten Bengkalis secara digital. </p> 
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
    <br>
  </footer>
    </section>
  </main>
</body> 
  <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
