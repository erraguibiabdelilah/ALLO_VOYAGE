<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;


class FactureController extends Controller
{
  
    public function create()
    {
        return view('factures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'montantTotal' => 'required|numeric',
            'methode_paiement' => 'required|string|max:255',
            'reservation_id' => 'required|exists:reservations,id', // clé étrangère
        ]);

        Facture::create([
            'date' => $request->date,
            'montantTotal' => $request->montantTotal,
            'methode_paiement' => $request->methode_paiement,
            'reservation_id' => $request->reservation_id,
        ]);

        return redirect()->back()->with('success', 'Facture créée avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'date' => 'required|date',
        'montantTotal' => 'required|numeric',
        'methode_paiement' => 'required|string|max:255',
        'reservation_id' => 'required|exists:reservations,id',
    ]);

    $facture = Facture::findOrFail($id);

    $facture->update([
        'date' => $request->date,
        'montantTotal' => $request->montantTotal,
        'methode_paiement' => $request->methode_paiement,
        'reservation_id' => $request->reservation_id,
    ]);

    return redirect()->back()->with('success', 'Facture mise à jour avec succès.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $facture = Facture::findOrFail($id);
        $facture->delete();

        return redirect()->route('factures.index')->with('success', 'Facture supprimée avec succès.');
    }

    public function getAll(){
        $factures = Facture::all();
        return view("facture.facture", compact('factures'));
    }

}
