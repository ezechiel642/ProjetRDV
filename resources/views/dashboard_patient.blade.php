<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Patient</title>
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
        <a href="#"><i class="bi bi-calendar-event"></i> Historique de mes rendez-vous</a>
        <a href="#"><i class="bi bi-person-badge"></i> Mes medecins</a>
        <a href="#"><i class="bi bi-file-earmark-text"></i> Mes ordonances</a>
        <a href="#"><i class="bi bi-geo-alt"></i>Geolocaliser un centre de sante</a>
        <a href="#"><i class="bi bi-info-circle-fill"></i>Comment ca marche ?</a>
        <a href="#" class="text-danger"><i class="bi bi-trash"></i> Supprimer mon compte</a>
        <a href="{{ route('logout') }}" class="text-warning"><i class="bi bi-box-arrow-right"></i> Deconnexion</a>
      </div>
    </div>

    <!-- Contenu principal -->
    <div class="col-md-9">
      <div class="card-custom">
        <!-- Onglets -->
        <div class="d-flex mb-3">
          <button class="tab-button active" data-bs-toggle="tab" data-bs-target="#profil"><i class="bi bi-person-circle"></i> Profil</button>
          <button class="tab-button" data-bs-toggle="tab" data-bs-target="#reglages"><i class="bi bi-sliders"></i>
            Reglages</button>
        </div>

        <div class="tab-content">
          <!-- Profil -->
          <div class="tab-pane fade show active" id="profil">
            <form>

              <div class=" mb-3">
                  <label><i class="bi bi-person-fill"></i> Nom et Prenom</label>
                  <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                </div>

              <div class="mb-3">
                <label> <i class="bi bi-envelope-fill"></i> Email</label>
                <input type="email" class="form-control" value="{{ Auth::user()->email }}" >
              </div>

              <div class=" mb-3">
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
              <button class="btn btn-update">Mettre a jour</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
