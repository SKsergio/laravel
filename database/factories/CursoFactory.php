<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Curso;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>$this->faker->sentence(),
            'description' =>$this->faker->paragraph(),
            'categoria' =>$this->faker->randomElement( ['Develop', 'Design'] )
        ]; //we can use this to create false records
    }
}
