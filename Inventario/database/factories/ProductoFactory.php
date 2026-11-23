<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Producto>
 */
class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition(): array
    {
       return [
        'codigo' => fake()->unique()->numerify('PROD-####'),
        'nombre' => fake()->word(),
        'precio' => fake()->randomFloat(2, 10, 1000),
        'existencias' => fake()->numberBetween(0, 100),
       ];
    }
}
