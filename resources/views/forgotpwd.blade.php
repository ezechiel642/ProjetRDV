<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgotpassword</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body style="background-color: rgba(0, 123, 255, 0.2); z-index: 1;">
<main>
        <div class="container d-flex justify-content-center align-items-center min-vh-100" >
            <div class="card shadow p-4" style="max-width: 900px; width: 100%;  height: 400px; background: linear-gradient(90deg, #0f2027, #203a43, #2c5364)"  >
                <h1 class="mb-3 text-center text-light">Mot de passe oublie ?</h1>
                <p class="mb-4 text-center text-light">Entrez votre adresse email pour la reinitialisation de votre mot de passe.</p>
                <form action="" method="post" >
                        @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label text-light">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-3">Envoyer le lien de reinitialisation</button>
                    <div class="text-center"></div>
                        <a href="/connection" class="text-decoration-none text-white">
                            <span class="me-1">&#8592;</span>Retour a la connexion
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>