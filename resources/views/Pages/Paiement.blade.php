@extends('layout.user')
@section('content')
<body>
     <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            margin-top: 3rem;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center; /* centre horizontalement */
            align-items: center;     /* centre verticalement */
                    

        }
        .container {
            display: flex;
            gap: 40px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            max-width: 900px;
            width: 90%;
        }
        .facture {
            flex: 1;
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 400px;
            background-color: #f9f9f9;
            border-radius: 6px;
        }
        .paiement {
            flex: 1;
            max-width: 400px;
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
       <h1 style="text-align:center; margin-bottom: 20px;">Paiement via PayPal</h1>
       <div class="container">
           <!-- Partie facture (gauche) -->
           <div class="facture">
               <h2>Facture</h2>
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
                       <td>20 €</td>
                       <td>2</td>
                       <td>40 €</td>
                   </tr>
                   <tr>
                       <td>Frais de service</td>
                       <td colspan="2"></td>
                       <td>5 €</td>
                   </tr>
               </table>
               <p class="total">Total à payer : {{ $total }} €</p>
           </div>

           <!-- Partie paiement (droite) -->
           <div class="paiement">
               <h2>Effectuer le paiement</h2>
               <!-- Conteneur pour le bouton PayPal -->
               <div id="paypal-button-container"></div>
           </div>
       </div>
   </div>

    <!-- Script PayPal -->
    <script src="https://www.paypal.com/sdk/js?client-id=Aa-SflJqXqi9ZQDNq9fEkcLgRk3aT2_4Ap_nwIx0seEfxnLMzShSO5cdM0ZPSWoHYMgVw8vsK23acZXB"></script>

    <script>
        const total = {{ $total }};

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
                    alert('Transaction completed by ' + details.payer.name.given_name);
                    // Ici tu peux rediriger ou afficher un message de confirmation
                    alert('hhhhhhhhhhhhhhhh');
                });
            }
        }).render('#paypal-button-container');
    </script>
</body>
@endsection
