<!-- resources/views/facture/facture.blade.php -->
@extends('layout.admin')

@section('content')
<div class="container-fluid mt-5">
    <h3 class="mb-4">Liste des factures</h3>

    <div class="d-flex justify-content-between mb-3">


        <div class="input-group" style="width: 250px;">
            <input type="text" class="form-control" placeholder="Chercher">
            <button class="btn btn-outline-primary" type="button">
                <i class="bi bi-search"></i> Chercher
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-warning">
                <tr>
                    <th>Date</th>
                    <th>Montant Total</th>
                    <th>Méthode de Paiement</th>
                    <th>Réservation</th>

                </tr>
            </thead>
            <tbody>
           @foreach($factures  as $facture)
<tr class="{{ $loop->iteration % 2 == 0 ? 'table-light' : 'table-info' }}">
    <td class="align-middle">{{ $facture->date->format('d/m/Y') }}</td>
    <td class="align-middle">{{ number_format($facture->montant_total, 2) }} DH</td>
    <td class="align-middle">{{ $facture->methode_paiement }}</td>
    <td class="align-middle">{{ $facture->reservation_id }}</td>

</tr>
@endforeach



  </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-between align-items-center">
        <div>Affichage de 1 à 6 sur 3 entrées</div>
        <nav>
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#">Précédent</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Suivant</a>
                </li>
            </ul>
        </nav>
    </div>
</div>


<script>
    // Script pour récupérer les infos client pour l'édition
    document.addEventListener('DOMContentLoaded', function() {
        const modifierModal = document.getElementById('modifierFactureModal');
        if (modifierModal) {
            modifierModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');

                // Ici vous pouvez faire une requête AJAX pour obtenir les données du client
                // Pour l'exemple, nous utilisons des données statiques

                // Update form action URL
                const form = document.getElementById('editForm');
                form.action = form.action.replace(':id', id);
            });
        }

        const supprimerModal = document.getElementById('supprimerFactureModal');
        if (supprimerModal) {
            supprimerModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');

                // Update form action URL
                const form = document.getElementById('deleteForm');
                form.action = form.action.replace(':id', id);
            });
        }
    });
</script>
@endsection
