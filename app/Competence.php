<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    protected $fillable =['nom'];

    public function offres()
    {
        return $this->belongsToMany('\App\Offre')->withTimestamps();
    }

    public function demandes()
    {
        return $this->belongsToMany('\App\Demande')->withTimestamps();
    }


}
