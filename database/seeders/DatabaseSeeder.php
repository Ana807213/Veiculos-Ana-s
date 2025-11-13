<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 👇 Cria usuário administrador padrão
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('123456'),
                'is_admin' => true,
            ]
        );

        // ⚙️ Executa os seeders de dados
        $this->call([
            MarcaSeeder::class,
            ModeloSeeder::class,
            CorSeeder::class,
            VeiculoSeeder::class,
        ]);
    }
}
