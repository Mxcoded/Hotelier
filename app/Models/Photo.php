<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $fillable = ['photo', 'annonces_id', 'activites_id'];
    use HasFactory;

    public function annonce()
    {
        return $this->belongsTo(Annonces::class);
    }


    public function activite()
    {
        return $this->belongsTo(Activites::class);
    }
}