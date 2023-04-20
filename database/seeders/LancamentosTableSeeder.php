<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lancamento;
use App\Models\User;
use Faker\Factory as Faker;


class LancamentosTableSeeder extends Seeder
{
    private $faker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        // Obtém uma lista de todos os IDs de usuário
        $userIds = User::all()->pluck('id')->toArray();

        // Cria 15 lançamentos aleatórios, atribuindo um usuário aleatório a cada um
        Lancamento::factory(15)->create([
            'user_id' => function () use ($userIds) {
                return $this->faker->randomElement($userIds);
            }
        ]);
    }
}
