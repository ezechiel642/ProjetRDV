<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>KamerCare - Demande</title>
  <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <style>
          .btn-submit {
      background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);
      color: #fff;
      border: none;
      font-weight: bold;
      transition: transform 0.3s ease;
      border-radius :10px;
      width: 200px;
      height: 50px;
    }

    .btn-submit:hover {
      transform: scale(1.15);
      background: linear-gradient(90deg, #2c5364, #103a43, #0f2027);
    }
  </style>

  <!-- AOS Animations -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100" >

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
          <li class="nav-item"><a class="nav-link active" href="#">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="#apropos">Faire une demande</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Mes rendez-vous</a></li>
          <li class="nav-item"><a class="nav-link" href="#faq">mon compte</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header Section -->
  <section class="py-5 mt-5 text-center text-white" style="background: linear-gradient(90deg, #2c5364, #203a43, #0f2027);">
    <div class="container" data-aos="fade-up">
      <h1 class="fw-bold">Formulaire de prise de rendez-vous</h1>
      <p class="lead">Prenez rendez-vous facilement avec un medecin proche de chez vous.</p>
    </div>
  </section>

  <!-- Section du form  -->
  <section class="py-5 flex-grow-1">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8" data-aos="zoom-in">
          <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">
              <h4 class="text-center mb-4 text-primary fw-bold">Remplissez le formulaire ci-dessous</h4>
              
              <form method="POST" action="#">
                @csrf

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
                    <option value="dentiste">Opticien</option>
                  </select>
                </div>

                <!-- Ville -->
                <div class="mb-3">
                  <label for="ville" class="form-label fw-semibold">Ville</label>
                  <select id="ville" name="ville" class="form-select" required>
                    <option value=""> Selectionnez une ville </option>
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

                <!-- Date et Heure -->
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="date" class="form-label fw-semibold">Date souhaitee</label>
                    <input type="date" id="date" name="date" class="form-control" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="heure" class="form-label fw-semibold">Horaires</label>
                    <input type="time" id="heure" name="heure" class="form-control" required>
                  </div>
                </div>

                <!-- Medecin -->
                <div class="mb-3">
                  <label for="medecin" class="form-label fw-semibold">Medecin (optionnel)</label>
                  <select id="medecin" name="medecin" class="form-select">
                    <option value=""> Selectionnez un medecin </option>
                  </select>
                </div>

                <!-- Description -->
                <div class="mb-3">
                  <label for="description" class="form-label fw-semibold">Description (optionnelle)</label>
                  <textarea id="description" name="description" rows="3" class="form-control" placeholder="Expliquez brièvement votre problème de santé..."></textarea>
                </div>

                <!-- Bouton -->
                <div class="text-center mt-4">
                  <button type="submit" class="btn-submit">
                    Envoyer la demande
                  </button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);" 
          class="text-white text-center py-4 mt-auto">
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
      duration: 500,
      once: false
    });
  </script>
</body>
</html>
