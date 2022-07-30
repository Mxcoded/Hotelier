<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonces;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonce = Annonces::all();
        return view('annonces/index', ['annonces' => $annonce]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view(
            'annonces/ajouterAnnonce',
            ['categories' => $categories]
        );
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
            'titre' => ['required', 'min:10', ],
            'dateButoir' => ['required', 'min:5'],
            'categorie' => ['required', 'min:5'],
            'description' => ['required', 'min:20'],
            'source' => ['required', 'min:20'],
            'photo' => ['bail', 'required', 'image', 'max:6000'],

        ]);

        $titre = $request->titre;
        $dateButoir = $request->dateButoir;
        $categorie = $request->categorie;
        $description = "$request->description";

        $id_categorie = Categorie::where('designation', $categorie)->get(['id']);
        if (count($id_categorie) > 0) {
            $id_categorie = $id_categorie[0]->id;
            //dd($id_categorie[0]->id);

        } else {
            $cat = Categorie::create([
                "designation" => $categorie,
                "type" => 0,
                "description" => "categorie de " . $categorie,
            ]);

            $id_categorie = $cat->id;
        }

        $user = Auth()->user()->id;

        $annonce = Annonces::create([
            'titre' => $titre,
            'categorie_id' => $id_categorie,
            'user_id' => $user,
            'date_fin' => $dateButoir,
            'lien_source' => $request->source,
            'description' => $description,
        ]);

        if ($annonce) {
            $imageName = "default.png";
            if ($request->file("photo")) {
                $imageName = time() . "_" . $annonce->titre . "_" . $request->file("photo")->getClientOriginalName();
                $request->file("photo")->storeAS("public/images/annonces/", $imageName);

                $img = Photo::create([
                    "photo" => $imageName,
                    "annonces_id" => $annonce->id,
                ]);
            }
        }

        $annonces = Annonces::all();
        return redirect()->route('annonces', ['annonces' => $annonces]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $annonce = Annonces::find($id);

        $photos = Photo::where("annonces_id", $annonce->id)->orderBy("created_at", "desc")->first("photo");

        return view('annonces/detailAnnonce', [
            'annonce' => $annonce,
            'photos' => $photos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $annonce = Annonces::find($id);
        $categories = Categorie::all();
        return view(
            'annonces/ajouterAnnonce',
            [
                'categories' => $categories,
                'annonce' => $annonce
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $annonce = Annonces::find($id);
        $request->validate([
            'titre' => ['required', 'min:10', ],
            'dateButoir' => ['required', 'min:5'],
            'categorie' => ['required', 'min:5'],
            'description' => ['required', 'min:20'],
            'photo' => ['bail', 'image', 'max:6000'],
            'source' => ['bail', 'image', 'max:6000'],

        ]);

        $titre = $request->titre;
        $dateButoir = $request->dateButoir;
        $categorie = $request->categorie;
        $description = "$request->description";

        $id_categorie = Categorie::where('designation', $categorie)->get(['id']);
        if (count($id_categorie) > 0) {
            $id_categorie = $id_categorie[0]->id;
            //dd($id_categorie[0]->id);

        } else {
            $cat = Categorie::create([
                "designation" => $categorie,
                "type" => 0,
                "description" => "categorie de " . $categorie,
            ]);

            $id_categorie = $cat->id;
        }

        $user = Auth()->user()->id;

        $annonce->update([
            'titre' => $titre,
            'categorie_id' => $id_categorie,
            'user_id' => $user,
            'date_fin' => $dateButoir,
            'description' => $description,
            'lien_source' => $request->source,
        ]);

        $imageName = "default.png";
        if ($request->file("photo")) {
            $imageName = time() . "_" . $annonce->titre . "_" . $request->file("photo")->getClientOriginalName();
            $request->file("photo")->storeAS("public/images/annonces/", $imageName);

            $img = Photo::create([
                "photo" => $imageName,
                "annonces_id" => $annonce->id,
            ]);
        }
        $photos = Photo::where("annonces_id", $annonce->id)->orderBy("created_at", "desc")->first("photo");

        return redirect()->route('annonces/detail', $annonce)->with(["photos" => $photos]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $annonce = Annonces::find($id);
        if (count($annonce->photos) > 0) {
            Storage::delete($annonce->photos[0]->photo);
            $annonce->photos[0]->delete();
        }
        Annonces::destroy($id);
        return redirect()->route("annonces")->with("notification", "L'annonce a été bien supprimé");
    }


    /* COMMENTAIRE SUR UNE ANNONCE */

    public function commenterStore(Request $rq, $id_annonce)
    {
        $rq->validate([
            "commentaire" => ["required", "min:20"]
        ]);

        $user = Auth()->user()->id;

        //insertion du commentaire
        $commentaire = Commentaire::create([
            "user_id" => $user,
            "annonces_id" => $id_annonce,
            "commentaire" => $rq->commentaire,
        ]);
        $annonces = Activites::find($id_annonce);
        $photos = Photo::where("annonces_id", $id_annonce)->orderBy("created_at", "desc")->first("photo");
        return redirect()->route('activites.show', $annonces)->with(['photos' => $photos]);

    }
}