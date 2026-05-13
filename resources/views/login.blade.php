<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Login | KKO PAUD Semarang</title>
  <link rel="icon" href="assets/img/logo.jpg"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="card login-card p-4">
      <div class="text-center">
        <div class="logo mb-3">
          <img src="../assets/img/logo.jpg" alt="Logo" class="logo-img">
        </div>
        <h5 class="fw-bold mb-1">KKO PAUD Semarang</h5>
        <h6 class="fw-semibold">Admin Login</h6>
        <p class="text-muted mb-4">Masuk ke panel administrasi</p>
      </div>



      <h6 class="fw-bold text-center mb-3">Selamat Datang</h6>
      <form method="post" action="">
        <div class="mb-3">
          <label class="form-label fw-semibold">Username</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required />
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">Password</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required />
            <button class="input-group-text" type="button" onclick="togglePassword(this)">
              <i class="bi bi-eye"></i>
            </button>
          </div>
        </div>

        <div class="d-grid mb-3">
          <button class="btn btn-danger" type="submit">Masuk</button>
        </div>
      </form>

      <div class="text-center">
        <a href="../index.php" class="back-link text-danger">&larr; Kembali ke Beranda</a>
      </div>
    </div>
  </div>

<script>
function togglePassword(btn) {
  const passwordInput = document.getElementById('password');
  const icon = btn.querySelector("i");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    icon.classList.remove("bi-eye");
    icon.classList.add("bi-eye-slash");
  } else {
    passwordInput.type = "password";
    icon.classList.remove("bi-eye-slash");
    icon.classList.add("bi-eye");
  }
}
</script>
</body>
</html>