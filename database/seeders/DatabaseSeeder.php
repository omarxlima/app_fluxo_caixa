<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        \App\Models\FormaPagamento::factory()->count(4)->create();
        \App\Models\Categoria::factory()->count(6)->create();
        \App\Models\Pessoa::factory()->count(10)->create();
        \App\Models\Conta::factory()->count(20)->create();
        \App\Models\Pagamento::factory()->count(15)->create();
    }
}
