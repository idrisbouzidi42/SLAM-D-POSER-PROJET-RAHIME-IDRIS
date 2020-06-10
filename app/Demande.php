<?php

namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    public $fillable = ['titreDemande','dureeDemande','teleTravailDemande', 'etudiant_id'];

    public function scopeEtatDemande($query)
    {
        return $query->where('etatDemande','=','Valide')->get();
    }

    public function etudiant()
    {
        return $this->belongsTo('\App\Etudiant');
    }

    public function competences()
    {
        return $this->belongsToMany('\App\Competence')->withTimestamps();
    }
}
