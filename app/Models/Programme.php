<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "filiere_id", "libelle", "date_debut", "fichier", "date_fin", "infoSupp"];

    public function module()
    {
        return $this->belongsToMany(Module::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

}