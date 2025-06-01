@extends('layout.admin')

@section('content')
<div class="container-fluid " style="margin-top: 3rem">
    <h2 class="mb-3">Liste des Réservations</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($reservations->isEmpty())
        <div class="alert alert-info">Aucune réservation pour le moment.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-warning">
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
    <tr class="{{ $loop->even ? 'table-light' : '' }}" style="{{ $loop->odd ? 'background-color: #d1ecf1;' : '' }}">
        <td>{{ $reservation->id }}</td>
        <td>{{ $reservation->voyage->lieu_depart ?? '' }} - {{ $reservation->voyage->destination ?? '' }}</td>
        <td>{{ isset($reservation->voyage->date_depart) ? date('d/m/Y', strtotime($reservation->voyage->date_depart)) : '' }}</td>
        <td>{{ $reservation->prenom }} {{ $reservation->nom }}</td>
        <td>{{ $reservation->telephone }}</td>
        <td>{{ $reservation->nbrplace }}</td>
        <td>{{ isset($reservation->date) ? date('d/m/Y H:i', strtotime($reservation->date)) : '' }}</td>
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

        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                Affichage de 1 à {{ $reservations->count() }} sur {{ $reservations->total() }} entrées
            </div>
            <div>
                <nav aria-label="Pagination">
                    <ul class="pagination mb-0">
                        <li class="page-item {{ $reservations->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $reservations->previousPageUrl() }}">Précédent</a>
                        </li>
                        @for ($i = 1; $i <= $reservations->lastPage(); $i++)
                            <li class="page-item {{ $reservations->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $reservations->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ $reservations->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $reservations->nextPageUrl() }}">Suivant</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    @endif
</div>
@endsection
