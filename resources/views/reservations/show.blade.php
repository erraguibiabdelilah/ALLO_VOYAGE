@extends('layout.admin')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Détails de la Réservation</h2>

    <div class="card">
        <div class="card-header">
            Réservation n°{{ $reservation->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Voyage : {{ $reservation->voyage->lieu_depart }} → {{ $reservation->voyage->destination }}</h5>

            <p><strong>Date de départ :</strong> {{ \Carbon\Carbon::parse($reservation->voyage->date_depart)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($reservation->voyage->heure_depart)->format('H:i') }}</p>
            <p><strong>Date d’arrivée :</strong> {{ \Carbon\Carbon::parse($reservation->voyage->date_retour)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($reservation->voyage->heure_arrivee)->format('H:i') }}</p>

           @php
    $depart = \Carbon\Carbon::parse($reservation->voyage->date_depart);
    $arrivee = \Carbon\Carbon::parse($reservation->voyage->date_retour);

    $diffMinutes = $depart->diffInMinutes($arrivee);
    $heures = floor($diffMinutes / 60);
    $minutes = $diffMinutes % 60;
    $duree = "{$heures}h{$minutes}";
    $prixTotal = $reservation->nbrplace * $reservation->voyage->prix;
@endphp

            <p><strong>Durée estimée :</strong> {{ $duree }}</p>
            <p><strong>Nombre de places réservées :</strong> {{ $reservation->nbrplace }}</p>
            <p><strong>Prix total :</strong> {{ number_format($prixTotal, 2) }} DH</p>
            <p><strong>Date de réservation :</strong> {{ $reservation->date }}</p>

            <hr>

            <h5 class="mt-4">Informations du voyageur</h5>
            <p><strong>Nom :</strong> {{ $reservation->nom }}</p>
            <p><strong>Prénom :</strong> {{ $reservation->prenom }}</p>
            <p><strong>Téléphone :</strong> {{ $reservation->telephone }}</p>

            <p><strong>Statut :</strong>
                <span class="badge bg-{{ $reservation->statut == 'confirmée' ? 'success' : 'danger' }}">
                    {{ ucfirst($reservation->statut) }}
                </span>
            </p>

            <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Retour</a>

            @if($reservation->statut == 'confirmée')
            <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous vraiment annuler cette réservation ?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Annuler la réservation</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
