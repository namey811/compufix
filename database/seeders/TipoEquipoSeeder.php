<?php

namespace Database\Seeders;

use App\Models\TipoEquipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoEquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nombre' => 'Computador todo en uno', 'descripcion' => 'Equipos all in one'],
            ['nombre' => 'Computador portatil', 'descripcion' => 'Laptop'],
            ['nombre' => 'CPU', 'descripcion' => 'CPU'],
            ['nombre' => 'Servidor', 'descripcion' => 'Servidor'],
            ['nombre' => 'UPS Empresariales', 'descripcion' => 'UPS KVA'],
            ['nombre' => 'Otros', 'descripcion' => 'Otros equipos']
        ];

        foreach ($data as $item) {
            TipoEquipo::firstOrCreate($item);
        }
    }
}
