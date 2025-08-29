<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>KamerCare - Landing page</title>
  <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- CSS AOS -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
  /* Animation du message (un peu plus lente) */
.floating {
  animation: float 4s ease-in-out infinite;
}

@keyframes float {
  0%   { transform: translateY(0px); }
  50%  { transform: translateY(-15px); }
  100% { transform: translateY(0px); }
}

/* Animation des titres de session (un peu plus lente) */
.floating-2 {
  animation: float2 4s ease-in-out infinite;
}

@keyframes float2 {
  0%   { transform: translateY(0px); }
  50%  { transform: translateY(-8px); }
  100% { transform: translateY(0px); }
}

</style>

</head>
<body style="background-color: rgba(173, 203, 230, 0.5); z-index: 1;">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);">
    <div class="container">
      <!-- Logo et nom de l'application -->
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" width="40" height="40" class="d-inline-block align-text-top me-2">
        <span class="fw-bold text-success">KamerCare</span>
      </a>
  
      <!-- Bouton pour afficher menu sur mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <!-- Liens du menu -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="#A propos">A propos</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="#FAQ">FAQ</a></li>
        </ul>
        <a href="/connection" class="btn btn-outline-primary  me-2" >Connexion</a>
        <a href="{{ route('redirectionUser') }}" class="btn btn-primary" style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);">Creer un compte</a>
      </div>
    </div>
  </nav>
  

  <!-- Hero section -->
  <header class="hero-section d-flex align-items-center justify-content-center text-white text-center" style="background-image: url('{{ asset('img/log4.jpg') }}');"data-aos="fade-down" >
    <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 123, 255, 0.2); z-index: 1;"></div>
  <div class="container position-relative" style="z-index: 2;">
      <h1 class="display-4 fw-bold floating">KamerCare – La sante a portee de clic.</h1>
      <p class="lead" data-aos="zoom-out" data-aos-delay="300">Prenez vos rendez-vous medicaux en ligne dans les hopitaux publics rapidement et facilement.</p>
      <a href="/connection" class="btn btn-lg btn-outline-primary mt-3" data-aos="fade-up" data-aos-delay="500" style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);">Prendre rendez-vous des maintenant</a>
    </div>
  </header>

  <!-- Section a propos -->
  <section id="A propos" class="py-5" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-4">
        <h2 class="fw-bold floating-2" data-aos="fade-down">Pourquoi KamerCare ?</h2>
        <p><u>Facilite la prise de rendez-vous medical en ligne dans les hopitaux publics</u></p>
        <p data-aos="zoom-in">
          KamerCare est une plateforme innovante conçue pour simplifier la prise de rendez-vous medical 
          dans les hopitaux publics. Grace a notre systeme, les patients peuvent trouver un medecin, reserver 
          un creneau, et recevoir une confirmation en ligne, sans files d’attente inutiles.
      </p>
      </div>

      <div class="row text-center">      
        <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="card h-100 shadow zoom-card">
            <img src="{{ asset('img/log5.jpg') }}" class="card-img-top" data-aos="zoom-in" alt="Reservation en ligne">
            <div class="card-body">
              <h5 class="card-title">Reservation en ligne</h5>
              <p class="card-text">Choisissez facilement un creneau adapte a votre emploi du temps.</p>
            </div>
          </div>
        </div>
      
        
        <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="400">
          <div class="card h-100 shadow zoom-card">
            <img src="{{ asset('img/log8.jpg') }}" class="card-img-top" data-aos="zoom-in" alt="Acces aux medecins">
            <div class="card-body">
              <h5 class="card-title">Acces aux medecins</h5>
              <p class="card-text">Consultez la liste des specialistes disponibles et leurs horaires.</p>
            </div>
          </div>
        </div>
      
        <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="700">
          <div class="card h-100 shadow zoom-card">
            <img src="{{ asset('img/log10.jpg') }}" class="card-img-top" data-aos="zoom-in" alt="Geolocalisation">
            <div class="card-body">
              <h5 class="card-title">Geolocalisation</h5>
              <p class="card-text">Geolocaliser et trouver les centres de sante les plus proches de vous.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
      
    </div>
  </section><br><br><br>

 <!-- Section Comment ça marche -->
