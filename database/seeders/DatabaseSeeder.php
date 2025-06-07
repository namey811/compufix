<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            MoonShineUserSeeder::class,
        ]);

        $this->call([
            MarcaSeeder::class,
        ]);

        $this->call([
            PerifericoSeeder::class,
        ]);

        $this->call([
            TipoEquipoSeeder::class,
        ]);
        /*
        User::factory()->create([
            'name' => 'Javier Luna',
            'email' => 'jluna@gmail.com',
            'password' => bcrypt('luna2025')
        ]);
        User::factory()->create([
            'name' => 'Ivan Narvaez',
            'email' => 'namey811@gmail.com',
            'password' => bcrypt('narvaez1989$')
        ]);
        */
    }
}
