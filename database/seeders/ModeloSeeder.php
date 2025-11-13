<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Modelo; // ✅ Importa o model correto

class ModeloSeeder extends Seeder
{
    public function run(): void
    {
        // Marcas existentes no MarcaSeeder:
        // 1 - Chevrolet
        // 2 - Fiat
        // 3 - Volkswagen

        Modelo::create(['nome' => 'Onix', 'marca_id' => 1]);
        Modelo::create(['nome' => 'Cruze', 'marca_id' => 1]);
        Modelo::create(['nome' => 'Argo', 'marca_id' => 2]);
        Modelo::create(['nome' => 'Pulse', 'marca_id' => 2]);
        Modelo::create(['nome' => 'Gol', 'marca_id' => 3]);
        Modelo::create(['nome' => 'Nivus', 'marca_id' => 3]);
    }
}
