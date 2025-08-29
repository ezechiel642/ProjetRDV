<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Espace Administrateur</title>
  <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <style>
    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #667eea, #764ba2);
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card {
      border-radius: 1rem;
      box-shadow: 0 0 25px rgba(0,0,0,0.15);
    }
    .card-header {
      background: linear-gradient(to right, #4e73df, #6f42c1);
    }
    .nav-pills .nav-link.active {
      background-color: #fff;
      color: #4e73df !important;
      font-weight: 600;
    }
    .password-toggle {
      cursor: pointer;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card">
        <!-- Header -->
        <div class="card-header text-center text-white py-4">
          <h3 class="mb-1"><i class="fa-solid fa-user-shield me-2"></i> Espace Administrateur</h3>
          <p class="mb-0">Accédez à votre tableau de bord</p>
        </div>

        <div class="card-body bg-light">
          <!-- Onglets -->
          <ul class="nav nav-pills justify-content-center mb-4" id="adminTabs" role="tablist">
            <li class="nav-item">
              <button class="nav-link active" id="login-tab" data-bs-toggle="pill" data-bs-target="#login" type="button" role="tab">
                <i class="fa-solid fa-right-to-bracket me-2"></i> Connexion
              </button>
            </li>
            <li class="nav-item">
              <button class="nav-link" id="register-tab" data-bs-toggle="pill" data-bs-target="#register" type="button" role="tab">
                <i class="fa-solid fa-user-plus me-2"></i> Inscription
              </button>
            </li>
          </ul>

          <div class="tab-content">
            <!-- Connexion -->
            <div class="tab-pane fade show active" id="login" role="tabpanel">
              <form method="POST" action="{{ route('adminAuth') }}">
                @csrf
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" class="form-control" name="email" placeholder="Votre adresse email" required>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Mot de passe</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Votre mot de passe" required>
                    <span class="input-group-text password-toggle" id="loginPasswordToggle"><i class="fa-solid fa-eye"></i></span>
                  </div>
                </div>
                <div class="d-flex justify-content-between mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
                  </div>
                  <a href="#" class="text-decoration-none">Mot de passe oublié ?</a>
                </div>
                <button class="btn btn-primary w-100 mb-3">
                  <i class="fa-solid fa-right-to-bracket me-2"></i> Se connecter
                </button>
              </form>
            </div>

            <!-- Inscription -->
            <div class="tab-pane fade" id="register" role="tabpanel">
              <form method="POST" action="{{ route('adminAuth') }}">
                @csrf
                <div class="mb-3">
                  <label class="form-label">Nom complet</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="form-control" name="name" placeholder="Votre nom complet" required>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" class="form-control" name="email" placeholder="Votre adresse email" required>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Mot de passe</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Créez un mot de passe" required>
                    <span class="input-group-text password-toggle" id="registerPasswordToggle"><i class="fa-solid fa-eye"></i></span>
                  </div>
                  <div class="form-text">Le mot de passe doit contenir au moins 8 caractères</div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Confirmer le mot de passe</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" id="registerPasswordConfirm" name="password_confirmation" placeholder="Confirmez le mot de passe" required>
                    <span class="input-group-text password-toggle" id="registerPasswordConfirmToggle"><i class="fa-solid fa-eye"></i></span>
                  </div>
                </div>
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" id="terms" required>
                  <label class="form-check-label" for="terms">J'accepte les <a href="#">termes et conditions</a></label>
                </div>
                <button class="btn btn-primary w-100">
                  <i class="fa-solid fa-user-plus me-2"></i> Créer le compte
                </button>
              </form>
            </div>
          </div>
        </div>

        <!-- Footer -->
        <div class="card-footer text-center py-3 text-muted">
          <i class="fa-solid fa-lock me-2"></i> Accès réservé uniquement aux administrateurs
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Toggle mot de passe
  document.querySelectorAll('.password-toggle').forEach(btn => {
    btn.addEventListener('click', function() {
      const input = this.previousElementSibling;
      if (input.type === "password") {
        input.type = "text";
        this.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
      } else {
        input.type = "password";
        this.innerHTML = '<i class="fa-solid fa-eye"></i>';
      }
    });
  });
</script>
</body>
</html>
