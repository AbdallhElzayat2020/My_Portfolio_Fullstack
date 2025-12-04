<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed roles first
        $this->call([
            RoleSeeder::class,
            AboutSeeder::class,
            ToolSeeder::class,
            CategorySeeder::class,
            ServiceSeeder::class,
            ProjectSeeder::class,
        ]);

        // Get admin role
        $adminRole = Role::where('slug', 'admin')->first();

        // Create admin user for dashboard
        User::create([
            'name' => 'Abdullah',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'role_id' => $adminRole->id,
        ]);

        // Optional: Create additional test users
        // User::factory(10)->create();
    }
}
