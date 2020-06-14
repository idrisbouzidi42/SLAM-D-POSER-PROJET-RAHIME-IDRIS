<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    protected $fillable = ['nom'];

    public function offres()
    {
        return $this->belongsToMany(Offre::class)->withTimestamps();
    }

    public function demandes()
    {
        return $this->belongsToMany(Demande::class)->withTimestamps();
    }
}
