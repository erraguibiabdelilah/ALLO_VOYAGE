<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allo Voyage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>

        .select-btn {
            background-color: #ff6600 !important;
            border: none !important;
            border-radius: 8px !important;
            color: white !important;
            font-weight: 600 !important;
            box-shadow: 0 15px 26px rgba(255, 102, 0, 0.3) !important;
            transition: all 0.3s ease !important;
            height: 100% !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .select-btn:hover {
            background-color: #e65c00 !important;
            box-shadow: 0 6px 20px rgba(255, 102, 0, 0.4) !important;
            transform: translateY(-2px) !important;
        }

        .switch-btn {
            background-color: transparent;
            border-color: #dee2e6 !important;
            padding: 8px;
        }

        .switch-btn:hover {
            background-color: transparent !important;
            border-color: #ff6a00 !important;
            color: #ff6a00;
        }

        .switch-btn:active, .switch-btn:focus {
            background-color: transparent !important;
            box-shadow: none !important;
            border-color: #ff6a00 !important;
            color: #ff6a00;
        }

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
            position: absolute;
            top: 31rem;
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            margin-left: 10%;
        }

        .destination-selector, .date-selector, .traveler-selector {
            cursor: pointer;
        }

        .form-control:focus {
            box-shadow: none;
        }
        .orange-text{
            color:#ff6a00;
        }

        .bg-orange {
            background-color: #ff6a00;
        }

        .feature-card {
            height: 100%;
            box-shadow :8px -4px 1px 3px  rgba(12, 69, 255, 0.1) !important;
            transition: transform 0.3s;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 6px 6px 6px -2px rgba(252, 164, 0, 0.1);
        }
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #000000;
        }
        .section-services{
            margin-top: 10rem;
        }
        a{
            text-decoration: none;
            color : #000000;
        }


    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-bottom">
        <div class="container-fluid">
            <!-- Logo à gauche -->
            <a class="navbar-brand" href="#">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Allo Voyage" class="logo">
                    <div class="ms-2">
                        <span class="text-primary fw-bold"style="font-size: 18px;">ALLO VOYAGE</span>
                            <span class="text-muted d-block" style="font-size: 12px;">TRAVEL AGENCY</span>
                    </div>
                </div>
            </a>

            <!-- Liens à gauche juste après le logo -->
            <div class="d-flex align-items-center ms-4">
                <div class="notification-badge me-3" id="notificationBell">
                    <i class="bi bi-house fs-6 text-primary"></i> Accueil <span class="mx-3">|</span>
                </div>

                <div class="notification-badge me-3" id="messageBell">
                    <i class="bi bi-question-octagon fs-6 text-primary"></i> Aide <span class="mx-3">|</span>
                </div>

                <div class="d-flex align-items-center me-3" id="profileSection">
                    <div class="notification-badge">
                        <a href="{{ route('login') }}"> <i class="bi bi-person fs-5 text-primary"></i> Se connecter</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>



