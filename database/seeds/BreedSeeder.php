<?php

use App\Breed;
use Illuminate\Database\Seeder;

class BreedSeeder extends Seeder
{
    public function run()
    {
        $createdAt = \Carbon\Carbon::now();
        $breeds = [
            ['name' => 'Pastor Alemán', 'created_at' => $createdAt],
            ['name' => 'Chihuahua', 'created_at' => $createdAt],
            ['name' => 'Rottweiler', 'created_at' => $createdAt],
            ['name' => 'Boxer', 'created_at' => $createdAt],
            ['name' => 'Beagle', 'created_at' => $createdAt],
            ['name' => 'Doberman', 'created_at' => $createdAt],
            ['name' => 'Labrador Retriever', 'created_at' => $createdAt],
            ['name' => 'Bulldog Francés', 'created_at' => $createdAt],
            ['name' => 'Bulldog Inglés', 'created_at' => $createdAt],
            ['name' => 'Yorkshire Terrier', 'created_at' => $createdAt],
        ];

        Breed::insert($breeds);
    }
}
