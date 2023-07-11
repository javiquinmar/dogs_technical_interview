<?php

use App\Breed;
use Illuminate\Database\Seeder;

class BreedSeeder extends Seeder
{
    public function run()
    {
        $breeds = [
            ['name' => 'Pastor Alemán'],
            ['name' => 'Chihuahua'],
            ['name' => 'Rottweiler'],
            ['name' => 'Boxer'],
            ['name' => 'Beagle'],
            ['name' => 'Doberman'],
            ['name' => 'Labrador Retriever'],
            ['name' => 'Bulldog Francés'],
            ['name' => 'Bulldog Inglés'],
            ['name' => 'Yorkshire Terrier'],
        ];

        Breed::insert($breeds);
    }
}
