<?php

namespace Database\Seeders;

use App\Models\Desarrollador;
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
        // User::factory(10)->create();

        $this->call(DesarrolladorSeeder::class);
        $this->call(EtiquetaSeeder::class);
        $this->call(ResenaSeeder::class);
        $this->call(VideojuegoSeeder::class);
    }
}
