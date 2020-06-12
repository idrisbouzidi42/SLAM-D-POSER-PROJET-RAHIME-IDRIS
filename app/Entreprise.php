<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    public $fillable = ['nomEntreprise', 'typeEntreprise','telEntreprise', 'adresseWebEntreprise', 'nomTuteurEntreprise', 'rueEntreprise','mailEntreprise' ];


    public function offres()
    {
        return $this->hasMany('\App\Offre');
    }


}
