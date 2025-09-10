<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard_Patient</title>
  <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #e3f2fd, #f3e5f5);
      font-family: 'Segoe UI', sans-serif;
    }
    .sidebar {
      background: linear-gradient(180deg, #4e73df, #562cbf);
      color: white;
      border-radius: 18px;
      padding: 25px 20px;
      min-height: 100vh;
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }
    .profile-card {
      background: rgba(255,255,255,0.15);
      backdrop-filter: blur(10px);
      padding: 20px;
      border-radius: 15px;
      margin-bottom: 20px;
      text-align: center;
    }
    .profile-card img {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      border: 3px solid white;
      margin-bottom: 10px;
    }
    .menu a {
      display: block;
      padding: 12px;
      margin: 6px 0;
      border-radius: 10px;
      text-decoration: none;
      color: white;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    .menu a:hover {
      background: rgba(255,255,255,0.2);
      transform: translateX(6px);
    }
    .menu a i {
      margin-right: 8px;
    }
    .card-custom {
      border-radius: 15px;
      background: white;
      padding: 25px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .tab-button {
      background: #4e73df;
      color: white;
      border-radius: 8px;
      padding: 10px 20px;
      font-weight: 600;
      border: none;
      margin-right: 10px;
      transition: 0.3s;
    }
    .tab-button.active, .tab-button:hover {
      background: #2c56b5;
    }
    input.form-control {
      border-radius: 10px;
    }
    .btn-update {
      background: #4e2cbf;
      color: white;
      font-weight: bold;
      border-radius: 10px;
      transition: 0.3s;
    }
    .btn-update:hover {
      background: #36189a;
    }
  </style>
</head>
<body>

<div class="container-fluid mt-3">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3 sidebar">
      <div class="profile-card">
        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Profil">
        <h5>{{ Auth::user()->name }}</h5>
        <p>{{ Auth::user()->prenom ?? 'Patient' }}</p>
      </div>
      <div class="menu">
        <a href="#"><i class="bi bi-person-circle"></i>profil</a>
        <a href="{{ route('demandeDoc') }}"><i class="bi bi-file-text-fill"></i>Prendre un rendez-vous</a>
        <a href="#"><i class="bi bi-calendar-event"></i> Mes rendez-vous</a>
        <a href="#"><i class="bi bi-person-badge"></i> Mes medecins</a>
        <a href="#"><i class="bi bi-geo-alt"></i>Rechercher un centre de sante</a>
        <a href="#"><i class="bi bi-info-circle-fill"></i>Comment ca marche ?</a>
        <a href="{{ route('logout') }}" class="text-warning"><i class="bi bi-box-arrow-right"></i> Deconnexion</a>
      </div>
    </div>

<!-- Ajout d'un nouvel onglet "Prendre un rendez-vous" -->
<div class="col-md-9">
  <div class="card-custom">
    <!-- Onglets -->
    <div class="d-flex mb-3 flex-wrap">
      <button class="tab-button active" data-bs-toggle="tab" data-bs-target="#profil"><i class="bi bi-person-circle"></i> Profil</button>
      <button class="tab-button" data-bs-toggle="tab" data-bs-target="#reglages"><i class="bi bi-sliders"></i> Reglages</button>
      <!--ajouter d'autres onglets ici -->
    </div>

    <div class="tab-content">
      <!-- Profil -->
      <div class="tab-pane fade show active" id="profil">
        <form>
          <div class="mb-3">
            <label><i class="bi bi-person-fill"></i> Nom et Prenom</label>
            <input type="text" class="form-control" value="{{ Auth::user()->name }}">
          </div>
          <div class="mb-3">
            <label><i class="bi bi-envelope-fill"></i> Email</label>
            <input type="email" class="form-control" value="{{ Auth::user()->email }}">
          </div>
          <div class="mb-3">
            <label><i class="bi bi-lock-fill"></i> Mot de passe</label>
            <input type="password" class="form-control" value="{{ Auth::user()->password }}">
          </div>
          <div class="mb-3">
            <label><i class="bi bi-telephone-fill"></i> Telephone</label>
            <input type="text" class="form-control" value="{{ Auth::user()->telephone }}">
          </div>
        </form>
      </div>

      <!-- Réglages -->
      <div class="tab-pane fade" id="reglages">
        <form>
          <div class="mb-3">
            <label>Nouveau mot de passe</label>
            <input type="password" class="form-control" placeholder="********">
          </div>
          <div class="mb-3">
            <label>Confirmer le mot de passe</label>
            <input type="password" class="form-control" placeholder="********">
          </div>
          <button class="btn btn-update">Mettre à jour</button>
        </form>
      </div>

      <!-- Prendre un rendez-vous -->
      <div class="tab-pane fade" id="rendezvous">
        <form>
          <!-- Specialite -->
          <div class="mb-3">
            <label for="specialite" class="form-label fw-semibold">Specialite</label>
            <select id="specialite" name="specialite" class="form-select" required>
              <option value="">Selectionnez une specialite</option>
              <option value="generaliste">Medecin Generaliste</option>
              <option value="pediatre">Pediatre</option>
              <option value="gynecologue">Gynecologue</option>
              <option value="cardiologue">Cardiologue</option>
              <option value="dentiste">Dentiste</option>
              <option value="opticien">Opticien</option>
            </select>
          </div>

          <!-- Ville -->
          <div class="mb-3">
            <label for="ville" class="form-label fw-semibold">Ville</label>
            <select id="ville" name="ville" class="form-select" required>
              <option value="">Selectionnez une ville</option>
              <option value="douala">Douala</option>
              <option value="yaounde">Yaoundé</option>
              <option value="bafoussam">Bafoussam</option>
              <option value="garoua">Garoua</option>
            </select>
          </div>

          <!-- Quartier + Centre -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="quartier" class="form-label fw-semibold">Quartier (optionnel)</label>
              <input type="text" id="quartier" name="quartier" class="form-control" placeholder="Quartier">
            </div>
            <div class="col-md-6 mb-3">
              <label for="centreH" class="form-label fw-semibold">Centre hospitalier</label>
              <input type="text" id="centreH" name="centreH" class="form-control">
            </div>
          </div>

          <!-- Medecin -->
          <div class="mb-3">
            <label for="medecin" class="form-label fw-semibold">Medecin (optionnel)</label>
            <select id="medecin" name="medecin" class="form-select">
              <option value="">Selectionnez un medecin</option>
            </select>
          </div>

          <!-- Description -->
          <div class="mb-3">
            <label for="description" class="form-label fw-semibold">Description (optionnelle)</label>
            <textarea id="description" name="description" rows="3" class="form-control" placeholder="Expliquez brièvement votre problème de santé..."></textarea>
          </div>

          <!-- Bouton -->
          <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Suivant <i class="bi bi-arrow-right"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
