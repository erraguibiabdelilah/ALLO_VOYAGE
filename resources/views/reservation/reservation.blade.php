<!-- resources/views/clients/index.blade.php -->
@extends('layout.admin')

@section('content')
<div class="container-fluid mt-5">
    <h3 class="mb-4">Liste des clients</h3>

    <div class="d-flex justify-content-between mb-3">
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ajouterClientModal">
            Ajouter un client
        </button>

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
                    <th>Utilisateur</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Date de naissance</th>
                    <th>E-mail</th>
                    <th>Téléphone</th>

                </tr>
            </thead>
            <tbody>
                @foreach($clients ?? [] as $client)
                <tr class="{{ $loop->iteration % 2 == 0 ? 'table-light' : 'table-info' }}">
                    <td class="align-middle">
                        <i class="bi bi-person-circle text-secondary"></i>
                    </td>
                    <td class="align-middle">Jhon</td>
                    <td class="align-middle">Doe</td>
                    <td class="align-middle">1996-10-01</td>
                    <td class="align-middle">jhon@gmail.com</td>
                    <td class="align-middle">+232 666-666666</td>
                    <td class="align-middle">
                        <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modifierClientModal">
                            <i class="bi bi-pencil-square text-white"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#supprimerClientModal">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach

                <!-- Rows for demonstration purposes -->
                @for($i = 0; $i < 6; $i++)
                <tr class="{{ $i % 2 == 0 ? 'table-light' : 'table-info' }}">
                    <td class="align-middle">
                        <i class="bi bi-person-circle text-secondary"></i>
                    </td>
                    <td class="align-middle">Jhon</td>
                    <td class="align-middle">Doe</td>
                    <td class="align-middle">1996-10-01</td>
                    <td class="align-middle">jhon@gmail.com</td>
                    <td class="align-middle">+232 666-666666</td>
                    <td class="align-middle">
                        <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modifierClientModal" data-id="{{ $i }}">
                            <i class="bi bi-pencil-square text-white"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#supprimerClientModal" data-id="{{ $i }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                @endfor
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

<!-- Modal Ajouter Client -->
<div class="modal fade" id="ajouterClientModal" tabindex="-1" aria-labelledby="ajouterClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="ajouterClientModalLabel">Ajouter un client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" id="telephone" name="telephone">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="date_naissance" class="form-label">Date de naissance</label>
                        <input type="date" class="form-control" id="date_naissance" name="date_naissance">
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse</label>
                        <textarea class="form-control" id="adresse" name="adresse" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-warning">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    // Script pour récupérer les infos client pour l'édition
    document.addEventListener('DOMContentLoaded', function() {
        const modifierModal = document.getElementById('modifierClientModal');
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

        const supprimerModal = document.getElementById('supprimerClientModal');
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
