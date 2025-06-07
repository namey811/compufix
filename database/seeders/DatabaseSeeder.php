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
        /*
        $this->call([
            MoonShineUserSeeder::class,
        ]);
        */
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
            'email' => 'javierlunaster@gmail.com',
            'password' => bcrypt('Luna2025')
        ]);
        User::factory()->create([
            'name' => 'Ivan Narvaez',
            'email' => 'namey811@gmail.com',
            'password' => bcrypt('Narvaez1989$')
        ]);
        */
    }
}