<!-- Section plein écran -->
<div class="container-fluid hero-section d-flex align-items-center" style="height: 80vh; background-color: #ffffff;">
    <div class="container">
        <div class="row align-items-center">
            <!-- Colonne texte -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="hero-title mb-3 fw-bold">Réservez vos tickets de bus</h1>
                <h2 class="highlight-text mb-4 fw-bold" style="color:#ff6a00">en moins de 2 minutes</h2>
                <p class="lead mb-4">
                    Avec <strong>AlloVoyage.ma</strong>, accédez à <strong>100+ operators</strong>, profitez des meilleurs prix,
                    et payez facilement en ligne ou en cash.
                </p>
            </div>

            <!-- Colonne image -->
            <div class="col-lg-6 d-flex justify-content-center">
                <div class="bus-image-container">
                    <img src="{{ asset('images/landingPage2.png') }}" alt="Bus avec destinations touristiques" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Carte de recherche de voyage avec Bootstrap 5 -->
  <div class="container-fluid p-0 search">
    <div class="search-card bg-white rounded shadow">
        <form action="{{ route('findVoyage') }}" method="POST">
            @csrf
            <div class="row mx-0 align-items-center">
                <!-- Départ -->
                <div class="col-md">
                    <div class="form-group position-relative">
                        <label for="departSelect" class="fw-bold text-uppercase small" style="color:#ff6a00">De</label>
                        <div class="destination-selector mt-2">
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
                </div>

                <!-- Icône d'échange -->
                <div class="col-auto px-0 text-center">
                    <button type="button" id="switchDestinations" class="btn rounded-circle border switch-btn">
                        <i class="bi bi-arrow-left-right"></i>
                    </button>
                </div>

                <!-- Arrivée -->
                <div class="col-md">
                    <div class="form-group position-relative">
                        <label for="arriveeSelect" class="fw-bold text-uppercase small" style="color:#ff6a00">À</label>
                        <div class="destination-selector mt-2">
                           <select class="form-select" name="villeArrive" required>
                            <option value="" selected>Ville d'arrivée</option>
                            <option value="Casablanca">Casablanca</option>
                            <option value="Marrakech">Marrakech</option>
                            <option value="Agadir">Agadir</option>
                            <option value="Rabat">Rabat</option>
                            <option value="Fès">Fès</option>
                        </select>
                        </div>
                    </div>
                </div>

                <!-- Date Aller -->
                <div class="col-md">
                    <div class="form-group position-relative">
                        <label for="dateAller" class="fw-bold text-uppercase small" style="color:#ff6a00">Départ</label>
                        <div class="date-selector mt-2">
                             <input type="date" class="form-control" id="date" name="datedepart" required>
                        </div>
                    </div>
                </div>

                <!-- Date Retour -->
                <div class="col-md">
                    <div class="form-group position-relative">
                        <label for="dateRetour" class="fw-bold text-uppercase small" style="color:#ff6a00">Retour</label>
                        <div class="date-selector mt-2">
                              <input type="date" class="form-control" id="date" name="datearrivé">
                        </div>
                    </div>
                </div>

                <!-- Voyageurs -->
                <div class="col-md">
                    <div class="form-group position-relative">
                        <label for="voyageurs" class="fw-bold text-uppercase small" style="color:#ff6a00">Passagers</label>
                        {{-- <div class="traveler-selector mt-2">
                            <input type="number" id="voyageurs" name="nbrVoyageurs" value="1" step="1" min="1" max="10" class="form-control border-0 fs-5 fw-bold" required>
                        </div> --}}
                        <div class="input-group mt-2">
                            <select class="form-select" name="nbrVoyageurs">
                                <option selected value="1">1 Passager</option>
                                <option value="2">2 Passagers</option>
                                <option value="3">3 Passagers</option>
                                <option value="4">4 Passagers</option>
                                <option value="5">5 Passagers</option>
                                <option value="6">6 Passagers</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Bouton de recherche -->
                <div class="col-md-2">
                    <div class="form-group position-relative">
                        <label class="fw-bold text-uppercase small" style="color:#ff6a00">&nbsp;</label>
                        <div class="mt-2">
                            <button type="submit" class="select-btn btn btn-outline-primary bg-orange w-100 h-100 fw-bold text-white" style="height: 38px;">
                                Rechercher
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<section class="py-5  section-services">
    <div class="container">
        <h2 class="text-center mb-5">Nos Services de Confort</h2>

        <div class="row g-4">
            <!-- Siège confortable -->
            <div class="col-md-6 col-lg-3">
                <div class="card feature-card p-4 text-center shadow-sm">
                    <div class="feature-icon">
                        <img src="images/comfort.png" width="60px" height="60px"/>
                    </div>
                    <h3 class="h5 orange-text">CONFORT</h3>
                    <p class="mb-0">Siège confortable et inclinable avec espace pour les jambes</p>
                </div>
            </div>

            <!-- Wifi -->
            <div class="col-md-6 col-lg-3">
                <div class="card feature-card p-4 text-center shadow-sm">
                    <div class="feature-icon dark">
                        <i class="bi bi-wifi"></i>
                    </div>
                    <h3 class="h5 orange-text">WIFI</h3>
                    <p class="mb-0">Wifi gratuit pour rester connecté durant le voyage</p>
                </div>
            </div>

            <!-- USB -->
            <div class="col-md-6 col-lg-3">
                <div class="card feature-card p-4 text-center shadow-sm">
                    <div class="feature-icon dark">
                        <i class="bi bi-usb-symbol"></i>
                    </div>
                    <h3 class="h5 orange-text">USB</h3>
                    <p class="mb-0">Port de recharge USB adapté à tous types d'appareil</p>
                </div>
            </div>

            <!-- Divertissement -->
            <div class="col-md-6 col-lg-3">
                <div class="card feature-card p-4 text-center shadow-sm">
                    <div class="feature-icon">
                        <i class="bi bi-tablet-landscape"></i>
                    </div>
                    <h3 class="h5 orange-text">DIVERTISSEMENT</h3>
                    <p class="mb-0">Plateforme de divertissement connectée à votre appareil</p>
                </div>
            </div>
        </div>
    </div>
