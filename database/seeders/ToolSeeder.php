<?php

namespace Database\Seeders;

use App\Models\Tool;
use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ToolSeeder extends Seeder
{
    public function run(): void
    {
        // Map tool names to existing icons in public/assets/frontend/img/skills
        $tools = [
            ['name' => 'Laravel',       'icon' => 'laravel.png'],
            ['name' => 'Livewire',      'icon' => 'livewire.png'],
            ['name' => 'React',         'icon' => 'react.svg'],
            ['name' => 'Alpine.js',     'icon' => 'Alpinejs.png'],
            ['name' => 'Bootstrap',     'icon' => 'bootstrap.svg'],
            ['name' => 'MySQL',         'icon' => 'mysql.svg'],
            ['name' => 'MongoDB',       'icon' => 'mongodb.svg'],
            ['name' => 'Git',           'icon' => 'git.svg'],
            ['name' => 'GitHub',        'icon' => 'github.svg'],
            ['name' => 'JavaScript',    'icon' => 'js.svg'],
            ['name' => 'TypeScript',    'icon' => 'ts.svg'],
            ['name' => 'Node.js',       'icon' => 'node.svg'],
            ['name' => 'Express.js',    'icon' => 'express.svg'],
        ];

        foreach ($tools as $item) {
            $tool = Tool::firstOrCreate(
                ['name' => $item['name']],
                ['status' => 'active']
            );

            // Attach icon if it exists on disk and the tool has no image yet
            if ($tool->image()->doesntExist() && ! empty($item['icon'])) {
                $sourcePath = public_path('assets/frontend/img/skills/' . $item['icon']);
                if (is_file($sourcePath)) {
                    $fileName = $item['icon']; // keep original name

                    // Copy file into tools disk root
                    if (! Storage::disk('tools')->exists($fileName)) {
                        Storage::disk('tools')->put($fileName, file_get_contents($sourcePath));
                    }

                    Media::create([
                        'mediaable_id'   => $tool->id,
                        'mediaable_type' => Tool::class,
                        'file_name'      => $fileName,
                    ]);
                }
            }
        }
    }
}
