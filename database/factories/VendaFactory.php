<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class VendaFactory extends Factory
{
    public function definition(): array
    {
        $produto = \App\Models\Produto::inRandomOrder()->first() ?? \App\Models\Produto::factory()->create();
        $quantidade = $this->faker->numberBetween(1, 10);
        
        return [
            'quantidade' => $quantidade,
            'valor_total' => $quantidade * $produto->preco,
            'produto_id' => $produto->id,
            'user_id' => \App\Models\User::inRandomOrder()->first()->id ?? \App\Models\User::factory(),
        ];
    }

}
