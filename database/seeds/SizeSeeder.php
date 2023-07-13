<?php

use App\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    public function run()
    {
        $createdAt = \Carbon\Carbon::now();
        $sizes = [
            ['name' => 'Muy pequeño', 'order' => 1, 'created_at' => $createdAt],
            ['name' => 'Pequeño', 'order' => 2, 'created_at' => $createdAt],
            ['name' => 'Mediano', 'order' => 3, 'created_at' => $createdAt],
            ['name' => 'Grande', 'order' => 4, 'created_at' => $createdAt],
            ['name' => 'Muy grande', 'order' => 5, 'created_at' => $createdAt],
        ];

        Size::insert($sizes);
    }
}
