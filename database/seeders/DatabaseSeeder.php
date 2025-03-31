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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'role' => "admin",
            'address' => 'Jln Testing',
            'phone' => '08123456789',
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'username' => 'user',
            'password' => bcrypt('password'),
            'role' => "user",
            'address' => 'Jln Testing User',
            'phone' => '08123456789',
        ]);
    }
}
