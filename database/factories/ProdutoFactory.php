<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word,
            'descricao' => $this->faker->sentence,
            'preco' => $this->faker->randomFloat(2, 10, 1000),
            'categoria_id' => \App\Models\Categoria::inRandomOrder()->first()->id ?? \App\Models\Categoria::factory(),
        ];
    }

}