<section class="section py-5 bg-light" data-aos="fade-up" style="background-color: rgba(173, 203, 230, 0.5); z-index: 1;">
  <div class="container" style="background-color: rgba(173, 203, 230, 0.5); z-index: 1;">
    <h2 class="text-center mb-4 fw-bold floating-2" data-aos="fade-down" data-aos-delay="200">Comment ça marche</h2>

    <!-- Carousel -->
    <div id="stepsCarousel" class="carousel slide" data-bs-ride="carousel">
      <!-- Indicateurs -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#stepsCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#stepsCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#stepsCarousel" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#stepsCarousel" data-bs-slide-to="3"></button>
      </div>

      <!-- Contenu -->
      <div class="carousel-inner text-center" >
        <div class="carousel-item active" >
          <div class="bubble mx-auto" style="background-color: rgba(173, 203, 230, 0.5); z-index: 1;">
            <img src="{{ asset('img/log12.jpg') }}" class="card-img-top" alt="Geolocalisation">
            <h4 data-aos="zoom-in">1. Creez un compte</h4>
            <p>Inscrivez-vous facilement en quelques clics pour acceder a la plateforme.</p>
          </div>
        </div>
        <div class="carousel-item">
          <div class="bubble mx-auto" style="background-color: rgba(173, 203, 230, 0.5); z-index: 1;">
            <img src="{{ asset('img/log12.jpg') }}" class="card-img-top" alt="Geolocalisation">
            <h4 data-aos="zoom-in">2. Choisissez un hopital</h4>
            <p>Parcourez la liste des medecins et selectionnez celui qui vous convient.</p>
          </div>
        </div>
        <div class="carousel-item">
          <div class="bubble mx-auto" style="background-color: rgba(173, 203, 230, 0.5); z-index: 1;">
            <img src="{{ asset('img/log14.jpg') }}" class="card-img-top" alt="Geolocalisation">
            <h4 data-aos="zoom-in">3. Reservez un creneau</h4>
            <p>Selectionnez la date et l'heure de votre rendez-vous en ligne.</p>
          </div>
        </div>
        <div class="carousel-item">
          <div class="bubble mx-auto" style="background-color: rgba(173, 203, 230, 0.5); z-index: 1;">
            <img src="{{ asset('img/log13.jpg') }}" class="card-img-top" alt="Geolocalisation">
            <h4 data-aos="zoom-in">4. Recevez la confirmation</h4>
            <p>Recevez un email ou SMS confirmant votre rendez-vous.</p>
          </div>
        </div>
      </div>

      <!-- Controles -->
      <button class="carousel-control-prev" type="button" data-bs-target="#stepsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon custom-arrow" aria-hidden="true"></span>
        <span class="visually-hidden">Precedent</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#stepsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon custom-arrow" aria-hidden="true"></span>
        <span class="visually-hidden">Suivant</span>
      </button>
    </div>
  </div>
</section>




<!--Frequently Asked Questions(FAQ)-->
<section class="my-5" id="FAQ" data-aos="fade-up" >
  <div class="container">
    <h2 class="mb-4 text-center floating-2" data-aos="zoom-in">FAQ</h2>
    <div class="row g-3">
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="card h-100 shadow zoom-card" >
          <div class="card-body">
            <h5 class="card-title" data-aos="zoom-in">Est-ce gratuit ?</h5>
            <p class="card-text" data-aos="zoom-out">Oui, la reservation en ligne est gratuite.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="500">
        <div class="card h-100 shadow zoom-card">
          <div class="card-body">
            <h5 class="card-title" data-aos="zoom-in">Comment annuler ?</h5>
            <p class="card-text" data-aos="zoom-out">Via votre espace utilisateur.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="800">
        <div class="card h-100 shadow zoom-card">
          <div class="card-body">
            <h5 class="card-title" data-aos="zoom-in">Mes donnees sont-elles securisees ?</h5>
            <p class="card-text" data-aos="zoom-out">Oui, nous utilisons un chiffrement avance.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>  

  <!-- Footer -->
  <footer style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);">
    <!--contactez-nous-->
    <section id="contact" class="text-white text-center py-3">
      <div class="container text-center">
        <h2>Contactez-nous</h2>
        <p>Email : kamercare@gmail.com | Telephone : +237 693 381 961</p>
      </div>
    </section>
    
  </footer>

  <!-- JS AOS(Animate on scroll) librairie java script qui permet d'ajouter des animations quand les elements apparaissent au defilement -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js">//importe la librairie AOS</script>
<script>
  AOS.init({ // cela initialise AOS (Active AOS sur la page)
    duration: 800, //duree de l’animation en millisecondes (ici 0.8 seconde)
    once: false     // si false : l’animation se rejoue a chaque fois qu’on fait defiler l’element a l’ecran
                    // si true : l’animation ne s’execute qu’une seule fois
  });
</script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
