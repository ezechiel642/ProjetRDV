<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Creer un compte</title>
  <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    body {
      background: url('{{ asset('img/log15.jpg') }}');
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      padding: 20px;
    }
    
    .register-form {
      background-color: rgba(0, 0, 0, 0.7);
      padding: 40px 30px;
      border-radius: 15px;
      color: #fff;
      width: 100%;
      max-width: 600px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .register-form h3 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: 600;
      color: #fff;
    }
    
    .form-label {
      color: #fff;
      font-weight: 500;
      margin-bottom: 8px;
    }
    
    .form-control {
      background-color: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: #fff;
      padding: 12px 15px;
      border-radius: 8px;
    }
    
    .form-control:focus {
      background-color: rgba(255, 255, 255, 0.15);
      border-color: #0d6efd;
      box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
      color: #fff;
    }
    
    .form-control::placeholder {
      color: rgba(255, 255, 255, 0.6);
    }
    
    .form-select {
      background-color: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: #fff;
      padding: 12px 15px;
      border-radius: 8px;
    }
    
    .form-select:focus {
      background-color: rgba(255, 255, 255, 0.15);
      border-color: #0d6efd;
      box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
      color: #fff;
    }
    
    .btn-primary {
      background-color: #0d6efd;
      border-color: #0d6efd;
      padding: 12px;
      border-radius: 8px;
      font-weight: 600;
      transition: all 0.3s;
      width: 100%;
    }
    
    .btn-primary:hover {
      background-color: #0b5ed7;
      border-color: #0a58ca;
      transform: translateY(-2px);
    }
    
    .form-check-input {
      background-color: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .form-check-input:checked {
      background-color: #0d6efd;
      border-color: #0d6efd;
    }
    
    .form-check-label {
      color: #fff;
    }
    
    .form-check-label a {
      color: #0d6efd;
      text-decoration: none;
      transition: color 0.3s, text-decoration 0.3s;
    }
    
    .form-check-label a:hover {
      color: #0a58ca;
      text-decoration: underline;
    }
    
    .links-section {
      text-align: center;
      margin-top: 20px;
      color: #fff;
    }
    
    .links-section a {
      color: #0d6efd;
      text-decoration: none;
      transition: color 0.3s, text-decoration 0.3s;
    }
    
    .links-section a:hover {
      color: #0a58ca;
      text-decoration: underline;
    }
    
    .password-toggle-icon {
      cursor: pointer;
      color: rgba(255, 255, 255, 0.6);
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
    }
    
    .password-container {
      position: relative;
    }
    
    @media (max-width: 576px) {
      .register-form {
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>

  <div class="register-form">
  <div class="login-form">
    <div class="text-center mb-3">
      <i class="bi bi-person-circle" style="font-size: 80px;"></i>
    </div>
    <h3>Creer un compte</h3>
    
    <!-- Messages de validation -->
@if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
    <i class="bi bi-exclamation-triangle me-2"></i>
    <strong>Oups !</strong> Veuillez corriger les erreurs suivantes :
    <ul class="mt-2 mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
  </div>
@endif

<!-- Message de succès -->
@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
    <i class="bi bi-check-circle me-2"></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
  </div>
@endif

<!-- Message d'erreur général -->
@if (session('error'))
  <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
    <i class="bi bi-x-circle me-2"></i>
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
  </div>
@endif

    
    <form action="/inscription" method="POST">
      @csrf
    
<!-- Nom et Prénom -->
<div class="mb-3">
  <label for="name" class="form-label">Nom et Prenom</label>
  <input type="text" name="name" id="name"
         class="form-control @error('name') is-invalid @enderror"
         value="{{ old('name') }}" placeholder="Nom et prénom" required>
  @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<!-- Email -->
<div class="mb-3">
  <label for="email" class="form-label">Adresse Email</label>
  <input type="email" name="email" id="email"
         class="form-control @error('email') is-invalid @enderror"
         value="{{ old('email') }}" placeholder="exemple@email.com" required>
  @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<!-- Telephone -->
<div class="mb-3">
  <label for="telephone" class="form-label">Numero de telephone</label>
  <input type="tel" name="telephone" id="telephone"
         class="form-control @error('telephone') is-invalid @enderror"
         value="{{ old('telephone') }}" placeholder="Téléphone" required>
  @error('telephone') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<!-- Date de naissance -->
<div class="mb-3">
  <label for="date_naissance" class="form-label">Date de naissance</label>
  <input type="date" name="date_naissance" id="date_naissance"
         class="form-control @error('date_naissance') is-invalid @enderror"
         value="{{ old('date_naissance') }}" required>
  @error('date_naissance') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<!-- Sexe -->
<div class="mb-3">
  <label for="sexe" class="form-label">Sexe</label>
  <select name="sexe" id="sexe"
          class="form-select @error('sexe') is-invalid @enderror" required>
    <option value="" class="text-dark">-- Choisissez --</option>
    <option value="Homme" class="text-dark" {{ old('sexe')=='Homme' ? 'selected' : '' }}>Homme</option>
    <option value="Femme" class="text-dark" {{ old('sexe')=='Femme' ? 'selected' : '' }}>Femme</option>
    <option value="Autre" class="text-dark" {{ old('sexe')=='Autre' ? 'selected' : '' }}>Autre</option>
  </select>
  @error('sexe') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<!-- Mot de passe -->
<div class="mb-3 password-container">
  <label for="password" class="form-label">Mot de passe</label>
  <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mot de passe" required>
  <span><i class="bi bi-eye-slash password-toggle-icon" id="togglePassword"></i></span>
  @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<!-- Confirmation -->
<div class="mb-3">
  <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
  <input type="password" name="password_confirmation" id="password_confirmation"
         class="form-control" placeholder="Confirmez le mot de passe" required>
</div>

<!-- Conditions -->
<div class="mb-3 form-check">
  <input type="checkbox" class="form-check-input @error('conditions') is-invalid @enderror"
         id="conditions" name="conditions" {{ old('conditions') ? 'checked' : '' }} required>
  <label class="form-check-label" for="conditions">
    J'accepte les <a href="#">conditions generales</a>.
  </label>
  @error('conditions') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
</div>

    
      <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>

    <!-- Lien vers connexion -->
    <div class="links-section">
      <p class="mt-3">Dejà inscrit ? <a href="/connection">Se connecter</a></p>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Fonctionnalité pour afficher/masquer le mot de passe
    document.getElementById('togglePassword').addEventListener('click', function() {
      const passwordInput = document.getElementById('password');
      const icon = this;
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
      } else {
        passwordInput.type = 'password';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
      }
    });
  </script>
</body>
</html>