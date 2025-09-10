<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard Administrateur')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #e3f2fd, #f3e5f5);
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
    }
    .sidebar {
      background: linear-gradient(180deg, #4e73df, #224abe);
      color: white;
      border-radius: 18px;
      padding: 25px 20px;
      min-height: 95vh;
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
      margin: 15px;
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
    .menu a:hover, .menu a.active {
      background: rgba(255,255,255,0.2);
      transform: translateX(6px);
    }
    .menu a i { margin-right: 8px; }
    .card-custom {
      border-radius: 15px;
      background: white;
      padding: 25px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      margin-bottom: 20px;
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
    .tab-button.active, .tab-button:hover { background: #2c56b5; }
    input.form-control { border-radius: 10px; }
    .btn-update { background: #4e2cbf; color: white; font-weight: bold; border-radius: 10px; transition: 0.3s; }
    .btn-update:hover { background: #36189a; }
    .stat-card { border-radius: 15px; padding: 20px; color: white; margin-bottom: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: transform 0.3s; }
    .stat-card:hover { transform: translateY(-5px); }
    .stat-card i { font-size: 2.5rem; margin-bottom: 15px; }
    .stat-card .number { font-size: 2rem; font-weight: bold; }
    .stat-card .label { font-size: 0.9rem; opacity: 0.9; }
  </style>
</head>
<body>
<div class="container-fluid mt-3">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
      <div class="sidebar">
        <div class="profile-card">
          <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Profil">
          <h5>{{ Auth::user()->name ?? 'Admin' }}</h5>
          <p>Administrateur Système</p>
        </div>
        <div class="menu">
          <a href="#" class="active"><i class="bi bi-speedometer2"></i> Tableau de bord</a>
          <a href="#"><i class="bi bi-bar-chart-line"></i> Statistiques</a>
          <a href="#"><i class="bi bi-people"></i> Utilisateurs</a>
          <a href="#"><i class="bi bi-person-badge"></i> Médecins</a>
          <a href="#"><i class="bi bi-person-heart"></i> Patients</a>
          <a href="#"><i class="bi bi-calendar-event"></i> Rendez-vous</a>
          <a href="#"><i class="bi bi-gear"></i> Paramètres</a>
          <a href="{{ route('logout') }}" class="text-warning"><i class="bi bi-box-arrow-right"></i> Déconnexion</a>
        </div>
      </div>
    </div>

    <!-- Contenu principal -->
    <div class="col-md-9">
      @yield('content')
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@yield('scripts')
</body>
</html>
