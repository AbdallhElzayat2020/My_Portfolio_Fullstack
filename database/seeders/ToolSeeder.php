<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    public function run(): void
    {
        $tools = [
            'Laravel',
            'Livewire',
            'Vue.js',
            'React',
            'Alpine.js',
            'Tailwind CSS',
            'Bootstrap',
            'MySQL',
            'PostgreSQL',
            'Git & GitHub',
        ];

        foreach ($tools as $toolName) {
            Tool::firstOrCreate(
                ['name' => $toolName],
                ['status' => 'active']
            );
        }
    }
}
