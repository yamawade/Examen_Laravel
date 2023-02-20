<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Candidat;
use App\Models\Referentiel;

class Formation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "nom",
        "duree",
        "description",
        "isStarted",
        "date_debut"
    ];

    public function candidats(){
        return $this->belongsToMany(Candidat::class, 'candidat__formations');
    }

    public function referentiels()
    {
        return $this->belongsToMany(Referentiel::class, 'referentiel__formations');
    }
}
