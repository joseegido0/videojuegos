<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Videojuego;

class VideojuegoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Videojuego::factory()->count(10)->create();
    }
}

