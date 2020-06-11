<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    public $fillable = ['nomOffre','dureeOffre','descriptionOffre','teleTravailOffre', 'entreprise_id'];

    public function entreprise()
    {
        return $this->belongsTo('\App\Entreprise');
    }

    public function competences()
    {
        return $this->belongsToMany('\App\Competence')->withTimestamps();
    }
    
    public static function scopeEtat($query)
    {
        return $query->where('etat','=','Valide')->get();
    }

}
