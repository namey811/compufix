<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            ['nombre' => 'HP', 'descripcion' => 'HP Marca'],
            ['nombre' => 'Dell', 'descripcion' => 'Dell'],
            ['nombre' => 'Acer', 'descripcion' => 'Acer'],
            ['nombre' => 'Lenovo', 'descripcion' => 'Lenovo'],
            ['nombre' => 'Asus', 'descripcion' => 'Asus'],
            ['nombre' => 'Samsung', 'descripcion' => 'Samsung'],
            ['nombre' => 'Apple', 'descripcion' => 'Equipos MAC'],
            ['nombre' => 'MSI', 'descripcion' => 'MSI'],
            ['nombre' => 'Generica', 'descripcion' => 'Generica'],
        ];

        foreach ($marcas as $marca) {
            Marca::firstOrCreate($marca);
        }
    }
}
