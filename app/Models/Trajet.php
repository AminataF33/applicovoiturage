<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    use HasFactory;

    protected $table = 'trajets'; // Nom EXACT de ta table

    protected $fillable = [
        'lieu_depart',
        'lieu_destination',
        'date_depart',
        'date_arrivee',
        'statut',
        'prix',
        'places_disponibles',
        'Conducteur_ID',
    ];

    public $timestamps = false; // Parce que ta table Trajet n'a pas de colonnes created_at / updated_at
}
