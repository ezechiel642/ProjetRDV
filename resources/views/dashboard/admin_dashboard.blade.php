@extends('layouts.dashboard_admin')

@section('title', 'Tableau de bord Administrateur')

@section('content')
<h2 class="mb-4">Tableau de Bord Administrateur</h2>

<!-- Cartes de statistiques -->
<div class="row">
  <div class="col-md-3">
    <div class="stat-card" style="background: linear-gradient(120deg, #4e73df, #224abe);">
      <i class="bi bi-person-badge"></i>
      <div class="number">{{ $nombreMedecins }}</div>
      <div class="label">Médecins</div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="stat-card" style="background: linear-gradient(120deg, #1cc88a, #13855c);">
      <i class="bi bi-people"></i>
      <div class="number">{{ $nombrePatients }}</div>
      <div class="label">Patients</div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="stat-card" style="background: linear-gradient(120deg, #36b9cc, #258391);">
      <i class="bi bi-calendar-event"></i>
      <div class="number">{{ $nombreRdv }}</div>
      <div class="label">Rendez-vous</div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="stat-card" style="background: linear-gradient(120deg, #f6c23e, #c28f1d);">
      <i class="bi bi-clock-history"></i>
      <div class="number">{{ $rdvEnAttente }}</div>
      <div class="label">En attente</div>
    </div>
  </div>
</div>

<!-- Graphiques -->
<div class="row">
  <div class="col-md-8">
    <div class="card-custom">
      <h5 class="mb-3">Rendez-vous par mois</h5>
      <canvas id="appointmentsChart" height="250"></canvas>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card-custom">
      <h5 class="mb-3">Répartition des spécialités</h5>
      <canvas id="specialtiesChart" height="250"></canvas>
    </div>
  </div>
</div>

<!-- Rendez-vous récents -->
<div class="card-custom">
  <h5 class="mb-3">Rendez-vous récents</h5>
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Patient</th>
          <th>Médecin</th>
          <th>Date</th>
          <th>Heure</th>
          <th>Statut</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($rdvsRecents as $rdv)
        <tr>
          <td>{{ $rdv->patient->name }}</td>
          <td>{{ $rdv->medecin->name }}</td>
          <td>{{ $rdv->date->format('d/m/Y') }}</td>
          <td>{{ $rdv->date->format('H:i') }}</td>
          <td>
            @if($rdv->status == 'confirmé')
              <span class="badge bg-success badge-status">Confirmé</span>
            @elseif($rdv->status == 'en attente')
              <span class="badge bg-warning badge-status">En attente</span>
            @else
              <span class="badge bg-danger badge-status">Annulé</span>
            @endif
          </td>
          <td>
            <button class="btn btn-sm btn-primary">Voir</button>
            @if($rdv->status == 'en attente')
              <button class="btn btn-sm btn-success">Confirmer</button>
            @elseif($rdv->status == 'confirmé')
              <button class="btn btn-sm btn-danger">Annuler</button>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Demandes de médecins en attente -->
<div class="card-custom">
  <h5 class="mb-3">Demandes de création de compte Médecins</h5>
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Spécialité</th>
          <th>Date demande</th>
          <th>Documents</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($demandesMedecins as $demande)
        <tr>
          <td>{{ $demande->name }}</td>
          <td>{{ $demande->specialite }}</td>
          <td>{{ $demande->created_at->format('d/m/Y') }}</td>
          <td><button class="btn btn-sm btn-info">Voir</button></td>
          <td>
            <button class="btn btn-sm btn-success">Valider</button>
            <button class="btn btn-sm btn-danger">Refuser</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Graphique des rendez-vous
    const appointmentsCtx = document.getElementById('appointmentsChart').getContext('2d');
    new Chart(appointmentsCtx, {
      type: 'line',
      data: {
        labels: @json($mois),
        datasets: [{
          label: 'Rendez-vous',
          data: @json($rdvsParMois),
          borderColor: '#4e73df',
          backgroundColor: 'rgba(78, 115, 223, 0.1)',
          borderWidth: 2,
          fill: true,
          tension: 0.4
        }]
      },
      options: { responsive: true }
    });

    // Graphique des spécialités
    const specialtiesCtx = document.getElementById('specialtiesChart').getContext('2d');
    new Chart(specialtiesCtx, {
      type: 'doughnut',
      data: {
        labels: @json($specialites),
        datasets: [{
          data: @json($nombreParSpecialite),
          backgroundColor: ['#4e73df','#1cc88a','#36b9cc','#f6c23e','#e74a3b','#858796']
        }]
      },
      options: { responsive: true }
    });
  });
</script>
@endsection
