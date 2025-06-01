<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use Illuminate\Support\Facades\Session;


class PaiementController extends Controller
{
    public function index($total=null,$nbrplace=null)
    {
        // Valeur par défaut ou dynamiquement depuis une base de données

         $notifications = Notification::where('voyageur_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        $count = $notifications->where('estLu', false)->count();

        return view('pages.paiement', [
            'notifications' => $notifications,
            'count'=> $count,
            'total'=> $total,
            'nbrplace'=> $nbrplace,

        ]);


    }
}
