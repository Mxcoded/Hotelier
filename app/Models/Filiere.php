<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;
    protected $fillable = ["filiere"];

    public function programmes()
    {
        return $this->hasMany(Programme::class);
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }

}