<?php

use Faker\Factory as Faker;
use App\Breed;
use App\Color;
use App\Dog;
use App\Size;
use Illuminate\Database\Seeder;

class DogSeeder extends Seeder
{

    public function run()
    {
        $breedIds = Breed::all()->pluck('id')->toArray();
        $colorIds = Color::all()->pluck('id')->toArray();
        $sizeIds  = Size::all()->pluck('id')->toArray();

        $faker = Faker::create();

        $numDogs = 40; // Define el número de registros que deseas generar
        $dogs = [];

        for ($i = 0; $i < $numDogs; $i++) {
            $dogs[] = [
                'name'     => $faker->name,
                'breed_id' => $breedIds[array_rand($breedIds)],
                'color_id' => $colorIds[array_rand($colorIds)],
                'size_id'  => $sizeIds[array_rand($sizeIds)],
                'age'    => $faker->randomElement([$faker->numberBetween(1, 20), null]),
                'weight' => $faker->randomElement([$faker->numberBetween(1, 60), null]),
            ];
        }

        Dog::insert($dogs);
    }
}
