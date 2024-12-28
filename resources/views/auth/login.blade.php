<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/auth/styleloginregis.css') }}">
</head>
<body>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session('failed'))
                <div class="alert alert-danger">
                    {{ session('failed') }}
                </div>
            @endif
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4" style="width: 400px;">
            <!-- Header -->
            <div class="text-center">
                <img src="/images/mitra.png" alt="Logo" width="50" class="mb-3">
                <h3 class="fw-boldd">Welcome</h3>
                <p class="text-muted">Silahkan masuk dengan akun yang sudah terdaftar.</p>
            </div>

            <!-- Form -->
            <form action="{{ route('postLogin') }}" method="POST">
                @csrf
                <!-- Email Input -->
                <div class="form-group mb-4">
                    <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Nomor HP atau Email" required>
                </div>
                <!-- Password Input -->
                <div class="form-group mb-4">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                </div>
                <!-- Submit Button -->
                <button type="submit" id="submitBtn" class="btn btn-success btn-lg w-100 fw-bold">Masuk</button>
            </form>

            <!-- Footer -->
            <div class="text-start mt-3 ms-2">
                <small class="text-muted">
                    Tidak memiliki akun? 
                    <a href="{{ route('auth.register') }}" class="text-success fw-bold" style="text-decoration: none;">Daftar Sekarang</a>
                </small>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');

        if (togglePassword) {
            togglePassword.addEventListener('click', () => {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                togglePassword.classList.toggle('bi-eye');
                togglePassword.classList.toggle('bi-eye-slash');
            });
        }
    </script>

    <!-- Input Validation Script -->
    <script>
        const emailInput = document.getElementById("email");
        const passwordInput = document.getElementById("password");
        const submitBtn = document.getElementById("submitBtn");

        // Fungsi untuk mengecek input
        function checkInput() {
            if (emailInput.value.trim() !== "" && passwordInput.value.trim() !== "") {
                submitBtn.classList.add("active"); // Tambahkan class "active"
                submitBtn.disabled = false; // Aktifkan tombol
            } else {
                submitBtn.classList.remove("active"); // Hapus class "active"
                submitBtn.disabled = true; // Nonaktifkan tombol
            }
        }

        // Event listener untuk input email dan password
        emailInput.addEventListener("input", checkInput);
        passwordInput.addEventListener("input", checkInput);
    </script>
</body>
</html>
