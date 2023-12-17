<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'user']);
        Role::create(['name' => 'admin']);

        // User::factory(10)->create();
        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('user');
        });

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'ardana.629@gmail.com',
            'password' => bcrypt('password'),
            'address' => 'Blitar',
            'email_verified_at' => now()
        ])->assignRole('admin');
        
        Brand::factory(10)->create();

        

    }
}
