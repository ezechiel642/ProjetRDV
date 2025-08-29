<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Connexion</title>
  <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    body {
      background: url('{{ asset('img/log15.jpg') }}') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .login-form {
      max-width: 500px;
      width: 100%;
      background: rgba(0, 0, 0, 0.7);
      backdrop-filter: blur(8px);
      padding: 2rem;
      border-radius: 12px;
      color: #fff;
      box-shadow: 0 5px 25px rgba(0,0,0,0.3);
    }
    .password-toggle {
      position: relative;
    }
    .password-toggle-icon {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: rgba(255,255,255,0.6);
    }
  </style>
</head>
<body>
  <div class="login-form">
    <div class="text-center mb-3">
      <i class="bi bi-person-circle" style="font-size: 80px;"></i>
    </div>
    <h3 class="text-center mb-4">Connexion</h3>

    <!-- Messages -->
    @if ($errors->any())
      <div class="alert alert-danger d-flex align-items-center" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        <div>{{ $errors->first() }}</div>
      </div>
    @endif

    @if (session('success'))
      <div class="alert alert-success d-flex align-items-center" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        <div>{{ session('success') }}</div>
      </div>
    @endif

    <form action="{{ route('connexion') }}" method="POST">
      @csrf

      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Adresse Email</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-envelope"></i></span>
          <input type="email" class="form-control" name="email" id="email" placeholder="votre@email.com" required>
        </div>
      </div>

      <!-- Mot de passe -->
      <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <div class="password-toggle">
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" class="form-control" name="password" id="password" placeholder="Votre mot de passe" required>
          </div>
          <i class="bi bi-eye-slash password-toggle-icon" id="togglePassword"></i>
        </div>
      </div>

      <!-- Remember + Mot de passe oublié -->
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="remember" name="remember">
          <label for="remember" class="form-check-label">Se souvenir de moi</label>
        </div>
        <a href="{{ route('forgotpwd') }}" class="text-decoration-none">Mot de passe oublie ?</a>
      </div>

      <!-- Bouton -->
      <button type="submit" class="btn btn-primary w-100">Connexion</button>

      <div class="text-center mt-3">
        <small>Pas encore de compte ? 
          <a href="{{ route('redirectionUser') }}" class="fw-bold text-decoration-none">Creer un compte</a>
        </small>
      </div>
    </form>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Toggle Password
    document.getElementById('togglePassword').addEventListener('click', function () {
      const passwordInput = document.getElementById('password');
      const type = passwordInput.type === 'password' ? 'text' : 'password';
      passwordInput.type = type;
      this.classList.toggle('bi-eye');
      this.classList.toggle('bi-eye-slash');
    });
  </script>
</body>
</html>
