<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public $fillable = ["designation", "description", "type"];
    use HasFactory;

    public function annonces()
    {
        return $this->hasMany(Annonces::class);
    }

    public function activites()
    {
        return $this->hasMany(Activites::class);
    }

}