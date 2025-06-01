<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
     protected $fillable = [
        'titre',
        'content',
        'voyageur_id',
        'estLu'
        // 'titre' manque ici ! ← C'est le problème
    ];
}
