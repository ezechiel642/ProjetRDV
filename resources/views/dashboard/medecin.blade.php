@extends('layouts.dashboard_medecin')

@section('title', 'Dashboard Médecin')

{{-- Onglet Profil --}}
@section('profil')
<h3 class="mb-3">Mon Profil</h3>
<form>
    <div class="mb-3">
        <label><i class="bi bi-person-fill"></i> Nom et Prenom</label>
        <input type="text" class="form-control" value="{{ $med->nom }}" readonly>
    </div>
    <div class="mb-3">
        <label><i class="bi bi-envelope-fill"></i> Email</label>
        <input type="email" class="form-control" value="{{ $med->prenom }}" readonly>
    </div>
    <div class="mb-3">
        <label><i class="bi bi-telephone-fill"></i> Telephone</label>
        <input type="text" class="form-control" value="{{ $med->telephone ?? '' }}" readonly>
    </div>
</form>
@endsection

{{-- Onglet Mes Rendez-vous --}}
@section('rdvListe')
<h3 class="mb-3">Mes Rendez-vous</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Date</th>
            <th>Patient</th>
            <th>Spécialité</th>
            <th>Centre</th>
            <th>Statut</th>
        </tr>
    </thead>
    <tbody>
        {{-- Exemple vide, à remplir avec la DB --}}
        <tr>
            <td colspan="5" class="text-center text-muted">Aucun rendez-vous pour l’instant</td>
        </tr>
    </tbody>
</table>
@endsection

{{-- Onglet Honoraires --}}
@section('honoraires')
<h3 class="mb-3">Honoraires</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Date</th>
            <th>Patient</th>
            <th>Montant</th>
            <th>Statut paiement</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="4" class="text-center text-muted">Aucune donnee pour l’instant</td>
        </tr>
    </tbody>
</table>
@endsection

{{-- Onglet Réglages --}}
@section('reglages')
<h3 class="mb-3">Modifier le mot de passe</h3>
<form method="POST" action="#">
    @csrf
    <div class="mb-3">
        <label>Nouveau mot de passe</label>
        <input type="password" name="password" class="form-control" placeholder="********" required>
    </div>
    <div class="mb-3">
        <label>Confirmer le mot de passe</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="********" required>
    </div>
    <button type="submit" class="btn btn-update">Mettre a jour</button>
</form>
@endsection
