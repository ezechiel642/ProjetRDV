<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MedecinAuthController extends Controller
{
    // Affiche le formulaire d’inscription
    public function showRegisterForm()
    {
        return view('regisDoc');
    }

    // Enregistre un médecin
    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required|unique:medecins',
            'email' => 'required|email|unique:medecins',
            'hopital' => 'required',
            'specialite' => 'required',
            'ville' => 'required',
            'quartier' => 'required',
            'sexe' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $medecin = Medecin::create([
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

        Auth::guard('medecin')->login($medecin);

        return redirect()->route('medecin.dashboard');
    }

    // Formulaire de connexion
    public function showLoginForm()
    {
        return view('connection');
    }

    // Connexion
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('medecin')->attempt($credentials)) {
            return redirect()->route('medecin.dashboard');
        }

        return back()->withErrors(['email' => 'Identifiants invalides']);
    }

    // Déconnexion
    public function logout()
    {
        Auth::guard('medecin')->logout();
        return redirect()->route('medecin.login');
    }

    // Dashboard
    public function dashboard()
    {
        return view('dashbord_medecin');
    }
}
