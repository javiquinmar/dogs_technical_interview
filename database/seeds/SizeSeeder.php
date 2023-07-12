<?php

use App\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    public function run()
    {
        $createdAt = \Carbon\Carbon::now();
        $sizes = [
            ['name' => 'Muy pequeño', 'created_at' => $createdAt],
            ['name' => 'Pequeño', 'created_at' => $createdAt],
            ['name' => 'Mediano', 'created_at' => $createdAt],
            ['name' => 'Grande', 'created_at' => $createdAt],
            ['name' => 'Muy grande', 'created_at' => $createdAt],
        ];

        Size::insert($sizes);
    }
}
