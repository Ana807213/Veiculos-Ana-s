<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cor;

class CorSeeder extends Seeder
{
    public function run(): void
    {
        $cores = ['Preto', 'Branco', 'Prata', 'Vermelho', 'Azul', 'Cinza'];
        foreach ($cores as $cor) {
            \App\Models\Cor::create(['nome' => $cor]);
        }
    }
}
