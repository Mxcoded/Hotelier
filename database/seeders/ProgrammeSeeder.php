<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Filiere;
use App\Models\Programme;

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // filieres*
        Filiere::create([
            "filiere" => "SI-SAD",
            "promotion" => "2021-2022",
        ]);

        Filiere::create([
            "filiere" => "SD",
            "promotion" => "2021-2022",
        ]);

        Filiere::create([
            "filiere" => "CAR",
            "promotion" => "2021-2022",
        ]);

        Programme::create([
            "user_id" => 2,
            "filiere_id" => 1,
            "date_debut" => '2022-06-29',
            "date_fin" => "2022-07-03",
            "fichier" => "1656224701_General Immo.pdf",
            "libelle" => "Programme du 2022-07-03 au 2022-07-03",

        ]);
    }
}