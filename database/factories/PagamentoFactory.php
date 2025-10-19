<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pagamento>
 */
class PagamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'conta_id' => \App\Models\Conta::factory(),
            'forma_pagamento_id' => \App\Models\FormaPagamento::factory(),
            'valor' => $this->faker->randomFloat(2, 50, 5000),
            'data_pagamento' => $this->faker->date(),
        ];
    }
}
