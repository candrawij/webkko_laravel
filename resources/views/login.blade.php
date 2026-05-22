<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Login | KKO PAUD Semarang</title>
  <link rel="icon" href="{{ asset('assets/img/logo.jpg') }}"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
  <style>
    body {
      background-color: #fff9f9;
      font-family: 'Poppins', sans-serif;
    }
    .login-card {
      max-width: 550px;   
      width: 100%;       
      margin: auto;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      background: #fff;
    }

    .logo-box {
      width: 60px;
      height: 60px;
      border-radius: 12px;
      background: #e53935;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: auto;
    }
    .logo-box i {
      font-size: 30px;
      color: #fff;
    }
    a.back-link {
      display: inline-block;
      margin-top: 15px;
      text-decoration: none;
      color: #555;
      transition: 0.3s;
    }
    a.back-link:hover {
      color: #dc3545;
      text-decoration: underline;
    }
    .logo-img {
      width: 100px;  
      height: auto;  
      border-radius: 50%; 
    }
    .btn-danger {
      transition: all 0.3s ease;
    }
    .btn-danger:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(220,53,69,0.3);
    }
  </style>
</head>
<body>
  <div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="card login-card p-4 border-0">
      <div class="text-center">
        <div class="logo mb-3">
          <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo" class="logo-img shadow-sm border border-2 border-white">
        </div>
        <h5 class="fw-bold mb-1 text-dark">KKO PAUD Semarang</h5>
        <h6 class="fw-semibold text-danger">Admin Login</h6>
        <p class="text-muted mb-4">Masuk ke panel administrasi</p>
      </div>

      @if($errors->has('loginError'))
        <div class="alert alert-danger py-2 shadow-sm rounded-3">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $errors->first('loginError') }}
        </div>
      @endif

      <h6 class="fw-bold text-center mb-3">Selamat Datang</h6>
      
      <form method="post" action="{{ route('login.post') }}">
        @csrf
        <div class="mb-3">
          <label class="form-label fw-semibold">Email / Username</label>
          <div class="input-group shadow-sm rounded-3 overflow-hidden">
            <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-person"></i></span>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control border-start-0" placeholder="Masukkan email administrator" required />
          </div>
          @error('email')
              <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-4">
          <label class="form-label fw-semibold">Password</label>
          <div class="input-group shadow-sm rounded-3 overflow-hidden">
            <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-lock"></i></span>
            <input type="password" name="password" id="password" class="form-control border-start-0 border-end-0" placeholder="Masukkan password" required />
            <button class="input-group-text bg-white border-start-0 text-muted" type="button" onclick="togglePassword(this)">
              <i class="bi bi-eye"></i>
            </button>
          </div>
          @error('password')
              <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-grid mb-3">
          <button class="btn btn-danger rounded-3 py-2 fw-semibold" type="submit">
             <i class="bi bi-box-arrow-in-right me-2"></i> Masuk ke Panel
          </button>
        </div>
      </form>

      <div class="text-center">
        <a href="{{ route('index') }}" class="back-link small fw-medium">
           <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
        </a>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>