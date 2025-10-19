<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conta>
 */
class ContaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pessoa_id' => \App\Models\Pessoa::factory(),
            'categoria_id' => \App\Models\Categoria::factory(),
            'tipo' => $this->faker->randomElement(['pagar', 'receber']),
            'descricao' => $this->faker->sentence(),
            'valor' => $this->faker->randomFloat(2, 50, 5000),
            'data_vencimento' => $this->faker->date(),
            'status' => 'pendente',
        ];
    }
}
