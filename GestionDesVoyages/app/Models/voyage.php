<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// les attribut de la classe voyage qui determine un voyage 
class Voyage extends Model
{
    protected $fillable = [
        'destination',
        'date_depart',
        'date_retour',
        'prix',
        'places_disponibles',
        'description',
        'lieu_depart',
        'heure_depart',
        'heure_arrivee',
        'nbr_arret',
    ];
    protected $casts = [
        'date_depart' => 'datetime',
        'date_retour' => 'datetime',
    ];
}