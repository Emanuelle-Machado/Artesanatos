<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Categoria::factory(5)->create();
        \App\Models\Produto::factory(20)->create();
        \App\Models\Venda::factory(30)->create();
    }
}
