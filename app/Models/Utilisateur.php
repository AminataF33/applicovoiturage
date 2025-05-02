<?php 
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use Notifiable;

    protected $table = 'utilisateur';

    protected $fillable = [
        'nom', 'prenom', 'email', 'telephone', 'mot_de_passe',
    ];

    protected $hidden = [
        'mot_de_passe',
    ];

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    public function passager()
    {
        return $this->hasOne(Passager::class, 'Utilisateur_ID');
    }
}
