@extends('layout.user')
@section('content')

<div class="container py-4">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row border rounded p-3 bg-light">
        <!-- Sidebar - 25% -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="/profile" 
                   class="list-group-item list-group-item-action">
                    Compte
                </a>
                <a href="/myreservations" 
                   class="list-group-item list-group-item-action active"
                   style="background-color: #ff6a00; border-color: #ff6a00;">
                    Réservations
                </a>
            </div>
        </div>

        

        <!-- Main Content - 75% -->
        <div class="col-md-9">
            <h2 class="highlight-text mb-4 fw-bold" style="color:#ff6a00">Historique des réservations</h2>
            @if($reservations->isEmpty())
                <div class="alert alert-info">
                    Vous n'avez aucune réservation pour le moment.
                </div>
            @else
                @foreach($reservations as $reservation)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="card-title">Voyage de <strong> {{ $reservation->voyage->lieu_depart }} </strong> à <strong> {{ $reservation->voyage->destination }} </strong></h5>
                                <p class="card-text">
                                    <strong style="color:#0d6efd">Date:</strong> {{ $reservation->date }}<br>
                                    <strong style="color:#0d6efd">Statut:</strong> <span class="badge bg-{{ $reservation->statut === 'confirmée' ? 'success' : 'danger' }}">{{ $reservation->statut }}</span><br>
                                    <strong style="color:#0d6efd">Nombre de places:</strong> {{ $reservation->nbrplace }}<br>
                                    <strong style="color:#0d6efd">Méthode de paiement:</strong> {{ $reservation->payment_method }}
                                </p>
                            </div>
                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                @if($reservation->statut === 'confirmée')
                                    <form action="{{ route('supprimer', $reservation->id) }}" method="POST">                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            Annuler la réservation
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection