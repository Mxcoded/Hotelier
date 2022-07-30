<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Francis',
            'nom' => 'Kientega',
            'prenom' => 'Francis',
            'sexe' => 'masculin',
            'telephone' => 57644696,
            'specialite' => 'Programmation',
            'profile_id' => 1,
            'email' => 'franciskientega@yahoo.com',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'Abdoul',
            'nom' => 'Sagnon',
            'prenom' => 'Abdoul',
            'sexe' => 'masculin',
            'telephone' => 61125877,
            'specialite' => null,
            'profile_id' => 4,
            'email' => 'abdoulsagnon@yahoo.com',
            'password' => Hash::make('123123123'),
        ]);

    }
}