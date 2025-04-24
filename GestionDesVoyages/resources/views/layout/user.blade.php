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
            background-color: #e6f2f8;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
            margin-top: 60px; /* Hauteur de la navbar */
        }

        .main-content.expanded {
            margin-left: 70px;
        }

        .navbar {
            background-color: white;
            border-bottom: 1px solid #dee2e6;
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

        /* Styles pour les modals de notification et de messagerie */
        .notification-modal {
            position: absolute;
            top: 120px;
            right: 20px;
            width: 320px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            z-index: 1040;
            display: none;
            overflow: hidden;
        }

        .notification-header {
            padding: 12px 16px;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notification-body {
            max-height: 400px;
            overflow-y: auto;
        }

        .notification-item {
            padding: 12px 16px;
            border-bottom: 1px solid #f1f1f1;
            cursor: pointer;
        }

        .notification-item:hover {
            background-color: #f8f9fa;
        }

        .notification-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            overflow: hidden;
        }

        .notification-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .notification-content {
            margin-left: 12px;
        }

        .notification-title {
            font-size: 14px;
            margin-bottom: 2px;
        }

        .notification-info {
            font-size: 12px;
            color: #6c757d;
            display: flex;
            align-items: center;
        }

        .notification-meta {
            font-size: 12px;
            color: #6c757d;
        }

        .notification-footer {
            padding: 12px 16px;
            text-align: center;
            border-top: 1px solid #dee2e6;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            color: #6c757d;
        }

        /* Styles pour le modal de profil */
        .profile-modal {
            position: absolute;
            top: 120px;
            right: 20px;
            width: 200px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            z-index: 1040;
            display: none;
            overflow: hidden;
        }

        .profile-menu-item {
            padding: 12px 16px;
            border-bottom: 1px solid #f1f1f1;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .profile-menu-item:last-child {
            border-bottom: none;
        }

        .profile-menu-item:hover {
            background-color: #f8f9fa;
        }

        .profile-menu-item i {
            margin-right: 10px;
            color: #0d6efd;
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

            .notification-modal,
            .profile-modal {
                width: 300px;
                right: 10px;
                top: 50px;
            }

            .profile-modal {
                width: 180px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar (maintenant en premier, avant la sidebar) -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-container">
            <!-- Logo toujours visible -->
            <div class="logo-container">
                <a class="navbar-brand" href="#">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Allo Voyage" class="logo">
                        <div class="ms-2">
                            <span class="text-primary fw-bold">ALLO VOYAGE</span>
                            <span class="text-muted d-block" style="font-size: 12px;">TRAVEL AGENCY</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Contenu de la navbar -->
            <div class="navbar-content">
                <div class="toggle-sidebar" id="toggleSidebar">
                    <i class="bi bi-house fs-4 text-primary"></i>
                </div>
                <div class="d-flex align-items-center">
                    <div class="notification-badge me-2 me-lg-3 mx-2" id="notificationBell">
                        <i class="bi bi-bell fs-4 text-primary"></i>
                        <span class="badge-number">2</span>
                    </div>

                    <div class="notification-badge me-2 me-lg-3 mx-2" id="messageBell">
                        <i class="bi bi-chat-left-dots fs-4 text-primary"></i>
                        <span class="badge-number">2</span>
                    </div>

                    <div class="d-flex align-items-center me-2 me-lg-3 mx-2" id="profileSection">
                        <div class="notification-badge me-2">
                            <i class="bi bi-person fs-3 text-primary"></i>
                        </div>
                        <span class="profile-text">Bonjour <strong>Admin</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Modal de notification -->
    <div class="notification-modal" id="notificationModal">
        <div class="notification-header">
            <h6 class="mb-0">Notification</h6>
            <button class="close-btn" id="closeNotificationModal">&times;</button>
        </div>
        <div class="notification-body">
            <!-- Notification Item 1 -->
            <div class="notification-item d-flex align-items-start">
                <div class="notification-avatar">
                    <img src="{{ asset('images/avatar1.jpg') }}" alt="Terry Franci" onerror="this.src='https://via.placeholder.com/36'">
                </div>
                <div class="notification-content flex-grow-1">
                    <div class="notification-title">
                        <strong>Terry Franci</strong> requests permission to change <strong>Project - Nganter App</strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-1">
                        <div class="notification-info">
                            <span>Project</span>
                        </div>
                        <div class="notification-meta">
                            <span>5 min ago</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notification Item 2 -->
            <div class="notification-item d-flex align-items-start">
                <div class="notification-avatar">
                    <img src="{{ asset('images/avatar2.jpg') }}" alt="Alena Franci" onerror="this.src='https://via.placeholder.com/36'">
                </div>
                <div class="notification-content flex-grow-1">
                    <div class="notification-title">
                        <strong>Alena Franci</strong> requests permission to change <strong>Project - Nganter App</strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-1">
                        <div class="notification-info">
                            <span>Project</span>
                        </div>
                        <div class="notification-meta">
                            <span>8 min ago</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notification Item 3 -->
            <div class="notification-item d-flex align-items-start">
                <div class="notification-avatar">
                    <img src="{{ asset('images/avatar3.jpg') }}" alt="Jocelyn Kenter" onerror="this.src='https://via.placeholder.com/36'">
                </div>
                <div class="notification-content flex-grow-1">
                    <div class="notification-title">
                        <strong>Jocelyn Kenter</strong> requests permission to change <strong>Project - Nganter App</strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-1">
                        <div class="notification-info">
                            <span>Project</span>
                        </div>
                        <div class="notification-meta">
                            <span>15 min ago</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notification Item 4 -->
            <div class="notification-item d-flex align-items-start">
                <div class="notification-avatar">
                    <img src="{{ asset('images/avatar4.jpg') }}" alt="Brandon Philips" onerror="this.src='https://via.placeholder.com/36'">
                </div>
                <div class="notification-content flex-grow-1">
                    <div class="notification-title">
                        <strong>Brandon Philips</strong> requests permission to change <strong>Project - Nganter App</strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-1">
                        <div class="notification-info">
                            <span>Project</span>
                        </div>
                        <div class="notification-meta">
                            <span>1 hr ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="notification-footer">
            <a href="#" class="text-primary text-decoration-none">View All Notification</a>
        </div>
    </div>

    <!-- Modal de messagerie -->
    <div class="notification-modal" id="messageModal">
        <div class="notification-header">
            <h6 class="mb-0">Messages</h6>
            <button class="close-btn" id="closeMessageModal">&times;</button>
        </div>
        <div class="notification-body">
            <!-- Message Item 1 -->
            <div class="notification-item d-flex align-items-start">
                <div class="notification-avatar">
                    <img src="{{ asset('images/avatar1.jpg') }}" alt="Terry Franci" onerror="this.src='https://via.placeholder.com/36'">
                </div>
                <div class="notification-content flex-grow-1">
                    <div class="notification-title">
                        <strong>Terry Franci</strong>
                    </div>
                    <div class="notification-info">
                        <span>Bonjour, j'ai une question concernant ma réservation...</span>
                    </div>
                    <div class="notification-meta text-end">
                        <span>5 min ago</span>
                    </div>
                </div>
            </div>

            <!-- Message Item 2 -->
            <div class="notification-item d-flex align-items-start">
                <div class="notification-avatar">
                    <img src="{{ asset('images/avatar2.jpg') }}" alt="Alena Franci" onerror="this.src='https://via.placeholder.com/36'">
                </div>
                <div class="notification-content flex-grow-1">
                    <div class="notification-title">
                        <strong>Alena Franci</strong>
                    </div>
                    <div class="notification-info">
                        <span>Est-ce qu'il est possible de modifier la date de mon vol ?</span>
                    </div>
                    <div class="notification-meta text-end">
                        <span>30 min ago</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="notification-footer">
            <a href="#" class="text-primary text-decoration-none">View All Messages</a>
        </div>
    </div>

    <!-- Modal de profil -->
    <div class="profile-modal" id="profileModal">
        <div class="profile-menu-item" onclick="window.location.href='/profile'">
            <i class="bi bi-person-circle"></i>
            <span>Profile</span>
        </div>
        <div class="profile-menu-item" onclick="document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i>
            <span>Log out</span>
        </div>
        <form id="logout-form" action="" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- Contenu principal -->
    <div class="main-content" id="mainContent">
        @yield('content')
    </div>

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
