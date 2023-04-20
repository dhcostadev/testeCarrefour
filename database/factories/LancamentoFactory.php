<?php

namespace Database\Factories;

use App\Models\Lancamento;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LancamentoFactory extends Factory
{
    protected $model = Lancamento::class;

    public function definition()
    {
        return [
            'descricao' => $this->faker->sentence(4),
            'valor' => $this->faker->randomFloat(2, 10, 1000),
            'data' => $this->faker->date(),
            'tipo' => $this->faker->randomElement(['debito', 'credito']),
            'user_id' => User::factory()
        ];
    }
}
