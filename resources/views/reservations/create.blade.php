<!-- resources/views/reservation.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Réservation de Voyage</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1100px;
        }
        .step-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            line-height: 28px;
            text-align: center;
            background-color: #FF6600;
            color: white;
            border-radius: 50%;
            margin-right: 10px;
            font-weight: bold;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .card {
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border: none;
        }
        .orange-section {
            background-color: #FF6600;
            color: white;
            padding: 10px;
            border-radius: 8px 8px 0 0;
        }
        .reservation-summary {
            background-color: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .payment-method {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            cursor: pointer;
        }
        .payment-method.selected {
            border-color: #FF6600;
            background-color: #FFF8F2;
        }
        .travel-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .travel-date {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .travel-route {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .route-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #FF6600;
            margin-right: 10px;
        }
        .non-modifiable {
            background-color: #f8f9fa;
            color: #6c757d;
            font-size: 12px;
            padding: 3px 8px;
            border-radius: 4px;
            display: inline-block;
            margin-top: 5px;
        }
        .price-detail {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        .total-price {
            font-size: 18px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            padding-top: 10px;
            border-top: 1px solid #dee2e6;
        }
        .btn-primary {
            background-color: #FF6600;
            border: none;
            padding: 10px 20px;
        }
        .promo-toggle {
            cursor: pointer;
            color: #FF6600;
        }
        .seat-selection {
            display: flex;
            align-items: center;
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .seat-icon {
            margin-right: 15px;
            color: #28a745;
        }
        .accordion-button:not(.collapsed) {
            background-color: #FFF8F2;
            color: #FF6600;
        }
        .secured-badge {
            background-color: #e8f5e9;
            color: #28a745;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    @if(session('success'))
    <div class="alert alert-success container mt-3">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger container mt-3">
        <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mt-5 mb-5">
    <div class="row">
        <!-- Partie gauche -->
        <div class="col-md-8">
         <form action="{{ route('reservations.store')}}" method="POST">
                @csrf
                <input type="hidden" name="voyage_id" value="{{ $voyage->id }}">
                <!-- Accordéon politique d'annulation -->
                <div class="accordion mb-4" id="politiqueAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fas fa-info-circle text-warning me-2"></i> Annulations et politiques de réservation
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                             data-bs-parent="#politiqueAccordion">
                            <div class="accordion-body">
                                Les annulations sont possibles jusqu'à 24h avant le départ. Passé ce délai, aucun remboursement ne sera effectué.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="step-number">1</div>
                            <h5 class="mb-0">Contact</h5>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required />
                            </div>
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom de famille</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nbrplace" class="form-label">Nombre de places</label>
                            <input type="number" class="form-control" id="nbrplace" name="nbrplace" min="1" value="1" required />
                        </div>

                        <div class="mb-3">
                            <label for="telephone" class="form-label">Numéro WhatsApp</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2c/Flag_of_Morocco.svg" alt="Maroc" width="20" />
                                    +212
                                </span>
                                <input type="text" class="form-control" id="telephone" name="telephone" required />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Réservation de siège -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="step-number">2</div>
                            <h5 class="mb-0">Réservation de siège</h5>
                        </div>

                        <div class="seat-selection">
                            <div class="seat-icon">
                                <i class="fas fa-bus-alt fa-2x"></i>
                            </div>
                            <div>
                                <div class="fw-bold">Trajet Direct - Siège : {{61 - $voyage->places_disponibles }}</div>
                                <div>{{ $voyage->lieu_depart }} — {{ $voyage->destination }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Paiement -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <div class="step-number">3</div>
                                <h5 class="mb-0">Paiement</h5>
                            </div>
                            <div class="secured-badge">
                                <i class="fas fa-lock me-1"></i> Sécurisé
                            </div>
                        </div>
                       <div class="payment-method selected mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="paypalPayment" value="paypal" checked />
                                <label class="form-check-label" for="paypalPayment">
                                    <i class="fab fa-paypal me-2"></i> PayPal
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
        </div>

        <!-- Partie droite : résumé -->
        <div class="col-md-4">
            <div class="reservation-summary mb-4">
                <div class="travel-date">{{ \Carbon\Carbon::parse($voyage->date_depart)->format('d/m/Y') }} </div>

                <div class="mb-3">
                    <span class="badge bg-light text-dark">ALLOVOYAGE</span>
                    <span class="badge bg-light text-dark">مرحبا</span>
                </div>

                <div class="travel-route mb-3">
                    <div class="route-dot"></div>
                    <div>
                        <div>{{ $voyage->lieu_depart }} / Gare Routiere {{ $voyage->lieu_depart }} </div>
                        <div class="text-muted">{{ \Carbon\Carbon::parse($voyage->heure_depart)->format('H:i') }}</div>
                    </div>
                </div>

                <div class="travel-route mb-3">
                    <div class="route-dot"></div>
                    <div>
                        <div>{{ $voyage->destination }} / Gare Routiere {{ $voyage->destination }} </div>
                        <div class="text-muted"> {{ \Carbon\Carbon::parse($voyage->heure_arrivee)->format('H:i') }}</div>
                        <div class="non-modifiable me-2">Non Annulable</div>
                        <div class="non-modifiable">Non Modifiable</div>
                    </div>
                </div>

                <div class="price-detail">
                    <div>1 passager</div>
                    <div>{{ $voyage->prix }} DH</div>
                </div>

                <div class="price-detail">
                    <div>Frais de réservation</div>
                    <div>5 DH</div>
                </div>
                <div class="total-price">
                <div>Total</div>
                <div id="totalPrice">{{ $voyage->prix + 5 }} DH</div>
            </div>
        </div>

        <!-- Conditions à accepter -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="acceptTerms" name="acceptTerms" />
            <label class="form-check-label" for="acceptTerms">
                J'accepte les <a href="#">conditions d'utilisation</a> et la <a href="#">politique de confidentialité</a>.
            </label>
        </div>

        <button type="submit" class="btn btn-primary mt-3 w-100" id="btnSubmit" disabled>
            Confirmer la réservation
        </button>
    </div>
   
</div>
</div>
 </form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
      
     const prixVoyage = {{ $voyage->prix }};
    const fraisReservation = 5;
    const nbrplaceInput = document.getElementById('nbrplace');
    const totalPriceDiv = document.getElementById('totalPrice');

    function calculerTotal() {
        const nbrPlaces = parseInt(nbrplaceInput.value) || 1;
        const total = (prixVoyage * nbrPlaces) + fraisReservation;
        totalPriceDiv.textContent = total + ' DH';
    }

    nbrplaceInput.addEventListener('input', calculerTotal);
    calculerTotal(); // Mise à jour au chargement

    const btnSubmit = document.getElementById('btnSubmit');
    const prenom = document.getElementById('prenom');
    const nom = document.getElementById('nom');
    const telephone = document.getElementById('telephone');
    const acceptTerms = document.getElementById('acceptTerms');
    const paymentRadios = document.querySelectorAll('input[name="payment_method"]');

    function isPaymentSelected() {
        return Array.from(paymentRadios).some(radio => radio.checked);
    }

    function validateForm() {
        const isValid = 
            prenom.value.trim() !== '' &&
            nom.value.trim() !== '' &&
            telephone.value.trim() !== '' &&
            acceptTerms.checked &&
            isPaymentSelected();

        btnSubmit.disabled = !isValid;
    }

    [prenom, nom, telephone, acceptTerms, ...paymentRadios].forEach(element => {
        element.addEventListener('input', validateForm);
        element.addEventListener('change', validateForm);
    });

    validateForm();
</script>
</body>
</html>

