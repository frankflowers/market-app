<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear roles
        $this->call(RoleSeeder::class);

        // Crear usuario de prueba
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'franciscojair.flores.hernandez@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        // Asignar rol al usuario
    }
}
