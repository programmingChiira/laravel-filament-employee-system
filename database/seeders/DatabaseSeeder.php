<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $user = User::factory()->create([
            "name" => "Admin",
            "email" => "admin@gmail.com",
        ]);
        User::factory()->create([
            "name" => "User",
            "email" => "user@gmail.com",
        ]);
        $role = Role::create(['name' => 'Admin']);
        $user->assignRole($role);

        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
    }
}
