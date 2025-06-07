<?php

namespace Database\Seeders;

use MoonShine\Laravel\Models\MoonshineUser;
//use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MoonShineUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MoonshineUser::updateOrCreate([
            'email' => 'namey811@gmail.com',
        ], [
            'name' => 'Ivan Narvaez',
            'password' => Hash::make('narvaez1989$'), // Cambia esto en producción
        ]);

        MoonshineUser::updateOrCreate([
            'email' => 'javierlunaster@gmail.com',
        ], [
            'name' => 'Javier Luna',
            'password' => Hash::make('Jluna2025'), // Cambia esto en producción
        ]);
    }
}
