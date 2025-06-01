<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voyage;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
class SearchController extends Controller
{
    public function findByDepartAndDestinationAndDepartDate(Request $request)
    {

         $searchData = $request->all(); //recupere data
        if (!auth()->check()) {
        // On stocke les données de recherche dans la session
        session([
            'rechercheData' => [
                'villeDepart' => $request->villeDepart,
                'villeArrive' => $request->villeArrive,
                'datedepart' => $request->datedepart,
            ]
        ]);
        // Redirection vers login
        return redirect()->route('login');
    }
        $voyages = Voyage::where('lieu_depart', $request->villeDepart)
                        ->where('destination', $request->villeArrive)
                        ->where('date_depart', $request->datedepart)
                        ->get();
         $message = $voyages->isEmpty() ? 'No voyages found' : null;

        // Choix de la vue selon si la recherche venait de la session ou non
        $view = session()->has('rechercheData') ? 'pages.resultUserSearch' : 'pages.resultSearch';
        $notifications = Notification::where('voyageur_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        $unreadCount = $notifications->where('estLu', false)->count();

        return view($view, [
            'voyages' => $voyages,
            'message' => $message,
            'notifications' => $notifications,
            'count' => $unreadCount,
        ]);
    }
}
