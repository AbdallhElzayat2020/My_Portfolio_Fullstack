<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all permission IDs from config
        $permissions = array_keys(config('permissions.permissions', []));

        // Create Admin Role with all permissions
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrator with full access to all features',
            'permissions' => $permissions,
            'status' => 'active',
        ]);

        // Create Editor Role with limited permissions
        Role::create([
            'name' => 'Editor',
            'slug' => 'editor',
            'description' => 'Editor with access to content management',
            'permissions' => [1, 2, 8, 9, 11], // Dashboard, Categories, Blogs, Services, Projects
            'status' => 'active',
        ]);

        // Create Viewer Role with read-only access
        Role::create([
            'name' => 'Viewer',
            'slug' => 'viewer',
            'description' => 'Viewer with read-only access',
            'permissions' => [1], // Only Dashboard
            'status' => 'active',
        ]);
    }
}
