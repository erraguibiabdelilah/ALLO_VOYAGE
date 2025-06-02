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

    <div class="row border rounded p-3 bg-light">
        <!-- Sidebar - 25% -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('profile') }}" 
                   class="list-group-item list-group-item-action active"
                   style="background-color: #ff6a00; border-color: #ff6a00;">
                    Compte
                </a>
                <a href="{{ route('myreservations') }}" 
                   class="list-group-item list-group-item-action">
                    Réservations
                </a>
            </div>
        </div>

        <!-- Main Content - 75% -->
        <div class="col-md-9">
            <h2 class="highlight-text mb-4 fw-bold" style="color:#ff6a00">Détails personnels</h2>
            
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update', auth()->user()->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold" style="color:#ff6a00">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   value="{{ auth()->user()->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold" style="color:#ff6a00">Email</label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="{{ auth()->user()->email }}" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" 
                                    style="background-color: #ff6a00; border-color: #ff6a00;">
                                Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection