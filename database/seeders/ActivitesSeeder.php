<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Activites;
use App\Models\Categorie;
use App\Models\Structure;
use App\Models\Photo;

class ActivitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
// categories
        Categorie::create([
            "designation" => "Conférence",
            "type" => 1,
            "description" => "categorie de la désignation",
        ]);

        Categorie::create([
            "designation" => "Formation",
            "type" => 1,
            "description" => "categorie de la désignation",
        ]);

        Structure::create([
            "nom" => "STRUCT IOT",
            "domaine" => "Informatique",
            "mail" => "struct@gmail.com",
            "numero" => 74296570,
            "adresse" => "Bobo-Dioulasso, Belle-ville",
        ]);

        //activites
        Activites::create([
            "user_id" => 1,
            "categorie_id" => 1,
            "structure_id" => 1,
            "date_debut" => '2022-07-01',
            "date_butoir" => '2022-07-05',
            "intitule" => "Conférence de presse",
            "lieu" => 'Bobo-Dioulasso',
            "description" => "autres résultats peuvent ne pas correspondre à ce que vous recherchez. Voir d'autres résultats quand mêmen.Les autres résultats peuvent ne pas correspondre à ce que vous recherchez. Voir d'autres résultats quand même",

        ]);

        Photo::create([
            "photo" => "1656220055__images (1).jpg",
            "activites_id" => 1,
        ]);


        Activites::create([
            "user_id" => 1,
            "categorie_id" => 2,
            "structure_id" => 1,
            "date_debut" => '2022-07-01',
            "date_butoir" => '2022-07-02',
            "intitule" => "Formation en cablage réseau",
            "lieu" => "Bobo-Dioulasso, 01 BP Belle-ville",
            "description" => "Nous organisons une activité de formation au profit des étudiants en première année de licence en câblage réseau",

        ]);

        Photo::create([
            "photo" => "1656224162__téléchargement.jpg",
            "activites_id" => 2,
        ]);

    }
}