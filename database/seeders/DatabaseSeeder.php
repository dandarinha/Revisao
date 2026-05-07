<?php

namespace Database\Seeders;

use App\Models\Produto;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'ADM',
            'email' => 'adm@senai.br',
            'password' => Hash::make('123'),

        ]);

         Produto::create([
            'nome' => 'Produto 01',
            'valor' => 10.90,
            'qtd_estoque' => 0,
            'qtd_minima' => 10,
        ]);

        Produto::create([
            'nome' => 'Produto 02',
            'valor' => 20.90,
            'qtd_estoque' => 0,
            'qtd_minima' => 20,
        ]);

        Produto::create([
            'nome' => 'Produto 03',
            'valor' => 30.90,
            'qtd_estoque' => 0,
            'qtd_minima' => 30,
        ]);
    }
}
