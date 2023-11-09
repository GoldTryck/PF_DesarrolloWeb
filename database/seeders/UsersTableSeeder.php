<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Hector Larios',
            'email' => 'hectormlp.proteco@gmail.com',
            'role_id' => 1, // ID del rol "admin"
            'password' => bcrypt('@adminRole'),
        ]);

        User::factory()->create([
            'name' => 'Francisco',
            'email' => 'admin2@example.com',
            'role_id' => 1, // ID del rol "admin"
            'password' => bcrypt('@adminRole'),
        ]);
    }
}
