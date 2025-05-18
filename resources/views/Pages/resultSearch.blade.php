<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=

    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
     <link rel="stylesheet" href="{{ asset('css/searchResult.css') }}">

</head>
<body>


<div class="container">
        <div class="search-card">
            <form action="{{ route('findVoyage') }}" method="POST">
                @csrf
            <div class="row align-items-center g-3">
                <!-- DE (Ville de départ) -->
                <div class="col-lg-2 col-md-6 col-12 position-relative">
                    <span class="label-text">Départ</span>
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

                <!-- Bouton de permutation
                <div class="col-lg-1 d-none d-lg-block position-relative">
                    <button class="swap-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                        </svg>
                    </button>
                </div> -->

                <!-- À (Ville d'arrivée) -->
                <div class="col-lg-2 col-md-6 col-12">
                    <span class="label-text">Arrivée</span>
                    <div class="input-group">

                        <select class="form-select" name="villeArrive">
                            <option selected>Ville d'arrivée</option>
                            <option>Casablanca</option>
                            <option value="Marrakech">Marrakech</option>
                            <option value="Agadir">Agadir</option>
                            <option>Rabat</option>
                            <option>Fès</option>
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

                        <input type="date" class="form-control" id="date" name="datearrivé">
                    </div>
                </div>

                <!-- PASSAGERS (Nombre de passagers) -->
                <div class="col-lg-2 col-md-6 col-12">
                    <span class="label-text">PASSAGERS</span>
                    <div class="input-group">

                        <select class="form-select" name="passagerie">
                            <option selected value="1">1 Passagers</option>
                            <option value="2"  >2 Passagers</option>
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

<div class="container">
    <div class="row">
        <div class="col-2">

        </div>

        <div class="col-2">

        </div>
    </div>
</div>


 <div class="container py-4">

     @if(isset($message) && $message)
            <div class="alert alert-info">
                {{ $message }}
            </div>
        @endif

    @if(count($voyages) > 0)
    @foreach ($voyages as $voyage)
              <div class="transport-card bg-white">
            <div class="card-body p-3">
                <div class="row align-items-center">


                    <div class="col-12">
                        <div class="row align-items-center">

                            <div class="col-lg-2 col-md-2 text-start ml-2 text-center">
                                 <img style="width: 60px ; height:auto" src="{{ asset('images/logo.jpg') }}" alt="Allo Voyage" class="logo">
                             <p class="text-primary fw-bold"style="font-size: 16px;">ALLO VOYAGE</p>

                            </div>
                            <!-- Departure -->
                            <div class="col-lg-2 col-md-2 text-start ml-2">
                                <div class="time">{{$voyage->heure_depart}}</div>
                                <div class="city">{{$voyage->lieu_depart}}</div>
                                <div class="station">Gare Routiere Agadir</div>
                            </div>

                            <!-- Duration -->
                            <div class="col-lg-2 col-md-2 text-center">
                                {{ \Carbon\Carbon::parse($voyage->heure_arrivee)->diffInMinutes(\Carbon\Carbon::parse($voyage->heure_depart)) }} minutes
                                <div class="journey-line position-relative">
                                    <hr style="border-top: 1px dotted #ccc;">
                                </div>
                            </div>

                            <!-- Arrival -->
                            <div class="col-lg-2 col-md-2 text-end">
                                <div class="time">{{$voyage->heure_arrivee}}</div>
                                <div class="city">{{$voyage->destination}}</div>
                                <div class="station">Gare Routiere de Marrakech</div>
                            </div>
                            <div class="col-lg-3 col-md-3 mx-5 text-center">

                                <div class="price">{{$voyage->prix}}</div>
                                <div class="per-person">par personne</div>

                                 <button class="btn select-btn w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Sélectionner</button>

                            </div>
                        </div>
                    </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    @endif

    </div>













    <div class="offcanvas offcanvas-end " style="width: 600px;" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Agadir Marrakech</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>


   <div class="offcanvas-body">
            <div class="journey-header">
                <p class="mb-0 text-muted">Durée: 4h 30m - Trajet direct</p>
            </div>

            <div class="journey-image ">
                <img src="{{ asset('images/autocar2.png') }}" alt="Bus Jaouharat Agadir">
            </div>

            <div class="time-location-container">
                <div class="time-location">
                    <div class="time-dot"></div>
                    <div class="d-flex align-items-center text-primary mb-1">
                        <i class="fa fa-clock me-2"></i>
                        <strong>01:00</strong>
                    </div>
                    <div>
                        <strong>Gare Routiere de Marrakech - Marrakech</strong>
                        <p class="text-muted mb-0">Gare Routière De Marrakech, Bab Doukkala, Marrakech</p>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-map me-1"></i> Carte
                        </button>
                    </div>
                </div>

                <div class="time-location">
                    <div class="time-dot"></div>
                    <div class="d-flex align-items-center text-primary mb-1">
                        <i class="fa fa-clock me-2"></i>
                        <strong>05:30</strong>
                    </div>
                    <div>
                        <strong>Gare Routiere Agadir - Agadir</strong>
                        <p class="text-muted mb-0">Gare Routière Agadir, Boulevard Abderrahim Bouabid, Agadir</p>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-map me-1"></i> Carte
                        </button>
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
                <button class="action-button">Continuer</button>
            </div>
        </div>
    </div>
</div>













<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
