<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passager extends Model
{
    protected $fillable = ['utilisateur_id', 'preferences'];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }
}

