@extends('layout.user')
@section('content')
<div class="container">
    <div class="search-card">
        <form action="{{ route('findVoyage') }}" method="POST">
            @csrf
            <div class="row align-items-center g-3">
                <!-- DE (Ville de départ) -->
                <div class="col-lg-2 col-md-6 col-12 position-relative">
                    <label for="departSelect" class="fw-bold small" style="color:#ff6a00">De</label>
                    <div class="input-group mt-2">
                        <select class="form-select" name="villeDepart" required>
                            <option selected value="">Ville de départ</option>
                            <option value="Casablanca">Casablanca</option>
                            <option value="Marrakech">Marrakech</option>
                            <option value="Agadir">Agadir</option>
                            <option value="Rabat">Rabat</option>
                            <option value="Fès">Fès</option>
                        </select>
                    </div>
                </div>

                <!-- À (Ville d'arrivée) -->
                <div class="col-lg-2 col-md-6 col-12">
                    <label for="departSelect" class="fw-bold small" style="color:#ff6a00">À</label>
                    <div class="input-group mt-2">
                        <select class="form-select" name="villeArrive" required>
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
                    <span class="label-text">Date de départ</span>
                    <div class="input-group mt-2">
                        <input type="date" class="form-control" id="date" name="datedepart" required>
                    </div>
                </div>

                <!-- RETOUR (Date de retour) -->
                <div class="col-lg-2 col-md-6 col-12">
                    <span class="label-text">Date d'arrivée</span>
                    <div class="input-group mt-2">
                        <input type="date" class="form-control" id="date" name="datearrivee">
                    </div>
                </div>

                <!-- PASSAGERS (Nombre de passagers) -->
                <div class="col-lg-2 col-md-6 col-12">
                    <span class="label-text">Passagers</span>
                    <div class="input-group mt-2">
                        <select class="form-select" name="passagerie">
                            <option selected value="1">1 Passager</option>
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



<div class="container py-4">
    @if(isset($message) && $message)
        <div class="text-center">
            <img src="{{ asset('images/not-found.png') }}" alt="No Results Found" class="img-fluid" style="max-width: 400px;">
        </div>
    @endif

    @if(count($voyages) > 0)
    <h2 class="highlight-text mb-4 fw-bold" style="color:#ff6a00"><i class="fa-solid fa-square-check" style="color: #ff6a00"></i> Choisir l'itinéraire</h2>
    @foreach ($voyages as $voyage)
        <div class="transport-card bg-white mb-4">
            <div class="card-body p-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="row align-items-center text-center">
                            <div class="col-lg-2 col-md-2 text-start ml-2 text-center">
                                <img style="width: 60px ; height:auto" src="{{ asset('images/logo.jpg') }}" alt="Allo Voyage" class="logo">
                                <p class="text-primary fw-bold" style="font-size: 16px;">ALLO VOYAGE</p>
                            </div>
                            <!-- Departure -->
                            <div class="col-lg-2 col-md-2 text-start ml-2 mx-2">
                                <div class="time">{{$voyage->heure_depart}}</div>
                                <div class="city">{{$voyage->lieu_depart}}</div>
                                <div class="station">Gare Routiere Agadir</div>
                            </div>

                            <!-- Duration -->
                            <div class="col-lg-1 col-md-1 text-center mx-2">
                                {{ \Carbon\Carbon::parse($voyage->heure_depart)->diffInMinutes(\Carbon\Carbon::parse($voyage->heure_arrivee)) }} minutes
                                <div class="journey-line position-relative">
                                    <hr style="border-top: 0.5px #ccc;">
                                    <i class="fa-sharp fa-solid fa-right-long fa-beat fa-2xl" style="color: #ff6600;"></i>
                                </div>
                            </div>

                            <!-- Arrival -->
                            <div class="col-lg-2 col-md-2 text-end mx-2">
                                <div class="time">{{$voyage->heure_arrivee}}</div>
                                <div class="city">{{$voyage->destination}}</div>
                                <div class="station">Gare Routiere de Marrakech</div>
                            </div>
                            <div class="col-lg-3 col-md-3 text-center" style="margin-left: 8rem">
                                <div class="price">{{$voyage->prix}} DH</div>
                                <div class="per-person">par personne</div>

                                <button 
                                    class="select-btn btn btn-outline-primary bg-orange w-100 py-3 fw-bold text-white hover:text-primary mt-2"
                                    type="button" data-bs-toggle="offcanvas" 
                                    data-bs-target="#offcanvasRight" 
                                    aria-controls="offcanvasRight"
                                    data-voyage-id="{{$voyage->id}}"
                                    data-ville-depart="{{$voyage->lieu_depart}}"
                                    data-heure-depart="{{$voyage->heure_depart}}"
                                    data-ville-arrive="{{$voyage->destination}}"
                                    data-heure-arrivee="{{$voyage->heure_arrivee}}"
                                    data-prix="{{$voyage->prix}}"
                                    data-nbr_arret="{{$voyage->nbr_arret}}"
                                    data-duree="{{ \Carbon\Carbon::parse($voyage->heure_depart)->diffInMinutes(\Carbon\Carbon::parse($voyage->heure_arrivee)) }}">
                                    Sélectionner
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @endif
</div>

<div class="offcanvas offcanvas-end" style="width: 600px;" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Agadir Marrakech</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <div class="journey-header">
            <p class="mb-0 text-muted"><strong>Durée :</strong> <span id="voyage-duree"></span> minutes - Trajet direct</p>
        </div>

        <div class="journey-image">
            <img src="{{ asset('images/autocar2.png') }}" alt="Bus Jaouharat Agadir">
        </div>

        <div class="time-location-container">
            <div class="time-location">
                <div class="time-dot"></div>
                <div class="d-flex align-items-center text-primary mb-1">
                    <i class="fa fa-clock me-2"></i>
                    <strong><span id="heure-depart"></span></strong>
                </div>
                <div>
                    <strong><span id="ville-depart-nom"></span></strong>
                    <p class="text-muted mb-0">Gare Routière De <span id="ville-depart-loc"></span></p>
                </div>
            </div>

            <div class="time-location">
                <div class="time-dot"></div>
                <div class="d-flex align-items-center text-primary mb-1">
                    <i class="fa fa-clock me-2"></i>
                    <strong><span id="heure-arrivee"></span></strong>
                </div>
                <div>
                    <strong><span id="ville-arrivee-nom"></span></strong>
                    <p class="text-muted mb-0">Gare Routière <span id="ville-arrivee-loc"></span></p>
                </div>
            </div>
        </div>

        <div class="amenities-section">
            <div class="row">
                <div class="col-3">
                    <div class="amenity-icon">
                        <i class="fa fa-snowflake me-1"></i>Climatisation
                    </div>
                </div>

                <div class="col-3">
                    <div class="amenity-icon">
                        <i class="fa fa-lightbulb me-1"></i> Lumière
                    </div>
                </div>

                <div class="col-3">
                    <div class="amenity-icon">
                        <i class="fa fa-plug me-1"></i> Chargeur
                    </div>
                </div>

                <div class="col-3">
                    <div class="amenity-icon">
                        <i class="fa fa-wifi me-1"></i> Wifi
                    </div>
                </div>
            </div>
        </div>

        <div class="action-section mt-4">
            <a id="continuer-btn" href="#" class="action-button text-decoration-none">Continuer</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Sélectionner tous les boutons avec la classe 'select-btn'
    const buttons = document.querySelectorAll('.select-btn');
    const continuerBtn = document.getElementById('continuer-btn');
    let selectedVoyageId = null;

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            // Récupérer les données depuis les attributs data-*
            selectedVoyageId = this.getAttribute('data-voyage-id');
            const villeDepart = this.getAttribute('data-ville-depart');
            const heureDepart = this.getAttribute('data-heure-depart');
            const villeArrive = this.getAttribute('data-ville-arrive');
            const heureArrivee = this.getAttribute('data-heure-arrivee');
            const prix = this.getAttribute('data-prix');
            const nbrArret = this.getAttribute('data-nbr_arret');
            const duree = this.getAttribute('data-duree');

            // Mettre à jour le titre de l'offcanvas
            document.getElementById('offcanvasRightLabel').textContent = villeDepart + ' - ' + villeArrive;

            // Insérer les données dans l'offcanvas
            document.getElementById('voyage-duree').textContent = duree;
            document.getElementById('heure-depart').textContent = heureDepart;
            document.getElementById('heure-arrivee').textContent = heureArrivee;
            document.getElementById('ville-depart-nom').textContent = villeDepart;
            document.getElementById('ville-depart-loc').textContent = villeDepart;
            document.getElementById('ville-arrivee-nom').textContent = villeArrive;
            document.getElementById('ville-arrivee-loc').textContent = villeArrive;

            // Mettre à jour l'URL du bouton Continuer avec l'ID du voyage
            continuerBtn.setAttribute('href', '/reservations/create/' + selectedVoyageId);
        });
    });
});
</script>


@endsection