</section>


</section>

<!-- Section Avis Clients -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Ce que disent nos voyageurs</h2>
        
        <div class="row g-4">
            <!-- Avis 1 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img src="images/avatar1.jpg" class="rounded-circle" width="60" height="60" alt="Avatar" 
                                 onerror="this.src='https://ui-avatars.com/api/?name=Sarah+M&background=ff6600&color=fff'">
                            <div class="ms-3">
                                <h5 class="mb-0">Sarah M.</h5>
                                <div class="text-warning">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mb-0">"Service exceptionnel ! Le bus était très confortable et le personnel très attentionné. Je recommande vivement AlloVoyage pour tous vos déplacements."</p>
                    </div>
                </div>
            </div>

            <!-- Avis 2 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img src="images/avatar2.jpg" class="rounded-circle" width="60" height="60" alt="Avatar"
                                 onerror="this.src='https://ui-avatars.com/api/?name=Karim+H&background=ff6600&color=fff'">
                            <div class="ms-3">
                                <h5 class="mb-0">Karim H.</h5>
                                <div class="text-warning">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mb-0">"Réservation facile et rapide. Les horaires sont respectés et le WiFi à bord est un vrai plus. Je voyage régulièrement avec eux."</p>
                    </div>
                </div>
            </div>

            <!-- Avis 3 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img src="images/avatar3.jpg" class="rounded-circle" width="60" height="60" alt="Avatar"
                                 onerror="this.src='https://ui-avatars.com/api/?name=Leila+B&background=ff6600&color=fff'">
                            <div class="ms-3">
                                <h5 class="mb-0">Leila B.</h5>
                                <div class="text-warning">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mb-0">"Prix très compétitifs et service client réactif. Les sièges sont confortables et l'expérience de voyage est toujours agréable."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Éléments
        const notificationBell = document.getElementById('notificationBell');
        const messageBell = document.getElementById('messageBell');
        const profileSection = document.getElementById('profileSection');
        const notificationModal = document.getElementById('notificationModal');
        const messageModal = document.getElementById('messageModal');
        const profileModal = document.getElementById('profileModal');
        const closeNotificationModal = document.getElementById('closeNotificationModal');
        const closeMessageModal = document.getElementById('closeMessageModal');

        // Fonction pour fermer tous les modals
        function closeAllModals() {
            notificationModal.style.display = 'none';
            messageModal.style.display = 'none';
            profileModal.style.display = 'none';
        }

        // Fonctions pour gérer l'ouverture et la fermeture des modals
        function toggleNotificationModal() {
            closeAllModals();
            notificationModal.style.display = 'block';
        }

        function toggleMessageModal() {
            closeAllModals();
            messageModal.style.display = 'block';
        }

        function toggleProfileModal() {
            closeAllModals();
            profileModal.style.display = 'block';
        }

        // Événements
        notificationBell.addEventListener('click', function(event) {
            event.stopPropagation();
            toggleNotificationModal();
        });

        messageBell.addEventListener('click', function(event) {
            event.stopPropagation();
            toggleMessageModal();
        });

        profileSection.addEventListener('click', function(event) {
            event.stopPropagation();
            toggleProfileModal();
        });

        closeNotificationModal.addEventListener('click', function() {
            notificationModal.style.display = 'none';
        });

        closeMessageModal.addEventListener('click', function() {
            messageModal.style.display = 'none';
        });

        // Ferme les modals si on clique en dehors
        document.addEventListener('click', function(event) {
            if (!notificationBell.contains(event.target) &&
                !messageBell.contains(event.target) &&
                !profileSection.contains(event.target) &&
                !notificationModal.contains(event.target) &&
                !messageModal.contains(event.target) &&
                !profileModal.contains(event.target)) {
                closeAllModals();
            }
        });
    });
</script>
</body>
</html>
