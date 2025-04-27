<!-- resources/views/clients/index.blade.php -->
@extends('layout.landingPage')

@section('content')
<!-- Carte de recherche de voyage avec Bootstrap 5 -->
<div class="container-fluid p-0">
    <div class="search-card bg-white rounded shadow">
        <form>
            <div class="row mx-0 align-items-center">
                <!-- Départ -->
                <div class="col-md">
                    <div class="form-group position-relative">
                        <label for="depart" class="fw-bold text-uppercase text-muted small">Départ</label>
                        <div class="destination-selector" id="departSelector">
                            <input type="text" class="form-control border-0 fs-5 fw-bold text-primary" id="depart" name="depart" placeholder="Ville de départ" value="Casablanca" readonly>
                            <input type="hidden" id="departCode" name="departCode" value="CMN">
                        </div>
                    </div>
                </div>

                <!-- Icône d'échange -->
                <div class="col-auto px-0 text-center">
                    <button type="button" id="switchDestinations" class="btn btn-outline-light rounded-circle border">
                        <i class="bi bi-arrow-left-right text-primary"></i>
                    </button>
                </div>

                <!-- Arrivée -->
                <div class="col-md">
                    <div class="form-group position-relative">
                        <label for="arrivee" class="fw-bold text-uppercase text-muted small">Arrivée</label>
                        <div class="destination-selector" id="arriveeSelector">
                            <input type="text" class="form-control border-0 fs-5 fw-bold text-primary" id="arrivee" name="arrivee" placeholder="Ville d'arrivée" value="Agadir" readonly>
                            <input type="hidden" id="arriveeCode" name="arriveeCode" value="AGA">
                        </div>
                    </div>
                </div>

                <!-- Date Aller -->
                <div class="col-md">
                    <div class="form-group position-relative">
                        <label for="dateAller" class="fw-bold text-uppercase text-muted small">Date Aller</label>
                        <div class="date-selector" id="dateAllerSelector">
                            <input type="text" class="form-control border-0 fs-5 fw-bold text-primary" id="dateAller" name="dateAller" value="mar., 29/04" readonly>
                            <input type="hidden" id="dateAllerValue" name="dateAllerValue">
                        </div>
                    </div>
                </div>

                <!-- Date Retour -->
                <div class="col-md">
                    <div class="form-group position-relative">
                        <label for="dateRetour" class="fw-bold text-uppercase text-muted small">Date Retour</label>
                        <div class="date-selector" id="dateRetourSelector">
                            <input type="text" class="form-control border-0 fs-5 fw-bold text-muted" id="dateRetour" name="dateRetour" placeholder="Date Retour" readonly>
                            <input type="hidden" id="dateRetourValue" name="dateRetourValue">
                        </div>
                    </div>
                </div>

                <!-- Voyageurs -->
                <div class="col-md">
                    <div class="form-group position-relative">
                        <label for="voyageurs" class="fw-bold text-uppercase text-muted small">Voyageurs</label>
                        <div class="traveler-selector" id="travelerSelector">
                            <input type="text" class="form-control border-0 fs-5 fw-bold text-primary" id="voyageurs" name="voyageurs" value="1 x Adultes" readonly>
                            <input type="hidden" id="adultes" name="adultes" value="1">
                            <input type="hidden" id="enfants" name="enfants" value="0">
                            <input type="hidden" id="bebes" name="bebes" value="0">
                        </div>
                    </div>
                </div>

                <!-- Bouton de recherche -->
                <div class="col-md-2">
                    <button type="submit" class="btn btn-danger w-100 py-3 fw-bold">Recherche</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal pour sélection des dates -->
<div class="modal fade" id="dateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sélectionnez vos dates</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Date aller</label>
                            <div id="dateAllerCalendar"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Date retour (optionnel)</label>
                            <div id="dateRetourCalendar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="applyDates">Appliquer</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour sélection des voyageurs -->
<div class="modal fade" id="travelerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Voyageurs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Adultes -->
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <h6 class="mb-0">Adultes</h6>
                    </div>
                    <div class="input-group" style="width: 120px;">
                        <button class="btn btn-danger" type="button" id="adulteMinus">-</button>
                        <input type="text" class="form-control text-center" id="adulteCount" value="1" readonly>
                        <button class="btn btn-danger" type="button" id="adultePlus">+</button>
                    </div>
                </div>

                <!-- Enfants -->
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <h6 class="mb-0">Enfants</h6>
                        <small class="text-muted">2-11 ans</small>
                    </div>
                    <div class="input-group" style="width: 120px;">
                        <button class="btn btn-danger" type="button" id="enfantMinus">-</button>
                        <input type="text" class="form-control text-center" id="enfantCount" value="0" readonly>
                        <button class="btn btn-danger" type="button" id="enfantPlus">+</button>
                    </div>
                </div>

                <!-- Bébés -->
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-0">Bébés</h6>
                        <small class="text-muted">Moins de 2 ans</small>
                    </div>
                    <div class="input-group" style="width: 120px;">
                        <button class="btn btn-danger" type="button" id="bebeMinus">-</button>
                        <input type="text" class="form-control text-center" id="bebeCount" value="0" readonly>
                        <button class="btn btn-danger" type="button" id="bebePlus">+</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="applyTravelers">Appliquer</button>
            </div>
        </div>
    </div>
</div>

<!-- Styles CSS -->
<style>
    .search-card {
        padding: 20px;
        border-radius: 8px;
    }

    .destination-selector, .date-selector, .traveler-selector {
        cursor: pointer;
    }

    .form-control:focus {
        box-shadow: none;
    }
</style>

@endsection
