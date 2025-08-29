<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 1rem;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .stat-card {
            color: white;
            border-radius: 0.8rem;
            padding: 20px;
        }
        .navbar {
            border-bottom: 2px solid #e3e3e3;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <i class="fa-solid fa-user-shield"></i> Admin Panel
            </a>
            <div class="d-flex">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm" type="submit">
                        <i class="fa-solid fa-right-from-bracket"></i> Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h1 class="fw-bold"><i class="fa-solid fa-chart-line"></i> Tableau de bord Administrateur</h1>
                <p class="text-muted">Bienvenue, {{ auth()->user()->name ?? 'Administrateur' }}</p>
            </div>
        </div>

        <!-- Section Statistiques -->
        <div class="row g-4 mb-5">
            <!-- Patients -->
            <div class="col-md-4">
                <div class="stat-card bg-primary shadow-sm text-center">
                    <i class="fa-solid fa-user-injured fa-2x mb-2"></i>
                    <h4>{{ $patientsCount ?? 0 }}</h4>
                    <p class="mb-0">Patients inscrits</p>
                </div>
            </div>

            <!-- Médecins -->
            <div class="col-md-4">
                <div class="stat-card bg-success shadow-sm text-center">
                    <i class="fa-solid fa-user-doctor fa-2x mb-2"></i>
                    <h4>{{ $medecinsCount ?? 0 }}</h4>
                    <p class="mb-0">Médecins validés</p>
                </div>
            </div>

            <!-- Rendez-vous -->
            <div class="col-md-4">
                <div class="stat-card bg-warning shadow-sm text-center">
                    <i class="fa-solid fa-calendar-check fa-2x mb-2"></i>
                    <h4>{{ $rdvCount ?? 0 }}</h4>
                    <p class="mb-0">Rendez-vous</p>
                </div>
            </div>
        </div>

        <!-- Section Gestion -->
        <div class="row g-4">
            <!-- Patients -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100 text-center p-3">
                    <i class="fa-solid fa-user-injured fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Patients</h5>
                    <p class="card-text">Voir et gérer tous les patients inscrits.</p>
                    <a href="{{ route('patients.index') }}" class="btn btn-primary btn-sm">Gérer les patients</a>
                </div>
            </div>

            <!-- Médecins -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100 text-center p-3">
                    <i class="fa-solid fa-user-doctor fa-3x mb-3 text-success"></i>
                    <h5 class="card-title">Médecins</h5>
                    <p class="card-text">Valider les inscriptions et gérer les comptes médecins.</p>
                    <a href="{{ route('medecins.index') }}" class="btn btn-success btn-sm">Gérer les médecins</a>
                </div>
            </div>

            <!-- Rendez-vous -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100 text-center p-3">
                    <i class="fa-solid fa-calendar-check fa-3x mb-3 text-warning"></i>
                    <h5 class="card-title">Rendez-vous</h5>
                    <p class="card-text">Consulter et gérer les rendez-vous médicaux.</p>
                    <a href="{{ route('rendezvous.index') }}" class="btn btn-warning btn-sm">Gérer les RDV</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
