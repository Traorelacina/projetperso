<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    // Les attributs pouvant être affectés en masse
    protected $fillable = [
        'farm_name', 'farm_size', 'farm_description', 
        'experience_years', 'certifications', 'production_capacity',
        'farm_latitude', 'farm_longitude',
    ];

    // Définir les types des attributs
    protected $casts = [
        'certifications' => 'array',  // L'attribut 'certifications' sera traité comme un tableau
    ];

    /**
     * Relation morphOne avec le modèle User.
     * Un fermier peut être associé à un utilisateur via le profilable.
     */
    public function user()
    {
        return $this->morphOne(User::class, 'profileable');
    }

    /**
     * Relation hasMany avec le modèle Product.
     * Un fermier peut avoir plusieurs produits.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Relation hasMany avec le modèle Order.
     * Un fermier peut avoir plusieurs commandes.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

   
}
