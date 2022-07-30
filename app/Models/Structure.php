<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    public $fillable = [
        "nom", "domaine", "mail", "adresse",
        "numero",
    ];
    use HasFactory;

    public function annonces()
    {
        return $this->hasMany(Annonces::class);
    }

    public function activites()
    {
        return $this->hasMany(Annonces::class);
    }
}