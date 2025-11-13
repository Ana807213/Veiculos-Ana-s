<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Marca; // ✅ Importa o model correto

class MarcaSeeder extends Seeder
{
    public function run(): void
    {
        Marca::create(['nome' => 'Chevrolet']);
        Marca::create(['nome' => 'Fiat']);
        Marca::create(['nome' => 'Volkswagen']);
    }
}
