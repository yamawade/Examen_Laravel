<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formation;
use App\Models\Type;

class Referentiel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "libelle",
        "validated",
        "horaire"
    ];

    public function formations(){
        return $this->belongsToMany(Formation::class, 'referentiel__formations');
    }

    public function types(){
        return $this->belongsToMany(Type::class, 'type_referentiels');
    }
}
