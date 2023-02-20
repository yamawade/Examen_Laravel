<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formation;

class Candidat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "nom",
        "prenom",
        "email",
        "age",
        "niveuEtude",
        "sexe"
    ];
    
    public function formations(){
        return $this->belongsToMany(Formation::class, 'candidat__formations');
    }
}
