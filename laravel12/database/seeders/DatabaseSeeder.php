<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamar a RoleSeder
        $this->call([
            RoleSeeder::class
        ]);

        //crear usuario de prueba para que se ejecuten migraciones
        User::factory()->create([
            'name' => 'Roberto Basto',
            'email' => 'roberto54@gmail.com',
            'password'=> bcrypt('12345678')
        ]);
    }
}
