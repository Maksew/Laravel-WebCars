<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        // Exemple d'ajout de quelques modèles pour Audi
        Vehicle::insert([
            // Audi
            ['brand' => 'Audi', 'model' => 'A1'],
            ['brand' => 'Audi', 'model' => 'A3'],
            ['brand' => 'Audi', 'model' => 'A4'],
            ['brand' => 'Audi', 'model' => 'Q5'],
            ['brand' => 'Audi', 'model' => 'Q7'],

            // Porsche
            ['brand' => 'Porsche', 'model' => '911'],
            ['brand' => 'Porsche', 'model' => 'Panamera'],
            ['brand' => 'Porsche', 'model' => 'Cayenne'],
            ['brand' => 'Porsche', 'model' => 'Macan'],
            ['brand' => 'Porsche', 'model' => 'Taycan'],

            // Ferrari
            ['brand' => 'Ferrari', 'model' => '488 GTB'],
            ['brand' => 'Ferrari', 'model' => '812 Superfast'],
            ['brand' => 'Ferrari', 'model' => 'F8 Tributo'],
            ['brand' => 'Ferrari', 'model' => 'Roma'],

            // BMW
            ['brand' => 'BMW', 'model' => 'M3'],
            ['brand' => 'BMW', 'model' => 'M4'],
            ['brand' => 'BMW', 'model' => 'M5'],
            ['brand' => 'BMW', 'model' => 'X5'],
            ['brand' => 'BMW', 'model' => 'X7'],
        ]);
    }

}
