@extends('layout.admin')

@section('content')
<div class="container my-5">
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="voyage_id" value="{{ $voyage->id }}">

        <!-- Contact -->
        <div class="card mb-3">
            <div class="card-header">Contact</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label>Prénom</label>
                        <input type="text" class="form-control" name="prenom" required>
                    </div>
                    <div class="col-md-6">
                        <label>Nom</label>
                        <input type="text" class="form-control" name="nom" required>
                    </div>
                    <div class="col-md-12">
                        <label>Numéro WhatsApp</label>
                        <input type="text" class="form-control" name="telephone" placeholder="+212..." required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Réservation de siège -->
        <div class="card mb-3">
            <div class="card-header">Réservation de siège</div>
            <div class="card-body">
                <label>Nombre de places</label>
                <input type="number" name="nbrplace" class="form-control" min="1" max="{{ $voyage->places_disponibles }}" value="1" required>
                <small>{{ $voyage->places_disponibles }} places disponibles</small>
            </div>
        </div>

        <!-- Paiement -->
        <div class="card mb-3">
            <div class="card-header">Paiement</div>
            <div class="card-body">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="payment_method" value="paypal" id="paypal" required>
                    <label class="form-check-label" for="paypal">Paypal</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="payment_method" value="especes" id="especes">
                    <label class="form-check-label" for="especes">Espèces (Cash Plus, Wafacash, etc.)</label>
                </div>
            </div>
        </div>

        <!-- Résumé -->
        <div class="card mb-3">
            <div class="card-header">Votre réservation</div>
            <div class="card-body">
                <p><strong>De :</strong> {{ $voyage->lieu_depart }}</p>
                <p><strong>À :</strong> {{ $voyage->destination }}</p>
                <p><strong>Départ :</strong> {{ \Carbon\Carbon::parse($voyage->date_depart)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($voyage->heure_depart)->format('H:i') }}</p>
                <p><strong>Prix :</strong> {{ $voyage->prix }} DH</p>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">Confirmer la réservation</button>
    </form>
</div>
@endsection