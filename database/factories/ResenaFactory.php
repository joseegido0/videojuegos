<?php

namespace Database\Factories;

use App\Models\Resena;
use App\Models\Videojuego;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resena>
 */
class ResenaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Resena::class;

    public function definition(): array
    {
        return [
            'videojuego_id' => Videojuego::factory(), // Crear o asociar un nuevo videojuego
            'usuario' => $this->faker->name(),
            'contenido' => $this->faker->paragraph(),
            'puntuacion' => $this->faker->numberBetween(0, 10)
        ];
    }
}
