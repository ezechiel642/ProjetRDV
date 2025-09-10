<?php 

namespace App\Http\Controllers;

use App\Models\Medecin;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotpwdMail;
use Illuminate\Support\Facades\Auth;

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

        // Creation de l'utilisateur
        User::create([
            "name"          => $validated["name"],
            "email"         => $validated["email"],
            "telephone"     => $validated["telephone"],
            "date_naissance"=> $validated["date_naissance"],
            "sexe"          => $validated["sexe"],
            "password"      => Hash::make($validated["password"]),
        ]);

        // Redirection avec message de succes
        return redirect()->route('dashboard.patient')->with('success', 'Inscription reussie ! Vous pouvez maintenant vous connecter.');

        
    }

    public function regisDoc(Request $request)
    {

        $med = Medecin::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'hopital' => $request->hopital,
            'specialite' => $request->specialite,
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'sexe' => $request->sexe,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($med, true);
        // dd(Auth::user());

        return redirect()->route('dashboard.medecin')->with('success', 'Inscription reussie ! Vous pouvez maintenant vous connecter.')->with(compact($med));
    }


    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/land'); // ou vers la page d'accueil
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

        // Recuperation de l'utilisateur connecte
        $user = auth()->user();

        // Redirection selon le rôle
        switch ($user->role) {
            case 'admin':
                return redirect()->route('dashboard.admin_dashboard')->with('success', 'Bienvenue Administrateur !');
            case 'medecin':
                return redirect()->route('dashboard.medecin')->with('success', 'Bienvenue Docteur !');
            case 'patient':
            default:
                return redirect()->route('dashboard.patient')->with('success', 'Bienvenue cher patient !');
        }
    }

    // Si echec d'authentification
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
            return redirect('/')->with('message', 'Un lien de reinitialisation a ete envoye');
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
        "role" => "admin", // role admin
    ]);

    return redirect()->route('admin.auth')->with('success', 'Compte admin cree ! Vous pouvez vous connecter.');
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
            return redirect()->route('dashboard_admin')->with('success', 'Connexion reussie !');
        } else {
            Auth::logout();
            return back()->withErrors(['email' => "Acces reserve aux administrateurs"]);
        }
    }

    return back()->withErrors(['email' => 'Identifiants incorrects.']);
}

}
