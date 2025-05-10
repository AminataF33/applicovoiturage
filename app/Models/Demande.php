<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $table = 'demandes'; 

    protected $fillable = ['conducteur_id', 'statut', 'description'];

    public function conducteur()
    {
        return $this->belongsTo(User::class, 'conducteur_id');
    }
}
