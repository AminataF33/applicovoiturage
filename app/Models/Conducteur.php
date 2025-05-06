<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conducteur extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'conducteurs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'utilisateur_id',
        //'telephone',
        //'adresse',
        'type_voiture',
        'immatriculation',
    ];

    /**
     * Get the utilisateur that owns the conducteur.
     */
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}