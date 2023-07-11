<?php

use App\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    public function run()
    {
        $colors = [
            ['name' => 'Blanco'],
            ['name' => 'Negro'],
            ['name' => 'Gris'],
            ['name' => 'Marrón'],
            ['name' => 'Amarillo'],
        ];

        Color::insert($colors);
    }
}
