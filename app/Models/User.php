<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'telephone',
        'adresse',
        'password',
        'role', // 'conducteur' ou 'passager'
        'photo_profil',
        'date_inscription',
        'note_moyenne',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_inscription' => 'datetime',
    ];
    
    /**
     * Get the vehicle associated with the conductor.
     */
    public function vehicule()
    {
        return $this->hasOne(Vehicule::class);
    }
    
    /**
     * Get the trips created by the conductor.
     */
    public function trajets()
    {
        return $this->hasMany(Trajet::class, 'conducteur_id');
    }
    
    /**
     * Get the reservations made by the user (as a passenger).
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'passager_id');
    }
    
    /**
     * Get the reviews received by the user.
     */
    public function avis()
    {
        return $this->hasMany(Avis::class, 'destination_id');
    }
    
    /**
     * Get the reviews given by the user.
     */
    public function avisLaisses()
    {
        return $this->hasMany(Avis::class, 'auteur_id');
    }
    
    /**
     * Check if user is a conductor
     */
    public function isConducteur()
    {
        return $this->role === 'conducteur';
    }
    
    /**
     * Check if user is a passenger
     */
    public function isPassager()
    {
        return $this->role === 'passager';
    }
    
    /**
     * Get the user's full name
     */
    public function getNomCompletAttribute()
    {
        return "{$this->prenom} {$this->nom}";
    }
}