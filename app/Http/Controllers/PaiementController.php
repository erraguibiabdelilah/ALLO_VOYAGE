<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function index()
    {
        // Valeur par défaut ou dynamiquement depuis une base de données
        $total = 600;

        return view('pages.paiement', compact('total'));
    }
}