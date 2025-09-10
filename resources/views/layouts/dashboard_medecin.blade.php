<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard Medecin')</title>
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
      cursor: pointer;
    }
    .menu a:hover {
      background: rgba(255,255,255,0.2);
      transform: translateX(6px);
    }
    .card-custom {
      border-radius: 15px;
      background: white;
      padding: 25px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
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
        <p>{{ Auth::user()->prenom ?? 'Medecin' }}</p>
      </div>
      <div class="menu nav flex-column nav-pills" id="menu-medecin" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="tab-profil" data-bs-toggle="pill" href="#profil" role="tab" aria-controls="profil" aria-selected="true"><i class="bi bi-person-vcard"></i> Profil</a>
        <a class="nav-link" id="tab-rdv" data-bs-toggle="pill" href="#rdvListe" role="tab" aria-controls="rdvListe" aria-selected="false"><i class="bi bi-calendar-check"></i> Mes rendez-vous</a>
        <a class="nav-link" id="tab-honoraires" data-bs-toggle="pill" href="#honoraires" role="tab" aria-controls="honoraires" aria-selected="false"><i class="bi bi-cash-stack"></i> Honoraires</a>
        <a class="nav-link" id="tab-reglages" data-bs-toggle="pill" href="#reglages" role="tab" aria-controls="reglages" aria-selected="false"><i class="bi bi-sliders"></i> Reglages</a>
        <a class="nav-link text-danger" href="#"><i class="bi bi-trash"></i> Supprimer mon compte</a>
        <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Déconnexion</button>
        </form>

      </div>
    </div>

    <!-- Contenu -->
    <div class="col-md-9">
      <div class="tab-content card-custom p-4" id="menu-medecin-content">
        <div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="tab-profil">
          @yield('profil')
        </div>
        <div class="tab-pane fade" id="rdvListe" role="tabpanel" aria-labelledby="tab-rdv">
          @yield('rdvListe')
        </div>
        <div class="tab-pane fade" id="honoraires" role="tabpanel" aria-labelledby="tab-honoraires">
          @yield('honoraires')
        </div>
        <div class="tab-pane fade" id="reglages" role="tabpanel" aria-labelledby="tab-reglages">
          @yield('reglages')
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
