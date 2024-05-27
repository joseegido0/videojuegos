<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Desarrollador;

class DesarrolladorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Desarrollador::factory()->count(10)->create();
    }
}

