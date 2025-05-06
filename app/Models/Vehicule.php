<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'modele',
        'immatriculation',
        'annee',
        'couleur',
        'nombre_places',
        'type_carburant',
        'photo',
        'etat', // actif ou inactif
    ];
    
    /**
     * Get the user that owns the vehicle.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Get the trips associated with this vehicle.
     */
    public function trajets()
    {
        return $this->hasMany(Trajet::class);
    }
}