<?php

namespace App\Http\Controllers;

use App\Models\Voyage;
use Illuminate\Http\Request;

class VoyageController extends Controller
{

// renvoie la liste des voyages Ajouter par l'admin

    public function index()
{
    $voyages = Voyage::orderBy('id', 'asc')->paginate(10);
    return view('voyage.voyage', compact('voyages'));
    
}
 //renvoie le formulaire d'jout d'un  nouveau voyage 

public function create()
{
    return view('voyages.create');
}
// store() pour le stockage d'un voyage
public function store(Request $request)
{
    $validated = $request->validate([
        'destination' => 'required|string|max:255',
        'date_depart' => 'required|date|after_or_equal:today',
        'date_retour' => 'required|date|after:date_depart',
        'prix' => 'required|numeric|min:0',
        'places_disponibles' => 'required|integer|min:1',
        'description' => 'nullable|string',
    'lieu_depart' => 'nullable|string',
        'heure_depart' => 'nullable|date_format:H:i',
        'heure_arrivee' => 'nullable|date_format:H:i',
        'nbr_arret' => 'nullable|integer|min:0',
    ]);

    Voyage::create($validated);

    return redirect()->route('voyages.index')
                 ->with('success', 'Voyage créé avec succès');
}
//edit() pour modifier un voyage existant
public function edit(Voyage $voyage)
{
    return view('voyages.edit', compact('voyage'));
}
//pour mettre a jour un voyage deja existant modifie
public function update(Request $request, Voyage $voyage)
{
    $validated = $request->validate([
        'destination' => 'required|string|max:255',
        'date_depart' => 'required|date',
        'date_retour' => 'required|date|after:date_depart',
        'prix' => 'required|numeric|min:0',
        'places_disponibles' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'lieu_depart' => 'nullable|string',
    'heure_depart' => 'nullable|date_format:H:i',
    'heure_arrivee' => 'nullable|date_format:H:i',
    'nbr_arret' => 'nullable|integer|min:0',
    ]);

    $voyage->update($validated);

    return redirect()->route('voyages.index')
                 ->with('success', 'Voyage mis à jour avec succès');
}
// pour supprimer un voyage
public function destroy(Voyage $voyage)
{
    $voyage->delete();
    return redirect()->route('voyages.index')
                 ->with('success', 'Voyage supprimé avec succès');
}
}