<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_referentiel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "type_id",
        "referentiel_id"
    ];
}
