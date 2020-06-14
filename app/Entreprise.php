<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    public $fillable = ['nomEntreprise', 'typeEntreprise', 'telEntreprise', 'adresseWebEntreprise', 'nomTuteurEntreprise', 'rueEntreprise', 'mailEntreprise'];


    public function offres()
    {
        return $this->hasMany(Offre::class);
    }

    public function getStatusAttribute($attributes)
    {
        return $this->getStatusOptions()[$attributes];
    }

    public function getStatusOptions()
    {
        return [
            'Particulier' => 'Particulier',
            'Collectivité' => 'Collectivité',
            'TPE / PME / PMI' => 'TPE / PME / PMI',
            'Association' => 'Association',
            'Groupe' => 'Groupe',
            'Autre' => 'Autre'
        ];
    }
}
