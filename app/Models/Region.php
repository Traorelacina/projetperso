<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    // Si vous avez un tableau de régions, vous pouvez l'implémenter ici
    protected $fillable = [
        'name', // Nom de la région
        'slug', // Un slug pour chaque région, par exemple "abidjan", "yamoussoukro"
    ];

    // Liste des régions de la Côte d'Ivoire
    public static function getAllRegions()
    {
        return [
            'Abidjan',
            'Basilikiri',
            'Bouaké',
            'Daloa',
            'Divo',
            'Korhogo',
            'San Pedro',
            'Yamoussoukro',
            'Man',
            'Odienné',
            'Séguéla',
            'Touba',
            'Ferkessédougou',
            'Aboisso',
            'Bondoukou',
            'Tanda',
            'Gagnoa',
            'Agboville',
            'Bongouanou',
            'San Pedro',
            // Ajoutez d'autres régions ici si nécessaire
        ];
    }

    // Relation avec les utilisateurs ou autres entités
    public function users()
    {
        return $this->hasMany(User::class);
    }

}
