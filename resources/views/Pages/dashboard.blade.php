@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
            <div class="card h-100" style="background: linear-gradient(135deg, #28a745, #20c997); color: white; border: none; border-radius: 10px;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-0 fw-bold">156</h2>
                        <p class="mb-1">NOUVELLES RÉSERVATIONS</p>
                        <small><i class="bi bi-arrow-up"></i> 18% plus élevé</small>
                    </div>
                    <div>
                        <i class="bi bi-calendar-check" style="font-size: 3rem; opacity: 0.8;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
            <div class="card h-100" style="background: linear-gradient(135deg, #17a2b8, #007bff); color: white; border: none; border-radius: 10px;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-0 fw-bold">2,340</h2>
                        <p class="mb-1">VOYAGES ORGANISÉS</p>
                        <small><i class="bi bi-arrow-up"></i> 22% plus élevé</small>
                    </div>
                    <div>
                        <i class="bi bi-airplane" style="font-size: 3rem; opacity: 0.8;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
            <div class="card h-100" style="background: linear-gradient(135deg, #fd7e14, #ffc107); color: white; border: none; border-radius: 10px;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-0 fw-bold">€89,750</h2>
                        <p class="mb-1">CHIFFRE D'AFFAIRES</p>
                        <small><i class="bi bi-arrow-up"></i> 15% plus élevé</small>
                    </div>
                    <div>
                        <i class="bi bi-currency-euro" style="font-size: 3rem; opacity: 0.8;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
            <div class="card h-100" style="background: linear-gradient(135deg, #dc3545, #e83e8c); color: white; border: none; border-radius: 10px;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-0 fw-bold">89</h2>
                        <p class="mb-1">NOUVEAUX CLIENTS</p>
                        <small><i class="bi bi-arrow-down"></i> 8% plus bas</small>
                    </div>
                    <div>
                        <i class="bi bi-people" style="font-size: 3rem; opacity: 0.8;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row mb-4">
        <!-- Main Chart -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm" style="border-radius: 10px; border: none;">
                <div class="card-header bg-white d-flex justify-content-between align-items-center" style="border-bottom: 1px solid #f1f3f4;">
                    <div>
                        <h5 class="mb-0">Statistiques</h5>
                        <small class="text-muted">Analyse des réservations de votre agence</small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <h6 class="text-muted mb-0 me-2">REVENUS HEBDOMADAIRES</h6>
                            </div>
                            <h4 class="mb-0">€12,850 <small class="text-success"><i class="bi bi-arrow-up"></i> +18%</small></h4>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <h6 class="text-muted mb-0 me-2">RÉSERVATIONS HEBDO</h6>
                            </div>
                            <h4 class="mb-0">187 <small class="text-warning"><i class="bi bi-arrow-up"></i> +8%</small></h4>
                        </div>
                    </div>
                    <div style="height: 300px; background: #f8f9fa; border-radius: 8px; position: relative;">
                        <canvas id="salesChart" style="width: 100%; height: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Sidebar -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm h-100" style="border-radius: 10px; border: none;">
                <div class="card-header bg-white d-flex justify-content-between align-items-center" style="border-bottom: 1px solid #f1f3f4;">
                    <h5 class="mb-0">Statistiques</h5>
                </div>
                <div class="card-body">
                    <!-- Donut Chart -->
                    <div class="text-center mb-4">
                        <canvas id="donutChart" style="width: 200px; height: 200px; margin: 0 auto;"></canvas>
                    </div>

                    <!-- Device Stats -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle me-2" style="width: 12px; height: 12px; background-color: #28a745;"></div>
                                <span>Desktop 45%</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle me-2" style="width: 12px; height: 12px; background-color: #17a2b8;"></div>
                                <span>Tablette 32%</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle me-2" style="width: 12px; height: 12px; background-color: #ffc107;"></div>
                                <span>Mobile 23%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Browser Stats -->
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>Chrome</span>
                            <span class="text-success">↗ 28%</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>Firefox</span>
                            <span class="text-success">↗ 15%</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span>Safari</span>
                            <span class="text-danger">↘ 3%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Section -->
    <div class="row">
        <!-- Visitor Map -->
        <div class="col-lg-5 mb-4">
            <div class="card shadow-sm" style="border-radius: 10px; border: none;">
                <div class="card-header bg-white d-flex justify-content-between align-items-center" style="border-bottom: 1px solid #f1f3f4;">
                    <h5 class="mb-0">Statistiques des Visiteurs</h5>
                    <div>
                        <button class="btn btn-sm btn-outline-secondary me-1">+</button>
                        <button class="btn btn-sm btn-outline-secondary">-</button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- World Map Placeholder -->
                    <div style="height: 200px; background: #f8f9fa; border-radius: 8px; position: relative; margin-bottom: 20px;">
                        <div class="d-flex align-items-center justify-content-center h-100">
                        <img src="{{ asset('images/map_maroc.jpg') }}" alt="Carte du Maroc" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <!-- Simulated map points -->
                        <div style="position: absolute; top: 30%; left: 20%; width: 8px; height: 8px; background: #007bff; border-radius: 50%;"></div>
                        <div style="position: absolute; top: 45%; left: 55%; width: 8px; height: 8px; background: #007bff; border-radius: 50%;"></div>
                        <div style="position: absolute; top: 60%; left: 75%; width: 8px; height: 8px; background: #007bff; border-radius: 50%;"></div>
                        <div style="position: absolute; top: 25%; left: 45%; width: 8px; height: 8px; background: #007bff; border-radius: 50%;"></div>
                    </div>

                    <!-- Country Stats -->
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr style="border: none;">
                                    <th style="border: none; color: #6c757d; font-weight: 600;"></th>
                                    <th style="border: none; color: #6c757d; font-weight: 600;">Réservations</th>
                                    <th style="border: none; color: #6c757d; font-weight: 600;">Données</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="border: none;">Casablanca</td>
                                    <td style="border: none;">300</td>
                                    <td style="border: none;">
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-success" style="width: 80%"></div>
                                        </div>
                                        <small>80%</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none;"> Marrakech</td>
                                    <td style="border: none;">200</td>
                                    <td style="border: none;">
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-warning" style="width: 67%"></div>
                                        </div>
                                        <small>67%</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none;">Agadir</td>
                                    <td style="border: none;">156</td>
                                    <td style="border: none;">
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-danger" style="width: 58%"></div>
                                        </div>
                                        <small>58%</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none;">Tanger</td>
                                    <td style="border: none;">100</td>
                                    <td style="border: none;">
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-info" style="width: 48%"></div>
                                        </div>
                                        <small>48%</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: none;">Rabat</td>
                                    <td style="border: none;">98</td>
                                    <td style="border: none;">
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-info" style="width: 32%"></div>
                                        </div>
                                        <small>32%</small>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks and Messages -->
        <div class="col-lg-3 mb-4">
            <div class="card shadow-sm mb-4" style="border-radius: 10px; border: none;">
                <div class="card-header bg-white d-flex justify-content-between align-items-center" style="border-bottom: 1px solid #f1f3f4;">
                    <h5 class="mb-0">Tâches</h5>
                    <button class="btn btn-sm btn-primary">Nouvelle Tâche</button>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 py-3">
                            <div class="d-flex align-items-start">
                                <div class="rounded-circle bg-light me-3 mt-1" style="width: 8px; height: 8px;"></div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Réunion avec Ahmed</h6>
                                    <small class="text-muted">15 Juin 2025</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 py-3">
                            <div class="d-flex align-items-start">
                                <div class="rounded-circle bg-success me-3 mt-1" style="width: 8px; height: 8px;"></div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1"><del>Vérifier les réservations</del></h6>
                                    <small class="text-muted">28 Mai 2025</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 py-3">
                            <div class="d-flex align-items-start">
                                <div class="rounded-circle bg-danger me-3 mt-1" style="width: 8px; height: 8px;"></div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Rapport financier</h6>
                                    <small class="text-muted">Pas de date limite</small>
                                    <span class="badge bg-danger ms-2">2 hrs</span>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 py-3">
                            <div class="d-flex align-items-start">
                                <div class="rounded-circle bg-success me-3 mt-1" style="width: 8px; height: 8px;"></div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1"><del>Envoyer message à Fatima</del></h6>
                                    <small class="text-muted">10 Avril 2025</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 py-3">
                            <div class="d-flex align-items-start">
                                <div class="rounded-circle bg-light me-3 mt-1" style="width: 8px; height: 8px;"></div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Nouvelle brochure</h6>
                                    <small class="text-muted">12 Dec 2025</small>
                                    <span class="badge bg-success ms-2">3 Jours</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Messages -->
            <div class="card shadow-sm" style="border-radius: 10px; border: none;">
                <div class="card-header bg-white" style="border-bottom: 1px solid #f1f3f4;">
                    <h5 class="mb-0">Messages</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 py-3">
                            <div class="d-flex align-items-start">
                                <img src="https://ui-avatars.com/api/?name=Aicha+Benali&background=007bff&color=fff&size=40" class="rounded-circle me-3" width="40" height="40">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1">Aicha Benali</h6>
                                        <small class="text-muted">14:30</small>
                                    </div>
                                    <p class="mb-0 text-muted small">Merci pour l'organisation parfaite de notre voyage à Marrakech...</p>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 py-3">
                            <div class="d-flex align-items-start">
                                <img src="https://ui-avatars.com/api/?name=Omar+Alami&background=28a745&color=fff&size=40" class="rounded-circle me-3" width="40" height="40">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1">Omar Alami</h6>
                                        <small class="text-muted">Il y a 2h</small>
                                    </div>
                                    <p class="mb-0 text-muted small">Pouvez-vous me donner plus d'informations sur le circuit Sahara...</p>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 py-3">
                            <div class="d-flex align-items-start">
                                <img src="https://ui-avatars.com/api/?name=Sophia+Martin&background=dc3545&color=fff&size=40" class="rounded-circle me-3" width="40" height="40">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1">Hassan Tazi</h6>
                                        <small class="text-muted">Il y a 4h</small>
                                    </div>
                                    <p class="mb-0 text-muted small">J'aimerais modifier ma réservation pour Fès, c'est possible...</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Latest Orders and Best Sellers -->
        <div class="col-lg-4">
            <!-- Latest Bookings -->
            <div class="card shadow-sm mb-4" style="border-radius: 10px; border: none;">
                <div class="card-header bg-white d-flex justify-content-between align-items-center" style="border-bottom: 1px solid #f1f3f4;">
                    <h5 class="mb-0">Dernières Réservations</h5>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Actions
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Voir tout</a></li>
                            <li><a class="dropdown-item" href="#">Exporter</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead style="background-color: #f8f9fa;">
                                <tr>
                                    <th style="border: none; color: #6c757d; font-weight: 600; padding: 12px;">Réf</th>
                                    <th style="border: none; color: #6c757d; font-weight: 600; padding: 12px;">Client</th>
                                    <th style="border: none; color: #6c757d; font-weight: 600; padding: 12px;">Montant</th>
                                    <th style="border: none; color: #6c757d; font-weight: 600; padding: 12px;">Statut</th>
                                    <th style="border: none; color: #6c757d; font-weight: 600; padding: 12px;">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="border: none; padding: 12px;"><a href="#" class="text-primary">VY2584</a></td>
                                    <td style="border: none; padding: 12px;">@aicha</td>
                                    <td style="border: none; padding: 12px;">€1,240.00</td>
                                    <td style="border: none; padding: 12px;"><span class="badge bg-success">Confirmé</span></td>
                                    <td style="border: none; padding: 12px;">15/06/2025</td>
                                </tr>
                                <tr>
                                    <td style="border: none; padding: 12px;"><a href="#" class="text-primary">VY2575</a></td>
                                    <td style="border: none; padding: 12px;">@omar</td>
                                    <td style="border: none; padding: 12px;">€890.00</td>
                                    <td style="border: none; padding: 12px;"><span class="badge bg-success">Confirmé</span></td>
                                    <td style="border: none; padding: 12px;">14/06/2025</td>
                                </tr>
                                <tr>
                                    <td style="border: none; padding: 12px;"><a href="#" class="text-primary">VY1204</a></td>
                                    <td style="border: none; padding: 12px;">@sophia</td>
                                    <td style="border: none; padding: 12px;">€1,560.00</td>
                                    <td style="border: none; padding: 12px;"><span class="badge bg-secondary">En attente</span></td>
                                    <td style="border: none; padding: 12px;">13/06/2025</td>
                                </tr>
                                <tr>
                                    <td style="border: none; padding: 12px;"><a href="#" class="text-primary">VY7578</a></td>
                                    <td style="border: none; padding: 12px;">@hassan</td>
                                    <td style="border: none; padding: 12px;">€675.00</td>
                                    <td style="border: none; padding: 12px;"><span class="badge bg-warning">Expiré</span></td>
                                    <td style="border: none; padding: 12px;">12/06/2025</td>
                                </tr>
                                <tr>
                                    <td style="border: none; padding: 12px;"><a href="#" class="text-primary">VY0158</a></td>
                                    <td style="border: none; padding: 12px;">@fatima</td>
                                    <td style="border: none; padding: 12px;">€2,100.00</td>
                                    <td style="border: none; padding: 12px;"><span class="badge bg-secondary">En attente</span></td>
                                    <td style="border: none; padding: 12px;">11/06/2025</td>
                                </tr>
                                <tr>
                                    <td style="border: none; padding: 12px;"><a href="#" class="text-primary">VY0127</a></td>
                                    <td style="border: none; padding: 12px;">@youssef</td>
                                    <td style="border: none; padding: 12px;">€450.00</td>
                                    <td style="border: none; padding: 12px;"><span class="badge bg-success">Confirmé</span></td>
                                    <td style="border: none; padding: 12px;">10/06/2025</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Best Destinations -->
            <div class="card shadow-sm" style="border-radius: 10px; border: none;">
                <div class="card-header bg-white" style="border-bottom: 1px solid #f1f3f4;">
                    <h5 class="mb-0">Destinations Populaires</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3 p-2" style="background-color: #f8f9fa; border-radius: 8px;">
                        <div class="bg-primary rounded p-2 me-3">
                            <i class="bi bi-geo-alt text-white"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Marrakech</h6>
                            <small class="text-muted">Circuit impérial 7 jours</small>
                        </div>
                        <div>
                            <strong>340</strong>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3 p-2" style="background-color: #f8f9fa; border-radius: 8px;">
                        <div class="bg-success rounded p-2 me-3">
                            <i class="bi bi-geo-alt text-white"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Casablanca</h6>
                            <small class="text-muted">Week-end découverte</small>
                        </div>
                        <div>
                            <strong>285</strong>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3 p-2" style="background-color: #f8f9fa; border-radius: 8px;">
                        <div class="bg-warning rounded p-2 me-3">
                            <i class="bi bi-geo-alt text-white"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Fès</h6>
                            <small class="text-muted">Patrimoine et culture</small>
                        </div>
                        <div>
                            <strong>198</strong>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3 p-2" style="background-color: #f8f9fa; border-radius: 8px;">
                        <div class="bg-info rounded p-2 me-3">
                            <i class="bi bi-geo-alt text-white"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Sahara</h6>
                            <small class="text-muted">Aventure désert 4 jours</small>
                        </div>
                        <div>
                            <strong>156</strong>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <a href="#" class="text-primary text-decoration-none">Voir Toutes les Destinations</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script>
    // Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            datasets: [{
                label: 'Réservations',
                data: [25, 35, 28, 45, 65, 55, 70],
                borderColor: '#007bff',
                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                fill: true,
                tension: 0.4
            }, {
                label: 'Revenus (x100€)',
                data: [40, 50, 45, 60, 75, 68, 85],
                borderColor: '#6c757d',
                backgroundColor: 'rgba(108, 117, 125, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.1)'
                    }
                },
                x: {
                    grid: {
                        color: 'rgba(0,0,0,0.1)'
                    }
                }
            }
        }
    });

    // Donut Chart
    const donutCtx = document.getElementById('donutChart').getContext('2d');
    const donutChart = new Chart(donutCtx, {
        type: 'doughnut',
        data: {
            labels: ['Desktop', 'Tablette', 'Mobile'],
            datasets: [{
                data: [45, 32, 23],
                backgroundColor: ['#28a745', '#17a2b8', '#ffc107'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            cutout: '70%'
        }
    });
</script>

<style>
    .card {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
    }

    .progress {
        border-radius: 10px;
    }

    .badge {
        font-size: 0.75em;
    }

    .table td, .table th {
        vertical-align: middle;
    }

    .list-group-item {
        transition: background-color 0.2s;
    }

    .list-group-item:hover {
        background-color: #f8f9fa;
    }
</style>
@endsection
