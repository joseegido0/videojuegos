<?php

namespace Database\Factories;

use App\Models\Desarrollador;
use App\Models\Etiqueta;
use App\Models\Resena;
use App\Models\Videojuego;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Videojuego>
 */
class VideojuegoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Videojuego::class;

    public function definition(): array
    {
        // Crear un videojuego
        $videojuego = [
            'titulo' => $this->faker->word(),
            'descripcion' => $this->faker->paragraph(),
            'fecha_lanzamiento' => $this->faker->date(),
            'desarrollador_id' => Desarrollador::factory(),
        ];

        // Crear etiquetas asociadas al videojuego
        $etiquetas = Etiqueta::factory()->count(3)->create();
        $etiquetasIds = $etiquetas->pluck('id')->toArray();

        // Asociar etiquetas al videojuego
        $videojuego['etiquetas'] = $etiquetasIds;

        // Crear reseñas asociadas al videojuego
        Resena::factory()->count(5)->create([
            'videojuego_id' => $videojuego['id']
        ]);

        return $videojuego;
    }
}


