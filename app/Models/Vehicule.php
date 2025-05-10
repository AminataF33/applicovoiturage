<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    
    // Correction du nom de la table
    protected $table = 'vehicules';
    
    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'marque',
        'modele',
        'immatriculation',
        'couleur',
        'nombre_places',
        'conducteur_id',
    ];
    
    /**
     * Obtenir le conducteur propriétaire de ce véhicule.
     */
    public function conducteur()
    {
        // La clé étrangère pointe vers utilisateur_id dans la table conducteurs
        return $this->belongsTo(Conducteur::class, 'conducteur_id', 'utilisateur_id');
    }
    
    /**
     * Obtenir l'utilisateur propriétaire de ce véhicule.
     */
    public function utilisateur()
    {
        return $this->hasOneThrough(
            Utilisateur::class,
            Conducteur::class,
            'utilisateur_id', 
            'id',            
            'conducteur_id', 
            'utilisateur_id'
        );
    }
}