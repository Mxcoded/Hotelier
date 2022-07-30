<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            "profile" => "admin"
        ]);

        Profile::create([
            "profile" => "cordonateur"
        ]);

        Profile::create([
            "profile" => "professeur"
        ]);

        Profile::create([
            "profile" => "étudiant"
        ]);
    }
}