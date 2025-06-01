@extends('layout.user')
@section('content')
<body>
     <style>

        body {
            margin-top: 10rem;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center; /* centre horizontalement */
            align-items: center;
            height: 100%;
            width : 100% ;
            overflow: hidden  /* centre verticalement */

        }

        .container {
            display: flex;
            gap: 40px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(252, 136, 3, 0.534);
            max-width: 900px;
            width: 90%;
        }
        .facture {
            flex: 1;
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 600px;
            background-color: #f9f9f9;
            border-radius: 6px;
        }
        .paiement {
            flex: 1;
            max-width: 600px;
        }
        h1, h2 {
            margin-top: 0;
        }
        h2 {
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .total {
            font-weight: bold;
            font-size: 1.2em;
            margin-top: 20px;
        }
        #paypal-button-container {
            margin-top: 40px;
        }
    </style>
   <div>
   <!-- Alerte Bootstrap (cachée par défaut) -->
    <div id="success-alert" class="alert alert-success alert-dismissible fade success-alert" role="alert" style="display: none;">
        <strong>Succès !</strong> Votre paiement est réussi et votre réservation bien enregistrée.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
       <div class="container">
           <!-- Partie facture (gauche) -->
           <div class="facture">
               <h2 class="text-center">Facture</h2>
               <p><strong>Réservation :</strong></p>
               <table>
                   <tr>
                       <th>Voyage</th>
                       <th>Prix unitaire</th>
                       <th>Quantité</th>
                       <th>Prix unitaire</th>
                   </tr>
                   <tr>
                       <td>Voyage </td>
                       <td>
                        @if (isset($nbrplace))
                           {{ ($total-5) / $nbrplace}}
                        @endif
                       </td>
                       <td>{{$nbrplace}}</td>
                       <td>{{ $total - 5 }}</td>
                   </tr>
                   <tr>
                       <td>Frais de service</td>
                       <td colspan="2"></td>
                       <td>5 DH</td>
                   </tr>
               </table>
               <p class="total">Total à payer :{{ $total }} DH</p>
           </div>

           <!-- Partie paiement (droite) -->
           <div class="paiement">
               <h3 class="text-center ">Effectuer le paiement</h2>
               <!-- Conteneur pour le bouton PayPal -->
               <div id="paypal-button-container"></div>
           </div>
       </div>
   </div>

    <!-- Formulaire pour créer la notification après paiement -->
    <form id="notification-form" method="POST" action="{{ route('notifications.create') }}" style="display: none;">
        @csrf
        <input type="hidden" id="notification-titre" name="titre" value="">
        <input type="hidden" id="notification-content" name="content" value="">
        <input type="hidden" name="voyageur_id" value="{{ auth()->id() }}">
        <input type="hidden" id="payment-details" name="payment_details" value="">
    </form>

    <!-- Script PayPal -->
    <script src="https://www.paypal.com/sdk/js?client-id=Aa-SflJqXqi9ZQDNq9fEkcLgRk3aT2_4Ap_nwIx0seEfxnLMzShSO5cdM0ZPSWoHYMgVw8vsK23acZXB"></script>

    <script>
        const total = {{ $total / 10 }};

        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: total.toString()
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Remplir les champs du formulaire avec les détails du paiement
                    document.getElementById('notification-titre').value = 'Paiement PayPal effectué avec succès';
                    document.getElementById('notification-content').value = `Votre paiement de ${total}€ via PayPal a été traité avec succès. Transaction ID: ${data.orderID}. Payé par: ${details.payer.name.given_name} ${details.payer.name.surname}. Merci pour votre réservation!`;
                    document.getElementById('payment-details').value = JSON.stringify({
                        orderId: data.orderID,
                        payerId: details.payer.payer_id,
                        payerName: details.payer.name.given_name + ' ' + details.payer.name.surname,
                        amount: total,
                        currency: 'EUR'
                    });

                    alert('Transaction completed by ' + details.payer.name.given_name);

                    // Soumettre le formulaire pour créer la notification
                    document.getElementById('notification-form').submit();
                    showSuccessAlert();
                });
            }
        }).render('#paypal-button-container');

         function showSuccessAlert() {
            const alert = document.getElementById('success-alert');
            alert.style.display = 'block';
            alert.classList.add('show');

            // Masquer automatiquement après 3 secondes
            setTimeout(() => {
                alert.classList.remove('show');
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 150); // Attendre la fin de l'animation fade
            }, 5000);
        }
    </script>
</body>
@endsection
