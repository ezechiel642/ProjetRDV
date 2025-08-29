<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>KamerCare - Redirection compte</title>
  <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- AOS Animations -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <style>
      body {
          background: linear-gradient(to right, #e3f2fd, #bbdefb);
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }
      .btn-custom {
          background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);
          color: white;
          font-weight: bold;
          border-radius: 25px;
          padding: 12px 30px;
          transition: 0.3s;
      }
      .btn-custom:hover {
          transform: scale(1.05);
          color: #fff;
      }
      .header {
          margin-top: 120px;
          margin-bottom: 40px;
          text-align: center;
      }
      .choice-card {
          background: #fff;
          border-radius: 15px;
          box-shadow: 0 6px 15px rgba(0,0,0,0.1);
          padding: 30px;
          transition: 0.3s;
      }
      .choice-card:hover {
          transform: translateY(-10px);
      }
      footer {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
}

/* Animation 1 */
.floating-card-1 {
  animation: float1 6s ease-in-out infinite;
}

@keyframes float1 {
  0%   { transform: translateY(0px); }
  50%  { transform: translateY(-15px); }
  100% { transform: translateY(0px); }
}

/* Animation 2 (un peu plus lente) */
.floating-card-2 {
  animation: float2 5s ease-in-out infinite;
}

@keyframes float2 {
  0%   { transform: translateY(0px); }
  50%  { transform: translateY(-12px); }
  100% { transform: translateY(0px); }
}



  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" width="40" height="40" class="me-2">
        <span class="fw-bold text-white">KamerCare</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="#A propos">A propos</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="#FAQ">FAQ</a></li>
        </ul>
        <a href="/connection" class="btn btn-outline text-light" style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);" >Connexion</a>
       </div>
    </div>
  </nav>
   
  <!-- Section Choix -->
  <div class="container text-center">
    <div class="header" data-aos="fade-down">
      <h2>Bienvenue sur <span class="text-primary">KamerCare</span></h2>
      <p>Veuillez choisir votre profil pour continuer :</p>
    </div>

    <div class="row justify-content-center"> 
  <!-- Carte Patient -->
  <div class="col-md-4 mb-4" data-aos="fade-right">
    <div class="choice-card floating-card-1">
      <h5 class="mb-3">Vous etes un <span class="text-primary">Patient</span> ?</h5>
      <a href="{{ route('inscription') }}" class="btn btn-custom">Creer un compte Patient</a>
    </div>
  </div>

  <!-- Carte Medecin -->
  <div class="col-md-4 mb-4" data-aos="fade-left">
    <div class="choice-card floating-card-2">
      <h5 class="mb-3">Vous etes un <span class="text-success">Medecin</span> ?</h5>
      <a href="{{ route('regisDoc') }}" class="btn btn-custom">Creer un compte Medecin</a>
    </div>
  </div>
</div>


  <!-- Footer -->
  <footer style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);" class="text-white text-center py-4">
    <div class="container">
      <h5 id="contact">Contactez-nous</h5>
      <p>Email : <a href="mailto:kamercare@gmail.com" class="text-white">kamercare@gmail.com</a> | Telephone : +237 693 381 961</p>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      once: false
    });
  </script>
</body>
</html>