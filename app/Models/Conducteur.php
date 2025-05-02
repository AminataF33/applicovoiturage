<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conducteur extends Model
{
    protected $fillable = ['utilisateur_id', 'type_voiture', 'immatriculation'];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
