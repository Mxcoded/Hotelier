<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Programme;
use App\Models\Filiere;

class ModuleProgrammeController extends Controller
{

    protected $programme;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['indexProgramme']]);
        $this->middleware('admin');

    }

    public function indexProgramme()
    {
        $programmes = Programme::all();

        return view("programmes.index", compact("programmes"));
    }


    public function createProgramme()
    {
        $filieres = Filiere::all();
        return view('programmes.redigerProgramme', compact('filieres'));
    }

    // publier un programme

    public function publierProgramme(Request $req)
    {
        $choix = $req->choix;
        $filiere = $req->filiere;
        $dateFin = $req->dateFin;
        $dateDebut = $req->dateDebut;

        $filiere = Filiere::find($filiere);

        if ($choix = 1) {
            $libelle = "programme_du" . $dateDebut . "au" . $dateFin . " " . $filiere->filiere . "-" . $filiere->promotion;
            $fichierName = "default.png";
            if ($req->file("fichier")) {
                $fichierName = time() . "_" . $req->file("fichier")->getClientOriginalName();
              //  dd($libelle);
                $req->file("fichier")->storeAS("public/images/programmes/", $fichierName);
                $user = Auth()->user()->id;

                $programme = Programme::create([
                    "user_id" => $user,
                    "filiere_id" => $filiere->id,
                    "date_debut" => $dateDebut,
                    "date_fin" => $dateFin,
                    "fichier" => $fichierName,
                    "libelle" => $libelle,

                ]);
            }

            $programmes = Programme::all();

            return redirect()->route("programme.index")->with(["programmes" => $programmes]);
        }

    }

    public function show($id)
    {
        $programme = Programme::find($id);
        return view("Programmes/detailProgramme", compact("programme"));
    }


/*
    public function editerModule()
    {
        $module = new Module;
        $module->intitule = "Réseau IP";
        $module->user_id = 1;
        $module->ue = "Réseau";
        $module->description = "Réseau IP d'enseignement en master 1 SI-SAD";

        $module->save();

        dd($module);
    }

    public function index()
    {
        $programme = Programme::find(1);
        dd($programme->module);
    }

    public function store_programme()
    {
        $programme = Programme::find(1);
        $programme->module()->attach(1);
        dd($programme);
    }
     */

}