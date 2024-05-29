<?php

namespace Database\Factories;

use App\Models\Desarrollador;
use App\Models\Etiqueta;
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
        return [
            'titulo' => $this->faker->word(),
            'descripcion' => $this->faker->paragraph(),
            'fecha_lanzamiento' => $this->faker->date(),
            'desarrollador_id' => Desarrollador::factory(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Videojuego $videojuego) {
            // Crear etiquetas asociadas al videojuego y adjuntarlas
            $etiquetas = Etiqueta::factory()->count(3)->create();
            $videojuego->etiquetas()->attach($etiquetas);

            // Crear reseñas asociadas al videojuego
            \App\Models\Resena::factory()->count(5)->create([
                'videojuego_id' => $videojuego->id,
            ]);
        });
    }
}





