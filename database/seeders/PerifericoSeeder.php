<?php

namespace Database\Seeders;

use App\Models\Periferico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerifericoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nombre' => 'Monitor', 'descripcion' => 'Monitor'],
            ['nombre' => 'Teclado', 'descripcion' => 'Teclado'],
            ['nombre' => 'Mouse', 'descripcion' => 'Mouse'],
            ['nombre' => 'Tarjeta de red', 'descripcion' => 'Tarjeta de red'],
            ['nombre' => 'Tarjeta de sonido', 'descripcion' => 'Tarjeta de sonido'],
            ['nombre' => 'Tarjeta de video', 'descripcion' => 'Tarjeta de video'],
            ['nombre' => 'Bluetooth', 'descripcion' => 'Bluetooth'],
            ['nombre' => 'Camara Web', 'descripcion' => 'Camara web'],
            ['nombre' => 'Generica', 'descripcion' => 'Generica'],
        ];

        foreach ($data as $item) {
            Periferico::firstOrCreate($item);
        }
    }
}
