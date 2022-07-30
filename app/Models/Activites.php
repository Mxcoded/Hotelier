<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activites extends Model
{
    public $fillable = [
        "intitule", "description", 'user_id', 'categorie_id',
        "date_debut", "lieu", "date_butoir", "structure_id"
    ];

    use HasFactory;

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function structure()
    {
        return $this->belongsTo(Structure::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

}