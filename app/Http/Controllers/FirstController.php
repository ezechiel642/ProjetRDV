<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotpwdMail;

class FirstController extends Controller
{
    public function inscription(Request $request)
    {
        //  Validation des champs
        $validated = $request->validate([
            "name"          => "required|string|max:255",
            "email"         => "required|string|email|max:255|unique:users,email",
            "telephone"     => "required|string|max:20",
            "date_naissance"=> "required|date",
            "sexe"          => "required|string|in:Homme,Femme",
            "password"      => "required|string|min:6|confirmed",
        ]);

        // Création de l'utilisateur
        User::create([
            "name"          => $validated["name"],
            "email"         => $validated["email"],
            "telephone"     => $validated["telephone"],
            "date_naissance"=> $validated["date_naissance"],
            "sexe"          => $validated["sexe"],
            "password"      => Hash::make($validated["password"]),
        ]);

        // Redirection avec message de succès
        return redirect()->route('land')->with('success', 'Inscription réussie ! Vous pouvez maintenant vous connecter.');
    }

    public function connexion(Request $request)
{
    // Validation des champs
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Tentative d'authentification
    if (\Illuminate\Support\Facades\Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();

        // Récupération de l'utilisateur connecté
        $user = auth()->user();

        // Redirection selon le rôle
        switch ($user->role) {
            case 'admin':
                return redirect()->route('dashboard')->with('success', 'Bienvenue Administrateur !');
            case 'medecin':
                return redirect()->route('dashboard_medecin')->with('success', 'Bienvenue Docteur !');
            case 'patient':
            default:
                return redirect()->route('dashboard_patient')->with('success', 'Bienvenue cher patient !');
        }
    }

    // Si échec d'authentification
    return back()->withErrors([
        'email' => 'Email ou mot de passe incorrect.',
    ])->onlyInput('email');
}


    public function forgotpwd(Request $request)
    {
        $email = $request->email;
        $User = User::where("email", $email)->first();

        if ($User) {
            Mail::to($User->email)->send(new ForgotpwdMail($User->email));
            return redirect('/')->with('message', 'Un lien de réinitialisation a été envoyé');
        }

        return back()->withErrors(['email' => "Cet email n'existe pas dans notre système."]);
    }

    public function adminInscription(Request $request)
{
    $validated = $request->validate([
        "name" => "required|string|max:255",
        "email" => "required|string|email|max:255|unique:users,email",
        "password" => "required|string|min:6|confirmed",
    ]);

    User::create([
        "name" => $validated["name"],
        "email" => $validated["email"],
        "password" => Hash::make($validated["password"]),
        "role" => "admin", // rôle admin
    ]);

    return redirect()->route('admin.auth')->with('success', 'Compte admin créé ! Vous pouvez vous connecter.');
}

public function adminConnexion(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if (\Illuminate\Support\Facades\Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();

        if (auth()->user()->role === 'admin') {
            return redirect()->route('dashboard_admin')->with('success', 'Connexion réussie !');
        } else {
            Auth::logout();
            return back()->withErrors(['email' => "Accès réservé aux administrateurs"]);
        }
    }

    return back()->withErrors(['email' => 'Identifiants incorrects.']);
}

}
