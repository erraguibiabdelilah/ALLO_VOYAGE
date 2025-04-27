@extends('layout.admin')

@section('content')
<div class="container-fluid mt-5">
    <h3 class="mb-4">Liste des voyages</h3>

    <div class="d-flex justify-content-between mb-3">
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ajouterVoyageModal">
            Ajouter un voyage
        </button>

        <div class="input-group" style="width: 250px;">
            <input type="text" class="form-control" placeholder="Rechercher">
            <button class="btn btn-outline-primary" type="button">
                <i class="bi bi-search"></i> Rechercher
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-warning">
                <tr>
                    <th>ID</th>
                    <th>Lieu de départ</th>
                    <th>Destination</th>
                    <th>Date Départ</th>
                    <th>Date Retour</th>
                    <th>Heure  départ</th>
                    <th>Heure Retour</th>
                    <th>Prix (€)</th>
                    <th>Places</th>
                    <th>Nombre d'arrêts</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>



                     <!--  Recuperation des voyages d'apres la bese de donne cree  -->           
                @foreach($voyages as $voyage)
                <tr class="{{ $loop->iteration % 2 == 0 ? 'table-light' : 'table-info' }}">
                    <td class="align-middle">{{ $voyage->id }}</td>
                    <td class="align-middle">{{ $voyage->lieu_depart }}</td>
                    <td class="align-middle">{{ $voyage->destination }}</td>
                    <td class="align-middle">{{ $voyage->date_depart->format('d/m/Y') }}</td>
                    <td class="align-middle">{{ $voyage->date_retour->format('d/m/Y') }}</td>
                    <td class="align-middle">{{ $voyage->heure_depart }}</td>
                    <td class="align-middle">{{ $voyage->heure_arrivee }}</td>
                    <td class="align-middle">{{ number_format($voyage->prix, 2) }}</td>
                    <td class="align-middle">{{ $voyage->places_disponibles }}</td>
                    <td class="align-middle">{{ $voyage->nbr_arret }}</td>
                    <td class="align-middle">
                        <button class="btn btn-sm btn-info me-1" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modifierVoyageModal"
                                data-id="{{ $voyage->id }}"
                                 data-depart="{{ $voyage->lieu_depart }}"
                                data-destination="{{ $voyage->destination }}"
                                 
                                data-date_depart="{{ $voyage->date_depart->format('Y-m-d') }}"
                                data-date_retour="{{ $voyage->date_retour->format('Y-m-d') }}"
                                 data-heure_depart="{{ $voyage->heure_depart }}"
                                  data-heure_arrivee="{{ $voyage->heure_arrivee }}"
                                   data-nbr_arret="{{ $voyage->nbr_arret }}"
                                data-prix="{{ $voyage->prix }}"
                                data-places_disponibles="{{ $voyage->places_disponibles }}"
                                data-description="{{ $voyage->description }}">
                            <i class="bi bi-pencil-square text-white"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" 
                                data-bs-toggle="modal" 
                                data-bs-target="#supprimerVoyageModal"
                                data-id="{{ $voyage->id }}"
                                data-destination="{{ $voyage->destination }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
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

