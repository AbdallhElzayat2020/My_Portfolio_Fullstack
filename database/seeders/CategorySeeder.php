<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Web Development',
            'Backend Development',
            'Frontend Development',
            'Fullstack Projects',
            'APIs & Integrations',
            'Landing Pages',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name'   => $name,
                    'status' => 'active',
                ]
            );
        }
    }
}
