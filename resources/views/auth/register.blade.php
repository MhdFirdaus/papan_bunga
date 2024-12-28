<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/auth/styleloginregis.css') }}">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <!-- Card Register -->
        <div class="register-card text-center">
            <!-- Title -->
            <h3>Buat Akun</h3>
            <!-- Logo -->
            <img src="/images/mitra.png" alt="Logo" class="rounded-circle mb-3">

            <!-- Form -->
            <form action="{{ route('postRegister') }}" method="POST">
                @csrf
                <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Masukkan Nama" required>
                <input type="email" name="email" id="email" class="form-control mb-3" placeholder="Masukkan Email" required>
                
                <!-- Password Field -->
                <div class="position-relative mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
                    <i class="bi bi-eye-slash position-absolute end-0 top-50 translate-middle-y me-2 toggle-password" style="display: none; cursor: pointer;" id="togglePassword"></i>
                </div>
                
                <!-- Confirm Password Field -->
                <div class="position-relative mb-3">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
                    <i class="bi bi-eye-slash position-absolute end-0 top-50 translate-middle-y me-2 toggle-password" style="display: none; cursor: pointer;" id="toggleConfirmPassword"></i>
                </div>
                
                <button type="submit" id="submitButton" class="btn btn-secondary w-100" disabled>Konfirmasi</button>
            </form>

            <!-- Already Have Account -->
            <div class="mt-3">
                <small class="text-muted">
                    Sudah memiliki akun? <a href="{{ route('auth.login') }}" class="text-success fw-bold" style="text-decoration: none;">Masuk</a>
                </small>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const nameField = document.getElementById('name');
        const emailField = document.getElementById('email');
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('password_confirmation');
        const togglePassword = document.getElementById('togglePassword');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const submitButton = document.getElementById('submitButton');

        // Fungsi untuk mengecek apakah semua input sudah terisi
        function checkFormCompletion() {
            const isComplete = nameField.value && emailField.value && passwordField.value && confirmPasswordField.value;
            submitButton.disabled = !isComplete;
            submitButton.classList.toggle('btn-success', isComplete);
            submitButton.classList.toggle('btn-secondary', !isComplete);
        }

        // Event Listener untuk mengecek input di setiap perubahan
        [nameField, emailField, passwordField, confirmPasswordField].forEach(field => {
            field.addEventListener('input', checkFormCompletion);
        });

        // Show/Hide icon based on input value
        passwordField.addEventListener('input', () => {
            togglePassword.style.display = passwordField.value ? 'inline' : 'none';
        });

        confirmPasswordField.addEventListener('input', () => {
            toggleConfirmPassword.style.display = confirmPasswordField.value ? 'inline' : 'none';
        });

        // Toggle password visibility
        togglePassword.addEventListener('click', () => {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            togglePassword.classList.toggle('bi-eye');
            togglePassword.classList.toggle('bi-eye-slash');
        });

        toggleConfirmPassword.addEventListener('click', () => {
            const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordField.setAttribute('type', type);
            toggleConfirmPassword.classList.toggle('bi-eye');
            toggleConfirmPassword.classList.toggle('bi-eye-slash');
        });
    </script>
</body>
</html>
