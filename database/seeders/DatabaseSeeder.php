<?php

namespace Database\Seeders;

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
            'name' => 'Test User',
            'cpfcnpj' => '02650084090',
            'danascimento' => '2002-01-27',
            'telefone' => '(54) 99134-2721',
            'cep' => '99950-000',
            'estado' => 'RS',
            'cidade' => 'Tapejara',
            'bairro' => 'Centro',
            'endereco' => 'Rua Padre Nobrega, 172',
            'password' => Hash::make('admin'),
            'email' => 'test@gmail.com',
            'status' => 'active',
        ]);
    }
}
