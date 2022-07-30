<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ["ue", "intitule", "user_id", "description"];
    use HasFactory;

    public function programme()
    {
        return $this->belongsToMany(Programme::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function filieres()
    {
        return $this->belongsToMany(Filiere::class);
    }
}