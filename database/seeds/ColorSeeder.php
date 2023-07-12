<?php

use App\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    public function run()
    {
        $createdAt = \Carbon\Carbon::now();

        $colors = [
            ['name' => 'Blanco', 'created_at' => $createdAt],
            ['name' => 'Negro', 'created_at' => $createdAt],
            ['name' => 'Gris', 'created_at' => $createdAt],
            ['name' => 'Marrón', 'created_at' => $createdAt],
            ['name' => 'Amarillo', 'created_at' => $createdAt],
        ];

        Color::insert($colors);
    }
}
