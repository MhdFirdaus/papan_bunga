<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user/styletemp1.css') }}"> <!-- Link ke file CSS -->
</head>

<body>
    <!-- Navbar Section -->
    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Logo and Brand Name -->
            <div class="d-flex align-items-center">
                <img src="/images/mitra.png" alt="Boardify Logo" class="logo mr-2">
                <a href="a" class="navbar-brand">Ayumi Florist</a>
            </div>
            <!-- Navigation Links -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.1:8000/user/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color: rgba(150, 234, 211, 1);" href="{{ url('/user/template') }}">Pesan Sekarang</a>
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
    <br><br><br>

    <!-- Main Section -->
    <main class="containerr">
        <section class="main-content">
            <!-- Produk -->
            <div class="product-card">
                <img src="/images/paketB.png" alt="Papan Bunga">
                <h3>Paket B</h3>
                <p class="price">Rp. 200.000</p>
            </div>

            <!-- Form Penyewaan -->
            <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data" class="rental-form" novalidate>
                @csrf
                <input type="hidden" id="jenis-paket" name="jenis_paket" value="Paket B">
                <input type="hidden" id="total_pembayaran" name="total_pembayaran" value="">
                <input type="hidden" id="gambar-paket" name="gambar_paket" value="/images/paketB.png">

                <h2>Form Penyewaan</h2>
                <div class="form-container">
                    <!-- Kolom Kiri -->
                    <div class="form-column">
                        <div class="form-group">
                            <label for="name">Username</label>
                            <!-- Ambil data nama dari user yang sedang login -->
                            <input type="text" id="name" name="nama" value="{{ Auth::user()->name }}" readonly class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="phone">No Telepon</label>
                            <input type="tel" id="phone" name="telepon" placeholder="Masukkan nomor telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Lokasi</label>
                            <select id="location" name="lokasi" required>
                                <option value="">Pilih lokasi</option>
                                <option value="Bengkalis">Bengkalis</option>
                                <option value="Bantan">Bantan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" id="address" name="alamat" placeholder="Masukkan alamat" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="time">Waktu</label>
                                <input type="time" id="time" name="waktu" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Tanggal</label>
                                <input type="date" id="date" name="tanggal" required>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="form-column">
                        <div class="form-group">
                            <label for="from">Dari</label>
                            <input type="text" id="from" name="dari" placeholder="Masukkan pengirim" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Ucapan</label>
                            <textarea id="message" name="ucapan" placeholder="Masukkan ucapan Anda"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Metode Pembayaran</label>
                            <div class="radio-group">
                                <label>
                                    <input type="radio" name="metode_pembayaran" value="BRI" onclick="showAccount('BRI')">
                                    <img src="/images/bri.png" alt="Logo BRI" class="payment-logo"> BRI
                                </label>
                                <label>
                                    <input type="radio" name="metode_pembayaran" value="DANA" onclick="showAccount('DANA')">
                                    <img src="/images/dana.png" alt="Logo Dana" class="payment-logo"> DANA
                                </label>
                            </div>

                            <div id="BRI" class="account-info">
                                <p>Nomor Rekening BRI: 018901033329508</p>
                            </div>

                            <div id="DANA" class="account-info">
                                <p>Nomor Rekening DANA: 082284172603 </p>
                            </div>
                        </div>

                        <div class="form-group upload-section">
                            <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
                            <div class="upload-box" onclick="document.getElementById('bukti_pembayaran').click()">
                                <span id="upload-text">Klik di sini untuk mengunggah bukti pembayaran</span>
                                <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*" style="display: none;" onchange="showFileName()">
                            </div>
                        </div>
                        <script>
                            function showFileName() {
                                const input = document.getElementById('bukti_pembayaran');
                                const uploadText = document.getElementById('upload-text');

                                if (input.files && input.files.length > 0) {
                                    uploadText.textContent = 'File: ${input.files[0].name}';
                                } else {
                                    uploadText.textContent = 'Klik di sini untuk mengunggah bukti pembayaran';
                                }
                            }
                        </script>


                        <script>
                            function showAccount(type) {
                                // Hide all account info divs
                                document.querySelectorAll('.account-info').forEach(div => {
                                    div.style.display = 'none';
                                });

                                // Show the selected account info
                                const selectedDiv = document.getElementById(type);
                                if (selectedDiv) {
                                    selectedDiv.style.display = 'block';
                                }
                            }
                        </script>

                    </div>
                </div>
                <div class="form-actions">
                    <a href="https://wa.me/6282284172603?text=Halo%20admin,%20saya%20ingin%20menyewa%20papan%20bunga"
                        target="_blank" class="btn chat-btn">
                        <img src="/images/logowa.png" alt="WhatsApp" class="wa-icon">
                        Chat Admin
                    </a>
                    <button type="submit" class="confirm-btnn">Konfirmasi</button>
                </div>
            </form>
        </section>
        <div class="description-box">
        <h7>Deskripsi</h7>
        <p>Paket ini menggunakan 1 buah papan berjenis jati belanda berbentuk persegi panjang.</p>
        <h7>Catatan!</h7>
        <p class="note"><i class="fas fa-info-circle"></i> Pengajuan pembatalan hanya bisa dilakukan H-2 sebelum pengantaran.</p>
        </div>

        <!-- Galeri -->
        <section class="product-gallery">
            <h6>Papan Bunga Lainnya</h6>
            <div class="gallery">
                <div class="gallery-item">
                    <a href="{{ url('/user/template1') }}">
                        <img src="/images/paketA.png" alt="Papan Bunga 1">
                        <p>Rp. 200.000</p>
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="{{ url('/user/template3') }}">
                        <img src="/images/paketC.png" alt="Papan Bunga 2">
                        <p>Rp. 230.000</p>
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="{{ url('/user/template4') }}">
                        <img src="/images/paketD.png" alt="Papan Bunga 3">
                        <p>Rp. 400.000</p>
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="{{ url('/user/template5') }}">
                        <img src="/images/paketE.png" alt="Papan Bunga 4">
                        <p>Rp. 450.000</p>
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="{{ url('/user/template6') }}">
                        <img src="/images/paketF.png" alt="Papan Bunga 5">
                        <p>Rp. 130.000</p>
                    </a>
                </div>
                <div class="gallery-item">
                    <a href="{{ url('/user/template7') }}">
                        <img src="/images/paketG.png" alt="Papan Bunga 6">
                        <p>Rp. 130.000</p>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <div id="custom-popup-warning" class="custom-popup">
        <div class="custom-popup-content">
            <span class="custom-popup-close">&times;</span>
            <p>Ups, terdapat form kosong, harap lengkapi terlebih dahulu ya.</p>
            <button class="custom-popup-btn">OK</button>
        </div>
    </div>

    <br>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.payment-options input[type="radio"]').forEach((radio) => {
            radio.addEventListener('change', (e) => {
                alert('Metode pembayaran yang dipilih: "${e.target.value}');
            });
        });
    </script>
    <script>
        // Ambil elemen popup dan tombol tutup
        const customPopup = document.getElementById('custom-popup-warning');
        const customPopupClose = document.querySelector('.custom-popup-close');
        const customPopupBtn = document.querySelector('.custom-popup-btn');


        // Tambahkan event listener ke form
        document.querySelector('.rental-form').addEventListener('submit', function(event) {
            // Mencegah pengiriman form secara default
            event.preventDefault();

            // Ambil semua input yang wajib diisi
            const requiredInputs = document.querySelectorAll('.rental-form [required]');
            let isValid = true;

            // Periksa setiap input
            requiredInputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('is-invalid'); // Tambahkan gaya jika ada yang kosong
                } else {
                    input.classList.remove('is-invalid'); // Hapus gaya jika sudah diisi
                }
            });

            if (!isValid) {
                // Tampilkan popup jika form tidak valid
                customPopup.style.display = 'flex';
            } else {
                // Kirim form jika valid
                this.submit();
            }
        });

        // Tambahkan event listener ke tombol tutup dan tombol OK
        [customPopupClose, customPopupBtn].forEach(el => {
            el.addEventListener('click', function() {
                customPopup.style.display = 'none';
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen harga dari product-card
            const priceElement = document.querySelector('.product-card .price');
            const hiddenInputPrice = document.getElementById('total_pembayaran');
            const imageElement = document.querySelector('.product-card img');
            const hiddenInputImage = document.getElementById('gambar-paket'); // Hidden input untuk gambar_paket

            if (priceElement) {
                // Ambil harga (hilangkan karakter non-angka)
                const priceValue = priceElement.textContent.replace(/[^\d]/g, '');

                // Set nilai ke input hidden
                hiddenInputPrice.value = priceValue;
            }

            if (imageElement) {
                // Ambil atribut src dari gambar
                const imagePath = imageElement.getAttribute('src');

                // Set nilai ke input hidden untuk gambar_paket
                hiddenInputImage.value = imagePath;
            }

            // Pastikan nilai dikirimkan saat submit
            document.querySelector('.rental-form').addEventListener('submit', function() {
                if (priceElement) {
                    hiddenInputPrice.value = priceElement.textContent.replace(/[^\d]/g, '');
                }

                if (imageElement) {
                    hiddenInputImage.value = imageElement.getAttribute('src');
                }
            });
        });
    </script>

</body>

</html>