<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trajet_id',
        'passager_id',
        'nombre_places',
        'montant',
        'date_reservation',
        'statut', // confirmé, en attente, annulé
        'commentaire',
        'point_rencontre',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date_reservation' => 'datetime',
    ];
    
    /**
     * Get the trip that owns the reservation.
     */
    public function trajet()
    {
        return $this->belongsTo(Trajet::class);
    }
    
    /**
     * Get the passenger that owns the reservation.
     */
    public function passager()
    {
        return $this->belongsTo(User::class, 'passager_id');
    }
    
    /**
     * Get the review associated with the reservation.
     */
    public function avis()
    {
        return $this->hasOne(Avis::class);
    }
}