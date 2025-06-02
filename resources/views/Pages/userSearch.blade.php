@extends('layout.user')
@section('content')
<div class="container">
    <div class="search-card">
        <form action="{{ route('findVoyage') }}" method="POST">
            @csrf
            <div class="row align-items-center g-3">
                <!-- DE (Ville de départ) -->
                <div class="col-lg-2 col-md-6 col-12 position-relative">
                    <span class="label-text">Ville de départ</span>
                    <div class="input-group">
                        <select class="form-select" name="villeDepart">
                            <option selected>Ville de départ</option>
                            <option>Casablanca</option>
                            <option value="Marrakech">Marrakech</option>
                            <option value="Agadir">Agadir</option>
                            <option>Rabat</option>
                            <option>Fès</option>
                        </select>
                    </div>
                </div>

                <!-- À (Ville d'arrivée) -->
                <div class="col-lg-2 col-md-6 col-12">
                    <span class="label-text">Ville d'arrivée</span>
                    <div class="input-group">
                        <select class="form-select" name="villeArrive">
                            <option selected value="">Ville d'arrivée</option>
                            <option value="Casablanca">Casablanca</option>
                            <option value="Marrakech">Marrakech</option>
                            <option value="Agadir">Agadir</option>
                            <option value="Rabat">Rabat</option>
                            <option value="Fès">Fès</option>
                        </select>
                    </div>
                </div>

                <!-- DÉPART (Date de départ) -->
                <div class="col-lg-2 col-md-6 col-12">
                    <span class="label-text">Date départ</span>
                    <div class="input-group">
                        <input type="date" class="form-control" id="date" name="datedepart">
                    </div>
                </div>

                <!-- RETOUR (Date de retour) -->
                <div class="col-lg-2 col-md-6 col-12">
                    <span class="label-text">Date Arrivée</span>
                    <div class="input-group">
                        <input type="date" class="form-control" id="date" name="datearrivee">
                    </div>
                </div>

                <!-- PASSAGERS (Nombre de passagers) -->
                <div class="col-lg-2 col-md-6 col-12">
                    <span class="label-text">PASSAGERS</span>
                    <div class="input-group">
                        <select class="form-select" name="passagerie">
                            <option selected value="1">1 Passagers</option>
                            <option value="2">2 Passagers</option>
                            <option value="3">3 Passagers</option>
                            <option value="4">4 Passagers</option>
                            <option value="5">5 Passagers</option>
                            <option value="6">6 Passagers</option>
                        </select>
                    </div>
                </div>

                <!-- Bouton de recherche -->
                <div class="col-lg-2 col-md-6 col-12">
                    <button class="search-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search me-2" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        Recherche
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="main">
    @yield('contnet')
</div>

@endsection
