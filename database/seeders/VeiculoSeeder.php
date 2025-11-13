<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VeiculoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('veiculos')->insert([
            [
                'marca_id' => 1,
                'modelo_id' => 1,
                'cor_id' => 1,
                'ano' => 2022,
                'preco' => 79990.00,
                'foto1' => 'https://cdn.motor1.com/images/mgl/0xX1k/s1/chevrolet-onix.jpg',
                'foto2' => 'https://cdn.motor1.com/images/mgl/0xX1k/s1/chevrolet-onix-2022.jpg',
                'foto3' => 'https://cdn.motor1.com/images/mgl/ZkkZr/s1/chevrolet-onix-turbo-2022.jpg',
                'descricao' => 'Chevrolet Onix 1.0 Turbo, completo, baixa quilometragem.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'marca_id' => 2,
                'modelo_id' => 2,
                'cor_id' => 2,
                'ano' => 2021,
                'preco' => 85990.00,
                'foto1' => 'https://cdn.motor1.com/images/mgl/pbqkK/s1/fiat-cronos-2021.jpg',
                'foto2' => 'https://cdn.motor1.com/images/mgl/pbqkK/s1/fiat-cronos-interior.jpg',
                'foto3' => 'https://cdn.motor1.com/images/mgl/VbbJQ/s1/fiat-cronos-traseira.jpg',
                'descricao' => 'Fiat Cronos Drive 1.3, ótimo estado, revisado.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'marca_id' => 3,
                'modelo_id' => 3,
                'cor_id' => 3,
                'ano' => 2023,
                'preco' => 109990.00,
                'foto1' => 'https://cdn.motor1.com/images/mgl/2Zx1e/s1/honda-civic-2023.jpg',
                'foto2' => 'https://cdn.motor1.com/images/mgl/2Zx1e/s1/honda-civic-2023-interior.jpg',
                'foto3' => 'https://cdn.motor1.com/images/mgl/vb1mE/s1/honda-civic-traseira.jpg',
                'descricao' => 'Honda Civic EX 2.0 Automático, 0km, completo.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
