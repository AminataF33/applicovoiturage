<?php 
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Utilisateur extends Authenticatable
{
    use Notifiable;

    protected $table = 'utilisateur';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'password',
        'role',
    ];
    
    protected $hidden = [
        'password',
    ];

    public function setMotDePasseAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    public function passager()
    {
        return $this->hasOne(Passager::class, 'Utilisateur_ID');
    }
    use HasFactory;
    public function conducteur()
    {
        return $this->hasOne(Conducteur::class, 'Utilisateur_ID');
    }
    public function vehicules()
    {
        return $this->hasMany(Vehicule::class, 'utilisateur_id');
    }

}
