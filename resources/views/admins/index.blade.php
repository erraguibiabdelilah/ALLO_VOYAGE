@extends('layout.admin')

@section('content')
<div class="container-fluid mt-5">
    <h3 class="mb-4">Liste des Admins</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addAdminModal">
            Ajouter un admin
        </button>

        <div class="input-group" style="width: 250px;">
            <input type="text" class="form-control" placeholder="Rechercher">
            <button class="btn btn-outline-primary" type="button">
                <i class="bi bi-search"></i> Rechercher
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-warning">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <button 
                            class="btn btn-info btn-sm text-white me-1 editBtn"
                            data-id="{{ $admin->id }}"
                            data-name="{{ $admin->name }}"
                            data-email="{{ $admin->email }}"
                            data-bs-toggle="modal" data-bs-target="#editAdminModal">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Supprimer cet admin ?')" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Ajouter Admin --}}
<div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="addAdminModalLabel">Ajouter un admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admins.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="add-name" class="form-label">Nom</label>
                        <input type="text" id="add-name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="add-email" class="form-label">Email</label>
                        <input type="email" id="add-email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="add-password" class="form-label">Mot de passe</label>
                        <input type="password" id="add-password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="add-password-confirm" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" id="add-password-confirm" name="password_confirmation" class="form-control" required>
                    </div>
                    <div class="modal-footer px-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-warning">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Modal Modifier Admin --}}
<div class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="editAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="editAdminModalLabel">Modifier un admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="edit-id">
                    <div class="mb-3">
                        <label for="edit-name" class="form-label">Nom</label>
                        <input type="text" id="edit-name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-email" class="form-label">Email</label>
                        <input type="email" id="edit-email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-password" class="form-label">Nouveau mot de passe (laisser vide si inchangé)</label>
                        <input type="password" id="edit-password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="edit-password-confirm" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" id="edit-password-confirm" name="password_confirmation" class="form-control">
                    </div>
                    <div class="modal-footer px-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-info text-white">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Script JS pour remplir le modal d’édition --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    const editButtons = document.querySelectorAll('.editBtn');
    const editForm = document.getElementById('editForm');
    const editId = document.getElementById('edit-id');
    const editName = document.getElementById('edit-name');
    const editEmail = document.getElementById('edit-email');

    editButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.getAttribute('data-id');
            const name = btn.getAttribute('data-name');
            const email = btn.getAttribute('data-email');

            editId.value = id;
            editName.value = name;
            editEmail.value = email;

            editForm.action = `/admins/${id}`;
        });
    });
});
</script>
@endsection
