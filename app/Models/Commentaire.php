<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $fillable = ["user_id", "annonces_id", "activites_id", "commentaire"];
    use HasFactory;

    public function annonce()
    {
        return $this->belongsTo(Annonces::class);
    }

    public function activite()
    {
        return $this->belongsTo(Activites::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}