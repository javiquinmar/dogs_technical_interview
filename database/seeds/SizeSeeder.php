<?php

use App\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    public function run()
    {
        $sizes = [
            ['name' => 'Muy pequeño'],
            ['name' => 'Pequeño'],
            ['name' => 'Mediano'],
            ['name' => 'Grande'],
            ['name' => 'Muy grande'],
        ];

        Size::insert($sizes);
    }
}
