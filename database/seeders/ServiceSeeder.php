<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        // Define some core services with icons from skills folder
        $services = [
            [
                'name'        => 'Fullstack Web Development',
                'icon'        => 'laravel.png',
                'description' => 'Building modern fullstack applications with Laravel, React, and RESTful APIs.',
            ],
            [
                'name'        => 'Backend API Development',
                'icon'        => 'node.svg',
                'description' => 'Scalable REST and real-time APIs using Laravel, Node.js, and MySQL.',
            ],
            [
                'name'        => 'Frontend UI Development',
                'icon'        => 'react.svg',
                'description' => 'Pixel-perfect responsive UIs using React, Vue, Tailwind, and Bootstrap.',
            ],
        ];

        foreach ($services as $item) {
            $service = Service::firstOrCreate(
                ['slug' => Str::slug($item['name'])],
                [
                    'name'        => $item['name'],
                    'description' => $item['description'],
                    'status'      => 'active',
                ]
            );

            if ($service->image()->doesntExist() && ! empty($item['icon'])) {
                $sourcePath = public_path('assets/frontend/img/skills/' . $item['icon']);
                if (is_file($sourcePath)) {
                    $fileName = $item['icon'];

                    if (! Storage::disk('services_images')->exists($fileName)) {
                        Storage::disk('services_images')->put($fileName, file_get_contents($sourcePath));
                    }

                    Media::create([
                        'mediaable_id'   => $service->id,
                        'mediaable_type' => Service::class,
                        'file_name'      => $fileName,
                    ]);
                }
            }
        }
    }
}
