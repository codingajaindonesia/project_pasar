<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Location;
use App\Models\Tenant;
use App\Models\User;
use Carbon\Carbon;
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
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'username' => 'staff',
            'password' => bcrypt('password'),
            'role' => "staff",
            'address' => 'Jln Testing Staff',
            'phone' => '08123456789',
        ]);
        $user = User::factory()->create([
            'name' => 'Ketut Meregeg',
            'email' => 'user@gmail.com',
            'username' => 'user',
            'password' => bcrypt('password'),
            'role' => "user",
            'address' => 'Jln Testing User',
            'phone' => '08123456789',
        ]);
        $location = Location::create([
            'name' => 'Pasar Karang Sokong',
            'address' => 'Jln Testing',
        ]);
        Tenant::create([
            'user_id' => $user->id,
            'location_id' => $location->id,
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addYear(10),
        ]);

        Category::create([
            'title' => 'Sewa Ruko',
            'description' => 'Penyewaan Ruko',
            'types' => 'in',
        ]);
        Category::create([
            'title' => 'Pembelian Barang',
            'description' => 'Membeli Barang di toko tersebut',
            'types' => 'out',
        ]);

    }
}
