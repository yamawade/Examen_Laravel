<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referentiel_Formation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "referentiel_id",
        "formation_id"
    ];
}
