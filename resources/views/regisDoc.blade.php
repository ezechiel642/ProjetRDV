<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription Medecin</title>
  <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    body {
      background: linear-gradient(135deg, #fdfbfb, #ebedee);
      background-image: url('{{ asset('img/log15.jpg') }}');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .form-container {
      background-color: rgba(0,0,0,0.6);
      padding: 40px 30px;
      border-radius: 15px;
      color: #fff;
      width: 100%;
      max-width: 900px;
    }

    .form-title {
      font-size: 1.6rem;
      font-weight: bold;
      margin-bottom: 20px;
      color: #fff;
      text-align: center;
    }

    label {
      font-weight: bold;
    }

    .btn-submit {
      background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);
      color: #fff;
      border: none;
      font-weight: bold;
      transition: transform 0.3s ease;
    }

    .btn-submit:hover {
      transform: scale(1.1);
      background: linear-gradient(90deg, #2c5364, #203a43, #0f2027);
    }
  </style>
</head>
<body>

  <!-- Formulaire Médecin -->
  <div class="form-container">
    <div class="text-center mb-3">
      <img src="{{ asset('img/med.png') }}" alt="Médecin" width="100">
    </div>

    <h2 class="form-title">Inscription Medecin</h2>
    <h5 class="text-center mb-4">
      Vous etes medecin dans un centre de sante ?<br>
      <small>Veuillez remplir ce formulaire pour creer votre compte.</small>
    </h5>

    <form action="{{ route('regisDoc') }}" method="POST">
      @csrf
      <div class="row g-3">

        <!-- Nom -->
        <div class="col-md-6">
          <label for="nom" class="form-label">Nom</label>
          <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom" required>
        </div>

        <!-- Prénom -->
        <div class="col-md-6">
          <label for="prenom" class="form-label">Prenom</label>
          <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>
        </div>

        <!-- Téléphone -->
        <div class="col-md-6">
          <label for="telephone" class="form-label">Telephone</label>
          <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Votre numéro de téléphone" required>
        </div>

        <!-- Email -->
        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required>
        </div>

        <!-- Centre Hospitalier -->
        <div class="col-md-6">
          <label for="hopital" class="form-label">Centre Hospitalier</label>
          <input type="text" class="form-control" id="hopital" name="hopital" placeholder="Nom du centre" required>
        </div>

        <!-- Spécialité -->
        <div class="col-md-6">
          <label for="specialite" class="form-label">Specialite</label>
          <select class="form-select" id="specialite" name="specialite" required>
            <option selected disabled>Choisissez votre specialite...</option>
            <option>Medecin Generaliste</option>
            <option>Pediatre</option>
            <option>Cardiologue</option>
            <option>Gynecologue</option>
          </select>
        </div>

        <!-- Ville -->
        <div class="col-md-6">
          <label for="ville" class="form-label">Ville</label>
          <select class="form-select" id="ville" name="ville" required>
            <option selected disabled>Choisissez votre ville...</option>
            <option>Douala</option>
            <option>Yaounde</option>
            <option>Bafoussam</option>
            <option>Garoua</option>
          </select>
        </div>

        <!-- Quartier -->
        <div class="col-md-6">
          <label for="quartier" class="form-label">Quartier</label>
          <input type="text" class="form-control" id="quartier" name="quartier" placeholder="Votre quartier" required>
        </div>

        <!-- Sexe -->
        <div class="col-md-6">
          <label class="form-label d-block">Sexe</label>
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" id="sexeH" name="sexe" value="Homme" required>
            <label class="form-check-label" for="sexeH">Homme</label>
          </div>
          <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" id="sexeF" name="sexe" value="Femme" required>
            <label class="form-check-label" for="sexeF">Femme</label>
          </div>
        </div>

        <!-- Mot de passe -->
        <div class="col-md-6">
          <label for="password" class="form-label">Creer un mot de passe</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
        </div>
      </div>

      <!-- Conditions et connexion -->
      <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="conditions" required>
          <label class="form-check-label" for="conditions">
            J'accepte les <a href="#">conditions generales</a>.
          </label>
        </div>
        <p class="mb-0">
          Deja inscrit ? <a href="/connection">Se connecter</a>
        </p>
      </div>

      <!-- Bouton -->
      <div class="mt-4 text-center">
        <button type="submit" class="btn btn-submit px-4">S'inscrire</button>
      </div>
    </form>
  </div>

</body>
</html>
