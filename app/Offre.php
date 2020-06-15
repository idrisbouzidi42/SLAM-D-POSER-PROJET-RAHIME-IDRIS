<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    public $fillable = ['nomOffre', 'dureeOffre', 'descriptionOffre', 'teleTravailOffre', 'entreprise_id'];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class)->withTimestamps();
    }

    public static function scopeEtat($query)
    {
        return $query->where('etat', '=', 'Valide')->get();
    }

    public function scopeSignaled($query)
    {
        return $query->where('etat','=', 'Signalé')->get();
    }
}
