<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleProgramme extends Model
{
    use HasFactory;
    protected $fillable = ["programme_id", "module_id", "jour", "heure", "journee", ];

}