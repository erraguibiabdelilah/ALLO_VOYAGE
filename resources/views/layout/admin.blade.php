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
        /* Styles personnalisés */
        body {
            overflow-x: hidden;
        }

        .sidebar {
            background-color: #ffffff;
            height: 100vh;
            position: fixed;

            width: 200px;
            box-shadow: 0px 0 10px 10px rgba(255, 145, 1, 0.1);
            z-index: 1000;
            transition: all 0.3s ease;
            left: 0;
            top: 60px; /* Hauteur de la navbar */
        }

        .sidebar.collapsed {

            width: 50px;
        }

        .sidebar-item {
            padding: 10px;
            text-align: left;
            color: #1d1d1d;
            text-decoration: none;
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            transition: background-color 0.3s;
            white-space: nowrap;
            overflow: hidden;
        }

        .sidebar-item:hover, .sidebar-item.active {
            background-color: #fcfcfc;
            color: #0d6efd;
        }

        .sidebar-icon {
            font-size: 24px;
            margin-right: 10px;
            min-width: 24px;
            text-align: center;
        }

        .sidebar-text {
            transition: opacity 0.3s, visibility 0.3s;
        }

        .sidebar.collapsed .sidebar-text {
            opacity: 0;
            visibility: hidden;
            width: 0;
        }

        .main-content {
            margin-left: 200px;
            padding: 20px;
            background-color: #ffffff;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
            margin-top: 60px; /* Hauteur de la navbar */
        }

        .main-content.expanded {
            margin-left: 50px;
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

            .sidebar:not(.collapsed) ~ .main-content {
                margin-left: 200px;
            }

            .navbar {
                height: 50px;
            }
        }
        .shadow-bottom {
         box-shadow: 0 6px 6px -2px rgba(0, 117, 252, 0.1); /* Ombre uniquement vers le bas */
            }
    </style>
</head>
<body>
    <!-- Navbar (maintenant en premier, avant la sidebar) -->
    <nav class="navbar navbar-expand-lg navbar-white shadow-bottom">
        <div class="navbar-container">
            <!-- Logo toujours visible -->
            <div class="logo-container">
                <a class="navbar-brand" href="#">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Allo Voyage" class="logo">
                        <div class="ms-2">
                            <span class="text-primary fw-bold"style="font-size: 18px;">ALLO VOYAGE</span>
                            <span class="text-muted d-block" style="font-size: 12px;">TRAVEL AGENCY</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Contenu de la navbar -->
            <div class="navbar-content">
                <div class="toggle-sidebar" id="toggleSidebar">
                    <i class="bi bi-list"></i>
                </div>

                <div class="d-flex align-items-center">
                    <div class="notification-badge me-2 me-lg-3">
                        <i class="bi bi-chat-left-dots fs-5 text-black"></i>
                        <span class="badge-number">2</span>
                    </div>
                    <div class="d-flex align-items-center me-2 me-lg-3">
                        <div class="notification-badge me-2">
                            <i class="bi bi-person fs-4 text-black"></i>
                        </div>
                        <span class="profile-text">Bonjour <strong>Admin</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="mt-3">
            <a href="{{ route('dashboard') }}" class="sidebar-item">
                <i class="bi bi-house-door sidebar-icon"></i>
                <span class="sidebar-text">Dashboard</span>
            </a>
            <a href="{{ route('clients.index') }}" class="sidebar-item">
                <i class="bi bi-people sidebar-icon"></i>
                <span class="sidebar-text">Liste des clients</span>
            </a>
            <a href="" class="sidebar-item">
                <i class="bi bi-airplane sidebar-icon"></i>
                <span class="sidebar-text">Gestion des voyages</span>
            </a>
            <a href="" class="sidebar-item">
                <i class="bi bi-calendar-check sidebar-icon"></i>
                <span class="sidebar-text">Liste des réservations</span>
            </a>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="main-content" id="mainContent">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script pour la gestion de la sidebar
        document.addEventListener('DOMContentLoaded', function() {
            const toggleSidebar = document.getElementById('toggleSidebar');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');

            // État initial de la sidebar
            let sidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';

            // Appliquer l'état sauvegardé
            if (sidebarCollapsed) {
                sidebar.classList.add('collapsed');
                mainContent.classList.add('expanded');
            }

            // Toggle sidebar quand on clique sur le bouton
            toggleSidebar.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');

                // Sauvegarder l'état pour les prochaines visites
                sidebarCollapsed = sidebar.classList.contains('collapsed');
                localStorage.setItem('sidebarCollapsed', sidebarCollapsed);

                // Changer l'icône du bouton
                const toggleIcon = toggleSidebar.querySelector('i');
                if (sidebarCollapsed) {
                    toggleIcon.classList.remove('bi-list');
                    toggleIcon.classList.add('bi-list-nested');
                } else {
                    toggleIcon.classList.remove('bi-list-nested');
                    toggleIcon.classList.add('bi-list');
                }
            });
        });
    </script>
</body>
</html>
