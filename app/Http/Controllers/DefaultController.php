<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Structure;

class DefaultController extends Controller
{
    public function bureauEsi()
    {
        $structures = Structure::all();
        return view("bureauEsi");
    }
}