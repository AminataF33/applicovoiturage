<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'auteur_id',
        'destination_id',
        'trajet_id',
        'reservation_id',
        'note',
        'commentaire',
        'date_avis',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date_avis' => 'datetime',
    ];
    
    /**
     * Get the user who wrote the review.
     */
    public function auteur()
    {
        return $this->belongsTo(User::class, 'auteur_id');
    }
    
    /**
     * Get the user who received the review.
     */
    public function destination()
    {
        return $this->belongsTo(User::class, 'destination_id');
    }
    
    /**
     * Get the trip associated with the review.
     */
    public function trajet()
    {
        return $this->belongsTo(Trajet::class);
    }
    
    /**
     * Get the reservation associated with the review.
     */
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}