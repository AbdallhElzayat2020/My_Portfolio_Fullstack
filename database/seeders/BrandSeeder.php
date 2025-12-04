<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        Brand::truncate();
        Media::where('mediaable_type', Brand::class)->delete();

        $brandsData = [
            ['name' => 'Google', 'icon' => 'google.svg'],
            ['name' => 'Meta', 'icon' => 'meta.svg'],
            ['name' => 'Notion', 'icon' => 'notion.svg'],
            ['name' => 'Figma', 'icon' => 'figma.svg'],
            ['name' => 'Adobe', 'icon' => 'adobe.svg'],
            ['name' => 'Webflow', 'icon' => 'webflow.svg'],
            ['name' => 'Framer', 'icon' => 'framer.svg'],
            ['name' => 'Zeplin', 'icon' => 'zeplin.svg'],
        ];

        $sourcePath = public_path('assets/frontend/img/icons');
        $destinationPath = public_path('uploads/brands');

        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        foreach ($brandsData as $data) {
            $brand = Brand::create([
                'brand_name' => $data['name'],
                'alt_text' => $data['name'] . ' Logo',
                'status' => 'active',
            ]);

            $iconFileName = $data['icon'];
            $sourceFile = $sourcePath . '/' . $iconFileName;

            if (File::exists($sourceFile)) {
                $newFileName = time() . '_' . Str::uuid() . '.' . File::extension($iconFileName);
                File::copy($sourceFile, $destinationPath . '/' . $newFileName);

                Media::create([
                    'mediaable_id' => $brand->id,
                    'mediaable_type' => Brand::class,
                    'file_name' => $newFileName,
                ]);
            }
        }
    }
}
