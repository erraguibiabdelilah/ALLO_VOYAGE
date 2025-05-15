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
</head>
<body>
 <style>
        /* Styles personnalisés */
        body {
            overflow-x: hidden;
        }

        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .form-label {
            margin-bottom: 0.25rem;
        }

        .main-content {
            padding: 20px;
            background-color: #fdfdfd;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
            margin-top: 60px; /* Hauteur de la navbar */
        }

        .main-content.expanded {
            margin-left: 70px;
        }

        .navbar {
            background-color: white;
            padding: 0.5rem 1rem;
            position: fixed;
            width: 100%;
            z-index: 1030;
            left: 0;
            top: 0;
            height: 60px;
        }

        /* Disposition fixe pour la navbar */
        .navbar-container {
            display: flex;
            align-items: center;
            width: 100%;
        }

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

        /* Logo fixe, non affecté par la sidebar */
        .logo-container {
            display: flex;
            align-items: center;
            padding-right: 20px;
            flex-shrink: 0;  /* Empêche le conteneur de se rétrécir */
        }

        /* Zone du contenu principal de la navbar */
        .navbar-content {
            flex-grow: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-left: 20px;
        }

        .logo {
            height: 35px;
        }

        .profile-icon {
            width: 35px;
            height: 35px;
            background-color: #6c757d;
            border-radius: 50%;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification-badge {
            position: relative;
            cursor: pointer;
        }

        .badge-number {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .active-sidebar {
            background-color: #0d6efd;
            color: white !important;
        }

        .toggle-sidebar {
            cursor: pointer;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .toggle-sidebar:hover {
            background-color: #f8f9fa;
        }

                .transport-card {
            border-radius: 15px;
            border: 1px solid #e0e0e0;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .company-name {
            font-weight: 600;
            font-size: 0.9rem;
        }

        .arabic-text {
            font-size: 0.9rem;
        }

        .time {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .city {
            font-weight: 600;
            font-size: 1rem;
        }

        .station {
            font-size: 0.8rem;
            color: #666;
        }

        .duration {
            font-size: 0.75rem;
            color: #666;
            border-top: 1px dashed #ccc;
            padding-top: 5px;
        }

        .price {
            font-size: 1.8rem;
            font-weight: 700;
            color: #ff6600;
        }

        .per-person {
            font-size: 0.8rem;
            color: #666;
        }

        .select-btn {
            background-color: #ff6600;
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            padding: 10px 20px;
        }

        .select-btn:hover {
            background-color: #e65c00;
        }


        .close-btn {
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            color: #6c757d;
        }
        .shadow-bottom {
         box-shadow: 0 6px 6px -2px rgba(0, 117, 252, 0.1); /* Ombre uniquement vers le bas */
            }



        /* Responsive styles */
        @media (max-width: 767.98px) {
            .navbar-brand .text-primary {
                font-size: 0.9rem;
            }

            .navbar-brand .text-muted {
                font-size: 10px !important;
            }

            .profile-text {
                display: none;
            }

            .logo {
                height: 25px;
            }

            .sidebar {
                width: 70px;
                top: 50px;
            }

            .sidebar:not(.collapsed) {
                width: 200px;
            }

            .main-content {
                margin-left: 70px;
                margin-top: 50px;
            }



            .navbar {
                height: 50px;
            }

            body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .hero-section {
            width: 100% !important;
            height: 70vh !important ;
            padding: 60px 0;
            background-color: #ffffff;
        }
        .hero-title {
            font-weight: 700;
            font-size: 2.5rem;
            color: #212529;
        }
        .highlight-text {
            color: #ff6a00;
            font-weight: 700;
            font-size: 2rem;
        }
        .bus-image-container {
            position: relative;
            max-width: 100%;
            height: auto;
        }
        .bus-image-container img {
            max-width: 100%;
            height: auto;
        }

        }



.search-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px;
            margin: 20px 0;
        }

        .label-text {
            font-size: 14px;
            font-weight: 600;

            color: #ff6600;
            margin-bottom: 5px;
            display: block;
        }


        .search-btn {
            background-color: #ff6600;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            font-weight: 600;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 46px;
            width: 100%;
        }

        .search-btn:hover {
            background-color: #e65c00;
        }


        .swap-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #fff;
            border: 1px solid #ff6600;
            color: #ff6600;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
        }

        @media (max-width: 992px) {
            .search-card .row > div {
                margin-bottom: 15px;
            }

            .swap-btn {
                position: static;
                transform: none;
                margin: 0 auto 15px;
            }
        }
    </style>

<div class="container">
        <div class="search-card">
            <div class="row align-items-center g-3">
                <!-- DE (Ville de départ) -->
                <div class="col-lg-2 col-md-6 col-12 position-relative">
                    <span class="label-text">Départ</span>
                    <div class="input-group">
                        <div class="icon-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#666" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </div>
                        <select class="form-select">
                            <option selected>Ville de départ</option>
                            <option>Casablanca</option>
                            <option>Marrakech</option>
                            <option>Agadir</option>
                            <option>Rabat</option>
                            <option>Fès</option>
                        </select>
                    </div>
                </div>

                <!-- Bouton de permutation -->
                <div class="col-lg-1 d-none d-lg-block position-relative">
                    <button class="swap-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                        </svg>
                    </button>
                </div>

                <!-- À (Ville d'arrivée) -->
                <div class="col-lg-2 col-md-6 col-12">
                    <span class="label-text">Arrivée</span>
                    <div class="input-group">
                        <div class="icon-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#666" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </div>
                        <select class="form-select">
                            <option selected>Ville d'arrivée</option>
                            <option>Casablanca</option>
                            <option>Marrakech</option>
                            <option>Agadir</option>
                            <option>Rabat</option>
                            <option>Fès</option>
                        </select>
                    </div>
                </div>

                <!-- Bouton de permutation pour mobile -->
                <div class="col-12 d-lg-none d-flex justify-content-center">
                    <button class="swap-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                        </svg>
                    </button>
                </div>

                <!-- DÉPART (Date de départ) -->
                <div class="col-lg-2 col-md-6 col-12">
                    <span class="label-text">Date départ</span>
                    <div class="input-group">
                        <div class="icon-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#666" class="bi bi-calendar3" viewBox="0 0 16 16">
                                <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                        </div>
                        <input type="date" class="form-control" value="Jeu., Mai 15" readonly>
                    </div>
                </div>

                <!-- RETOUR (Date de retour) -->
                <div class="col-lg-2 col-md-6 col-12">
                    <span class="label-text">Date Arrivée</span>
                    <div class="input-group">
                        <div class="icon-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#666" class="bi bi-calendar3" viewBox="0 0 16 16">
                                <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                        </div>
                        <input type="date" class="form-control" placeholder="Date De Retour" readonly>
                    </div>
                </div>

                <!-- PASSAGERS (Nombre de passagers) -->
                <div class="col-lg-1 col-md-6 col-12">
                    <span class="label-text">PASSAGERS</span>
                    <div class="input-group">
                        <div class="icon-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#666" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                            </svg>
                        </div>
                        <select class="form-select">
                            <option selected>1 Passagers</option>
                            <option>2 Passagers</option>
                            <option>3 Passagers</option>
                            <option>4 Passagers</option>
                            <option>5+ Passagers</option>
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
        <div class="transport-card bg-white">
            <div class="card-body p-3">
                <div class="row align-items-center">


                    <div class="col-12">
                        <div class="row align-items-center">
                            <!-- Departure -->
                            <div class="col-3 text-start ml-2">
                                <div class="time">05:30</div>
                                <div class="city">Agadir</div>
                                <div class="station">Gare Routiere Agadir</div>
                            </div>

                            <!-- Duration -->
                            <div class="col-3 text-center">
                                <div class="duration text-center">3h 30m</div>
                                <div class="journey-line position-relative">
                                    <hr style="border-top: 1px dotted #ccc;">
                                </div>
                            </div>

                            <!-- Arrival -->
                            <div class="col-3 text-end">
                                <div class="time">09:00</div>
                                <div class="city">Marrakech</div>
                                <div class="station">Gare Routiere de Marrakech</div>
                            </div>
                            <div class="col-3  text-center">

                                <div class="price">70 DH</div>
                                <div class="per-person">par personne</div>
                                 <button class="select-btn w-100">Sélectionner</button>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>






</body>
</html>
