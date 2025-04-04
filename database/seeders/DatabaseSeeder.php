<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Criando um usuário com senha hasheada
        User::factory()->create([
            'name' => 'admin',
            'email' => 'test@test.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
