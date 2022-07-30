<?php

namespace App\Http\Controllers;

use App\Models\Activites;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Structure;
use App\Models\Photo;
use App\Models\Commentaire;

class ActivitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //On récupère tous les Post
        $activites = Activites::latest()->get();

    // On transmet les Post à la vue
        return view("activites.index", compact("activites"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        $structures = Structure::all();
        return view("activites.create", compact("categories", "structures"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'intitule' => ['required', 'min:3', ],
            'dateButoir' => ['required', 'min:5'],
            'categorie' => ['required', 'min:5'],
            'description' => ['required', 'min:20'],
            'photo' => ['bail', 'required', 'image', 'max:6000'],
            'structure' => ['required', 'min:2'],
            'numero' => ['required', 'min:8', 'max:12'],
            'dateDebut' => ['required', 'min:5'],
            'adresse' => ['required', 'min:5'],
            'lieu' => ['required', 'min:2'],
            'mail' => ['required', 'email', ],
            'domaine' => ['required', 'min:5'],

        ]);


        $intitule = $request->intutile;
        $dateButoir = $request->dateButoir;
        $categorie = $request->categorie;
        $description = "$request->description";

        // verification de l'existance de la categorie sinon on cree
        $id_categorie = Categorie::where('designation', $categorie)->get(['id']);
        if (count($id_categorie) > 0) {
            $id_categorie = $id_categorie[0]->id;
            //dd($id_categorie[0]->id);

        } else {
            $cat = Categorie::create([
                "designation" => $categorie,
                "type" => 1,
                "description" => "categorie de " . $categorie,
            ]);

            $id_categorie = $cat->id;
        }

        // verification de l'existence de la structure, sinon on creee

        $id_structure = Structure::where('nom', $request->structure)->get(['id']);
        if (count($id_structure) > 0) {
            $id_structure = $id_structure[0]->id;
        } else {
            $struct = Structure::create([
                "nom" => $request->structure,
                "domaine" => $request->domaine,
                "mail" => $request->mail,
                "numero" => $request->numero,
                "adresse" => $request->adresse,
            ]);

            $id_structure = $struct->id;
        }

        $user = Auth()->user()->id;

        // enregistrement de l'activité

        $activite = Activites::create([
            "intitule" => "$request->intitule",
            "categorie_id" => $id_categorie,
            "user_id" => $user,
            "structure_id" => $id_structure,
            "date_debut" => $request->dateDebut,
            "date_butoir" => $request->dateButoir,
            "description" => "$request->description"
        ]);

        if ($activite) {
            $imageName = "default.png";
            if ($request->file("photo")) {
                $imageName = time() . "_" . $activite->titre . "_" . $request->file("photo")->getClientOriginalName();
                $request->file("photo")->storeAS("public/images/activites/", $imageName);

                $img = Photo::create([
                    "photo" => $imageName,
                    "activites_id" => $activite->id,
                ]);
            }
        }

        $activites = Activites::all();
        return redirect()->route('activites.index', ['activites' => $activites]);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activites  $activites
     * @return \Illuminate\Http\Response
     */
    public function show($activites)
    {
        $photos = Photo::where("activites_id", $activites)->orderBy("created_at", "desc")->first("photo");
        $activites = Activites::find($activites);
        return view("activites.show", compact("activites", "photos"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activites  $activites
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activite = Activites::find($id);
        $structures = Structure::all();
        $categories = Categorie::all();
        return view(
            'activites/create',
            [
                'categories' => $categories,
                'activites' => $activite,
                'structures' => $structures

            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activites  $activites
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $activites)
    {
        $request->validate([
            'intitule' => ['required', 'min:3', ],
            'dateButoir' => ['required', 'min:5'],
            'categorie' => ['required', 'min:5'],
            'description' => ['required', 'min:20'],
            'structure' => ['required', 'min:2'],
            'numero' => ['required', 'min:8', 'max:12'],
            'dateDebut' => ['required', 'min:5'],
            'adresse' => ['required', 'min:5'],
            'lieu' => ['required', 'min:2'],
            'mail' => ['required', 'email', ],
            'domaine' => ['required', 'min:5'],

        ]);

        $activite = Activites::find($activites);

        $intitule = $request->intutile;
        $dateButoir = $request->dateButoir;
        $categorie = $request->categorie;
        $description = "$request->description";

        // verification de l'existance de la categorie sinon on cree
        $id_categorie = Categorie::where('designation', $categorie)->get(['id']);
        if (count($id_categorie) > 0) {
            $id_categorie = $id_categorie[0]->id;
            //dd($id_categorie[0]->id);

        } else {
            $cat = Categorie::create([
                "designation" => $categorie,
                "type" => 1,
                "description" => "categorie de " . $categorie,
            ]);

            $id_categorie = $cat->id;
        }

        // verification de l'existence de la structure, sinon on creee

        $id_structure = Structure::where('nom', $request->structure)->get(['id']);
        if (count($id_structure) > 0) {
            $id_structure = $id_structure[0]->id;
        } else {
            $struct = Structure::create([
                "nom" => $request->structure,
                "domaine" => $request->domaine,
                "mail" => $request->mail,
                "numero" => $request->numero,
                "adresse" => $request->adresse,
            ]);

            $id_structure = $struct->id;
        }

        $activite->update([
            "intitule" => "$request->intitule",
            "categorie_id" => $id_categorie,
            "structure_id" => $id_structure,
            "date_debut" => $request->dateDebut,
            "date_butoir" => $request->dateButoir,
            "description" => "$request->description"
        ]);

        if ($request->file("photo")) {
            $imageName = time() . "_" . $activite->titre . "_" . $request->file("photo")->getClientOriginalName();
            $request->file("photo")->storeAS("public/images/activites/", $imageName);

            $img = Photo::create([
                "photo" => $imageName,
                "activites_id" => $activite->id,
            ]);
        }

        $photos = Photo::where("activites_id", $activites)->orderBy("created_at", "desc")->first("photo");
        return redirect()->route('activites.show', $activites)->with(['photos' => $photos]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activites  $activites
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activite = Activites::find($id);
        if (count($activite->photos) > 0) {
            Storage::delete($activite->photos[0]->photo);
            $activite->photos[0]->delete();
        }
        Activites::destroy($id);
        return redirect()->route("activites.index")->with("notification", "L'activité a été bien supprimé");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $activites
     * @return \Illuminate\Http\Response
     */
    public function commenter($id)
    {
        $activite = Activites::find($id);
        $photos = Photo::where("activites_id", $id)->orderBy("created_at", "desc")->first("photo");
        return view('forms.commentaireForm', compact("activite", "photos"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $activites
     * @return \Illuminate\Http\Response
     */
    public function commenterStore(Request $rq, $id_activite)
    {
        $rq->validate([
            "commentaire" => ["required", "min:20"]
        ]);

        $user = Auth()->user()->id;

        //insertion du commentaire
        $commentaire = Commentaire::create([
            "user_id" => $user,
            "activites_id" => $id_activite,
            "commentaire" => $rq->commentaire,
        ]);
        $activites = Activites::find($id_activite);
        $photos = Photo::where("activites_id", $id_activite)->orderBy("created_at", "desc")->first("photo");
        return redirect()->route('activites.show', $activites)->with(['photos' => $photos]);

    }

}