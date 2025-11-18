<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario de prueba para que se ejecuten migraciones
        User::factory()->create([
            'name'      => 'Francisco Jair',
            'email'     => 'franciscojair.flores.hernandez@gmail.com',
            'password'  => bcrypt('12345678'),
            'id_number' => '1234567890',
            'phone'     => '555-1234',
            'address'   => '123 Main St, City, Country',
        ])->assignRole('Doctor');
    }
}