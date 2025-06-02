<?php
namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Voyage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Facture;
use Illuminate\Support\Facades\Session;
use App\Models\Notification;

class ReservationController extends Controller
{
    /**
     * Affiche la liste des réservations de l'utilisateur.
     */
    public function index()
    {
        // Récupère les réservations avec pagination (10 par page)
        $reservations = Reservation::paginate(10);


        // Passe la variable $reservations à la vue
        return view('reservations.index', compact('reservations'));
    }

    public function AllMyReservations()
    {
        $reservations = Reservation::where('voyageur_id', Auth::id())
                        ->with('voyage') // Pour charger les relations
                        ->orderBy('created_at', 'desc')
                        ->get();

        $notifications = Notification::where('voyageur_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        $unreadCount = $notifications->where('estLu', false)->count();

        return view('reservations.myreservations', [
            'reservations' => $reservations,
            'notifications' => $notifications,
            'count' => $unreadCount,
        ]);
    }

    /**
     * Affiche le formulaire de réservation.
     */
    public function create($id)
    {

        $voyage=Voyage::where('id',$id)->first();
         $notifications = Notification::where('voyageur_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        $count = $notifications->where('estLu', false)->count();
        return view('reservations.create', [
            'voyage' => $voyage,
            'placesDisponibles' => $voyage->places_disponibles ? range(1, $voyage->places_disponibles) :1,
            'notifications' => $notifications,
            'count'=> $count,
        ]);
    }

    /**
     * Enregistre une nouvelle réservation.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'telephone' => 'required|string',
            'nbrplace' => 'required|integer',
            'payment_method' => 'required|in:paypal,especes',
            'voyage_id' => 'required|exists:voyages,id',
            'voyageur_id' => 'required|exists:users,id',
        ]);

        // Créer une nouvelle réservation
        $reservation = new Reservation();
        $reservation->prenom = $request->prenom;
        $reservation->nom = $request->nom;
        $reservation->telephone = $request->telephone;
        $reservation->nbrplace = $request->nbrplace;
        $reservation->payment_method = $request->payment_method;
        $reservation->voyage_id = $request->voyage_id;
        $reservation->voyageur_id = $request->voyageur_id;
        $reservation->statut = 'confirmée';
        $reservation->date = now();
        $reservation->save();

        // Réduire le nombre de places disponibles
        $voyage = Voyage::find($request->voyage_id);
        $voyage->places_disponibles -= $request->nbrplace;
        $voyage->save();
        $total= (($request->nbrplace)*($voyage->prix))+5;

        return redirect()->route('paiement', ['total' => $total , 'nbrplace' => $request->nbrplace,])
                         ->with('success', 'Réservation réussie !');
    }

    /**
     * Affiche les détails d'une réservation.
     */
    public function show(Reservation $reservation)
    {
        if ($reservation->voyageur_id !== Auth::id()) {
            abort(403);
        }

        return view('reservations.show', compact('reservation'));
    }

    /**
     * Annule une réservation.
     */
    public function destroy(Reservation $reservation)
    {
        if ($reservation->voyageur_id !== Auth::id()) {
            abort(403);
        }

        if ($reservation->statut === 'confirmée') {
            // Libérer les places
            $reservation->voyage->increment('places_disponibles', $reservation->nbrplace);

            // Marquer la réservation comme annulée
            $reservation->update(['statut' => 'annulée']);

            return redirect()->route('reservations.index')
                             ->with('success', 'Réservation annulée avec succès !');
        }
        return back()->with('error', 'Impossible d\'annuler cette réservation.');
    }

    public function supprimer($id)
    {
        $reservation = Reservation::findOrFail($id);
        
        // Vérifier si la réservation appartient à l'utilisateur connecté
        if ($reservation->voyageur_id !== Auth::id()) {
            return back()->with('error', 'Vous n\'êtes pas autorisé à annuler cette réservation.');
        }

        if ($reservation->statut === 'confirmée') {
            // Libérer les places
            $voyage = Voyage::find($reservation->voyage_id);
            $voyage->places_disponibles += $reservation->nbrplace;
            $voyage->save();

            // Marquer la réservation comme annulée
            $reservation->statut = 'annulée';
            $reservation->save();

            return redirect()->route('myreservations')
                            ->with('success', 'Réservation annulée avec succès !');
        }

        return back()->with('error', 'Impossible d\'annuler cette réservation.');
    }

}
