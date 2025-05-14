@extends('layout.admin')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Liste des Réservations</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($reservations->isEmpty())
        <div class="alert alert-info">Aucune réservation pour le moment.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-secondary">
                    <tr>
                        <th>ID</th>
                        <th>Voyage</th>
                        <th>Date de Départ</th>
                        <th>Nom Voyageur</th>
                        <th>Téléphone</th>
                        <th>Places</th>
                        <th>Réservé le</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->voyage->lieu_depart ?? '' }} - {{ $reservation->voyage->destination ?? '' }}</td>
                        <td>{{ $reservation->voyage->date_depart ?? '' }}</td>
                        <td>{{ $reservation->prenom }} {{ $reservation->nom }}</td>
                        <td>{{ $reservation->telephone }}</td>
                        <td>{{ $reservation->nbrplace }}</td>
                        <td>{{ $reservation->date }}</td>
                        <td>
                            <span class="badge bg-{{ $reservation->statut === 'confirmée' ? 'success' : 'danger' }}">
                                {{ ucfirst($reservation->statut) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('reservations.show', $reservation) }}" class="btn btn-sm btn-primary">Voir</a>
                            @if($reservation->statut === 'confirmée')
                            <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" class="d-inline" onsubmit="return confirm('Annuler cette réservation ?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Annuler</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $reservations->links() }}
        </div>
    @endif
</div>
@endsection
