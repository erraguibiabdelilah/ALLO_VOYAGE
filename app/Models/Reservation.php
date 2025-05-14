<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'date',         // Date de réservation
        'statut',       // confirmée/annulée
        'nbrplace',     // Nombre de places
        'voyage_id',    // Clé étrangère vers Voyage
        'voyageur_id'   // Clé étrangère vers Voyageur
    ];

    public function voyage()
{
    return $this->belongsTo(Voyage::class);
}
    public function voyageur()
    {
        return $this->belongsTo(Voyageur::class);
    }

    public function facture()
    {
        return $this->hasOne(Facture::class);
    }
}