<?php

namespace Database\Seeders;

use App\Models\Number;
use Illuminate\Database\Seeder;

class NumberSeeder extends Seeder
{
    public function run(): void
    {
        Number::truncate();

        // Create default statistics
        Number::create([
            'experience_year' => '4+',
            'complete_project' => '86+',
            'happy_client' => '72+',
        ]);
    }
}
