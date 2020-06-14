<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $attributes = [
        'regionEtudiant' => ''
    ];

    public $fillable = ['nomEtudiant', 'presentationEtudiant', 'cvEtudiant', 'regionEtudiant', 'villeEtudiant', 'telEtudiant', 'siteEtudiant', 'emailEtudiant'];

    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class)->withTimestamps();
    }

    public function getRegionEtudiantAttribute($attributes)
    {
        return $this->getRegionEtudiantOptions()[$attributes];
    }

    public function getRegionEtudiantOptions()
    {
        return [
            '' => 'Selectionner votre région',
            '1' => 'Alsace',
            '2' => 'Aquitaine',
            '3' => 'Auvergne',
            '4' => 'Basse Normandie',
            '5' => 'Bourgogne',
            '6' => 'Bretagne',
            '7' => 'Centre',
            '8' => 'Champagne-Ardenne',
            '9' => 'Corse',
            '10' => 'Franche-Comté',
            '11' => 'Haute Normandie',
            '12' => 'Ile de France',
            '13' => 'Languedoc-Roussillon',
            '14' => 'Limousin',
            '15' => 'Lorraine',
            '16' => 'Midi-Pyrénées',
            '17' => 'Nord-Pas de Calais',
            '18' => 'Pays de la Loire',
            '19' => 'Picardie',
            '20' => 'Poitou-Charentes',
            '21' => 'Provence-Alpes-Côte d\'Azur',
            '22' => 'Rhône-Alpes',
            '100' => 'Autres et DOM'
        ];
    }
}
