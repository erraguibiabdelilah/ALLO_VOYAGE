<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voyage;

class SearchController extends Controller
{
    public function findByDepartAndDestinationAndDepartDate(Request $request)
    {
        $voyages = Voyage::where('lieu_depart', $request->villeDepart)
                        ->where('destination', $request->villeArrive)
                        ->where('date_depart', $request->datedepart)
                        
                        ->get();


        if ($voyages->isEmpty()) {

            return view('pages.resultSearch', [
                'voyages' => [],
                'message' => 'No voyages found'
            ]);
        }


        return view('pages.resultSearch', [
            'voyages' => $voyages,
            'message' => null
        ]);
    }
}
