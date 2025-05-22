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
        <table class="table table-bordered table-striped">
            <thead class="table-warning">
                <tr class="text-center align-middle">
                    <th>Utilisateur</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Date de naissance</th>
                    <th>E-mail</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients ?? [] as $client)
                <tr class="{{ $loop->even ? 'bg-light' : 'bg-white' }}">
                    <td class="text-center align-middle">
                        <i class="bi bi-person-circle text-secondary"></i>
                    </td>
                    <td class="text-center align-middle">Jhon</td>
                    <td class="text-center align-middle">Doe</td>
                    <td class="text-center align-middle">1996-10-01</td>
                    <td class="text-center align-middle">jhon@gmail.com</td>
                    <td class="text-center align-middle">+232 666-666666</td>
                    <td class="text-center align-middle">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modifierClientModal">
                                <i class="bi bi-pencil-square text-white"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#supprimerClientModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach

                @for($i = 0; $i < 6; $i++)
                <tr class="{{ $i % 2 == 0 ? 'bg-light' : 'bg-white' }}">
                    <td class="text-center align-middle">
                        <i class="bi bi-person-circle text-secondary"></i>
                    </td>
                    <td class="text-center align-middle">Jhon</td>
                    <td class="text-center align-middle">Doe</td>
                    <td class="text-center align-middle">1996-10-01</td>
                    <td class="text-center align-middle">jhon@gmail.com</td>
                    <td class="text-center align-middle">+232 666-666666</td>
                    <td class="text-center align-middle">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#modifierClientModal" data-id="{{ $i }}">
                                <i class="bi bi-pencil-square text-white"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#supprimerClientModal" data-id="{{ $i }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
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

<!-- Modal Modifier Client -->
<div class="modal fade" id="modifierClientModal" tabindex="-1" aria-labelledby="modifierClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modifierClientModalLabel">Modifier un client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('clients.update', ':id') }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit_prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="edit_prenom" name="prenom" value="Jhon" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="edit_nom" name="nom" value="Doe" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" value="jhon@gmail.com" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_telephone" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" id="edit_telephone" name="telephone" value="+232 666-666666">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_date_naissance" class="form-label">Date de naissance</label>
                        <input type="date" class="form-control" id="edit_date_naissance" name="date_naissance" value="1996-10-01">
                    </div>
                    <div class="mb-3">
                        <label for="edit_adresse" class="form-label">Adresse</label>
                        <textarea class="form-control" id="edit_adresse" name="adresse" rows="3">123 Rue Example, Ville</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-info text-white">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Supprimer Client -->
<div class="modal fade" id="supprimerClientModal" tabindex="-1" aria-labelledby="supprimerClientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="supprimerClientModalLabel">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer ce client? Cette action est irréversible.</p>
                <p>Client: <strong>Jhon Doe</strong></p>
                <p>Email: <strong>jhon@gmail.com</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="" method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modifierModal = document.getElementById('modifierClientModal');
        if (modifierModal) {
            modifierModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const form = document.getElementById('editForm');
                form.action = form.action.replace(':id', id);
            });
        }

        const supprimerModal = document.getElementById('supprimerClientModal');
        if (supprimerModal) {
            supprimerModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const form = document.getElementById('deleteForm');
                form.action = form.action.replace(':id', id);
            });
        }
    });
</script>
@endsection