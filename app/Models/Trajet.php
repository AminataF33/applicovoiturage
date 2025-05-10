<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    use HasFactory;
    

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
        'prix',
        'nombre_places',
        'commentaire',
        //'statut', // planifié, en cours, terminé, annulé
    ];
    
    
     
    protected $casts = [
        'date_depart' => 'date',
        'heure_depart' => 'datetime',
 
    ];
    
    
     
    public function conducteur()
    {
        return $this->belongsTo(User::class, 'conducteur_id');
    }
    
    
     
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }
    

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    

    public function avis()
    {
        return $this->hasMany(Avis::class);
    }
    
    public function hasPlacesDisponibles()
    {
        return $this->places_disponibles > 0;
    }
    

    public function getDepartCompletAttribute()
    {
        return "{$this->ville_depart} - {$this->adresse_depart}";
    }
    

    public function getArriveeCompleteAttribute()
    {
        return "{$this->ville_arrivee} - {$this->adresse_arrivee}";
    }
    

    public function getDateHeureFormatAttribute()
    {
        $date = new \DateTime($this->date_depart);
        $heure = new \DateTime($this->heure_depart);
        
        return $date->format('d/m/Y') . ' à ' . $heure->format('H:i');
    }
}