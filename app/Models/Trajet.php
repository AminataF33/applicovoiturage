<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'conducteur_id',
        'vehicule_id',
        'ville_depart',
        'ville_arrivee',
        'adresse_depart',
        'adresse_arrivee',
        'date_depart',
        'heure_depart',
        'duree_estimee',
        'distance_km',
        'prix',
        'nombre_places',
        'places_disponibles',
        'commentaire',
        'options', // JSON: climatisation, animaux autorisés, etc.
        'statut', // planifié, en cours, terminé, annulé
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date_depart' => 'date',
        'heure_depart' => 'datetime',
        'options' => 'array',
    ];
    
    /**
     * Get the conductor that owns the trip.
     */
    public function conducteur()
    {
        return $this->belongsTo(User::class, 'conducteur_id');
    }
    
    /**
     * Get the vehicle associated with the trip.
     */
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }
    
    /**
     * Get the reservations for the trip.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
    /**
     * Get the reviews for the trip.
     */
    public function avis()
    {
        return $this->hasMany(Avis::class);
    }
    
    /**
     * Check if trip has available seats
     */
    public function hasPlacesDisponibles()
    {
        return $this->places_disponibles > 0;
    }
    
    /**
     * Get full departure information
     */
    public function getDepartCompletAttribute()
    {
        return "{$this->ville_depart} - {$this->adresse_depart}";
    }
    
    /**
     * Get full arrival information
     */
    public function getArriveeCompleteAttribute()
    {
        return "{$this->ville_arrivee} - {$this->adresse_arrivee}";
    }
    
    /**
     * Format date and time of departure
     */
    public function getDateHeureFormatAttribute()
    {
        $date = new \DateTime($this->date_depart);
        $heure = new \DateTime($this->heure_depart);
        
        return $date->format('d/m/Y') . ' à ' . $heure->format('H:i');
    }
}