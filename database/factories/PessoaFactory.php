<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pessoa>
 */
class PessoaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'tipo' => $this->faker->randomElement(['cliente', 'fornecedor']),
            'documento' => $this->faker->numerify('###########'),
            'email' => $this->faker->safeEmail(),
            'telefone' => $this->faker->phoneNumber(),
            'endereco' => $this->faker->address(),
        ];
    }
}