<!-- Modal Ajouter Voyage -->
<div class="modal fade" id="ajouterVoyageModal" tabindex="-1" aria-labelledby="ajouterVoyageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="ajouterVoyageModalLabel">Ajouter un voyage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('voyages.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="lieu_depart" class="form-label">Lieu de départ*</label>
                            <input type="text" class="form-control" id="lieu_depart" name="lieu_depart" required>
                        </div>
                        <div class="col-md-6">
                            <label for="destination" class="form-label">Destination*</label>
                            <input type="text" class="form-control" id="destination" name="destination" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="date_depart" class="form-label">Date de départ*</label>
                            <input type="date" class="form-control" id="date_depart" name="date_depart" required>
                        </div>
                        <div class="col-md-6">
                            <label for="date_retour" class="form-label">Date de retour*</label>
                            <input type="date" class="form-control" id="date_retour" name="date_retour" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="heure_depart" class="form-label">Heure de départ*</label>
                            <input type="time" class="form-control" id="heure_depart" name="heure_depart" required>
                        </div>
                        <div class="col-md-6">
                            <label for="heure_arrivee" class="form-label">Heure d'arrivée*</label>
                            <input type="time" class="form-control" id="heure_arrivee" name="heure_arrivee" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nbr_arret" class="form-label">Nombre d'arrêts*</label>
                            <input type="number" min="0" class="form-control" id="nbr_arret" name="nbr_arret" required>
                        </div>
                        <div class="col-md-6">
                            <label for="places_disponibles" class="form-label">Nombre de places*</label>
                            <input type="number" min="1" class="form-control" id="places_disponibles" name="places_disponibles" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="prix" class="form-label">Prix (€)*</label>
                            <input type="number" step="0.01" min="0" class="form-control" id="prix" name="prix" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
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

                  <!-- Modal Modifier Voyage -->
                  <div class="modal fade" id="modifierVoyageModal" tabindex="-1" aria-labelledby="modifierVoyageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modifierVoyageModalLabel">Modifier un voyage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('voyages.update', '__ID__') }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit_lieu_depart" class="form-label">Lieu de départ*</label>
                            <input type="text" class="form-control" id="edit_lieu_depart" name="lieu_depart" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_destination" class="form-label">Destination*</label>
                            <input type="text" class="form-control" id="edit_destination" name="destination" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit_date_depart" class="form-label">Date de départ*</label>
                            <input type="date" class="form-control" id="edit_date_depart" name="date_depart" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_date_retour" class="form-label">Date de retour*</label>
                            <input type="date" class="form-control" id="edit_date_retour" name="date_retour" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit_heure_depart" class="form-label">Heure de départ*</label>
                            <input type="time" class="form-control" id="edit_heure_depart" name="heure_depart" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_heure_arrivee" class="form-label">Heure d'arrivée*</label>
                            <input type="time" class="form-control" id="edit_heure_arrivee" name="heure_arrivee" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit_nbr_arret" class="form-label">Nombre d'arrêts*</label>
                            <input type="number" min="0" class="form-control" id="edit_nbr_arret" name="nbr_arret" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_places_disponibles" class="form-label">Nombre de places*</label>
                            <input type="number" min="1" class="form-control" id="edit_places_disponibles" name="places_disponibles" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit_prix" class="form-label">Prix (€)*</label>
                            <input type="number" step="0.01" min="0" class="form-control" id="edit_prix" name="prix" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
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

<!-- Modal Supprimer Voyage -->
<div class="modal fade" id="supprimerVoyageModal" tabindex="-1" aria-labelledby="supprimerVoyageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="supprimerVoyageModalLabel">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer ce voyage ? Cette action est irréversible.</p>
                <p id="voyageInfo"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="{{ route('voyages.destroy', '__ID__') }}" method="POST" id="deleteForm">
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
        const editModal = document.getElementById('modifierVoyageModal');
        if (editModal) {
            editModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const form = document.getElementById('editForm');

                document.getElementById('edit_lieu_depart').value = button.dataset.depart;
                document.getElementById('edit_destination').value = button.dataset.destination;
                document.getElementById('edit_date_depart').value = button.dataset.date_depart;
                document.getElementById('edit_date_retour').value = button.dataset.date_retour;
                document.getElementById('edit_heure_depart').value = button.dataset.heure_depart;
                document.getElementById('edit_heure_arrivee').value = button.dataset.heure_arrivee;
                document.getElementById('edit_nbr_arret').value = button.dataset.nbr_arret;
                document.getElementById('edit_places_disponibles').value = button.dataset.places_disponibles;
                document.getElementById('edit_prix').value = button.dataset.prix;
                document.getElementById('edit_description').value = button.dataset.description;

                form.action = `/voyages/${button.dataset.id}`;
            });
        }

        const deleteModal = document.getElementById('supprimerVoyageModal');
        if (deleteModal) {
            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const form = document.getElementById('deleteForm');

                document.getElementById('voyageInfo').innerHTML = 
                    `Voyage #${button.dataset.id} : <strong>${button.dataset.destination}</strong>`;

                form.action = `/voyages/${button.dataset.id}`;
            });
        }
    });
</script>
@endsection
