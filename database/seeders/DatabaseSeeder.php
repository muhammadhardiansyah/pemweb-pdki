<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'ardana.629@gmail.com',
            'password' => bcrypt('password')
        ]);

        Brand::factory(10)->create();
    }
}
