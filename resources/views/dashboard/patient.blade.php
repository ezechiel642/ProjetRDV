@extends('layouts.dashboard_patient')

@section('title', 'Dashboard Patient')

{{-- Profil --}}
@section('profil')
<h3 class="mb-3">Mon Profil</h3>
<form>
    <div class="mb-3">
        <label><i class="bi bi-person-fill"></i> Nom et Prenom</label>
        <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
    </div>
    <div class="mb-3">
        <label><i class="bi bi-envelope-fill"></i> Email</label>
        <input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
    </div>
    <div class="mb-3">
        <label><i class="bi bi-telephone-fill"></i> Telephone</label>
        <input type="text" class="form-control" value="{{ Auth::user()->telephone  }}" readonly>
    </div>
</form>
@endsection

{{-- Prendre un rendez-vous --}}
@section('rendezvous')
<h3 class="mb-3">Prendre un rendez-vous</h3>
<form method="POST" action="#">
    @csrf
    <div class="mb-3">
        <label>Specialite</label>
        <select class="form-select" name="specialite" required>
            <option value="">Selectionnez une specialite</option>
            <option value="generaliste">Medecin Generaliste</option>
            <option value="pediatre">Pediatre</option>
            <option value="gynecologue">Gynecologue</option>
            <option value="cardiologue">Cardiologue</option>
            <option value="dentiste">Dentiste</option>
            <option value="opticien">Opticien</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Ville</label>
        <select class="form-select" name="ville" required>
            <option value="">Sélectionnez une ville</option>
            <option value="douala">Douala</option>
            <option value="yaounde">Yaounde</option>
            <option value="bafoussam">Bafoussam</option>
            <option value="garoua">Garoua</option>
        </select>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Quartier (optionnel)</label>
            <input type="text" class="form-control" name="quartier" placeholder="Quartier">
        </div>
        <div class="col-md-6 mb-3">
            <label>Centre hospitalier</label>
            <input type="text" class="form-control" name="centreH">
        </div>
    </div>
    <div class="mb-3">
        <label>Médecin (optionnel)</label>
        <select class="form-select" name="medecin">
            <option value="">Sélectionnez un medecin</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Description (optionnelle)</label>
        <textarea class="form-control" name="description" rows="3" placeholder="Expliquez brièvement votre problème de santé..."></textarea>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Suivant <i class="bi bi-arrow-right"></i></button>
    </div>
</form>
@endsection

{{-- Mes rendez-vous --}}
@section('mesRdv')
<h3 class="mb-3">Mes Rendez-vous</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Date</th>
            <th>Médecin</th>
            <th>Centre</th>
            <th>Statut</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="4" class="text-center text-muted">Aucun rendez-vous pour l’instant</td>
        </tr>
    </tbody>
</table>
@endsection

{{-- Mes medecins --}}
@section('mesMedecins')
<h3 class="mb-3">Mes Medecins</h3>
<p>Aucun médecin ajouté pour l’instant.</p>
@endsection

{{-- Centres de sante --}}
@section('centres')
<h3 class="mb-3">Centres de sante</h3>
<p>Liste des centres disponibles.</p>
@endsection

{{-- Reglages --}}
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
