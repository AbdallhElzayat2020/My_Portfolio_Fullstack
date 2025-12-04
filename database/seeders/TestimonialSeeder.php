<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::truncate();
        Media::where('mediaable_type', Testimonial::class)->delete();

        $testimonials = [
            [
                'client_name' => 'Sarah Johnson',
                'client_description' => 'Working with Abdullah was an absolute pleasure. He delivered our project on time and exceeded our expectations. Highly professional and skilled developer!',
                'job' => 'CEO at TechStart Inc.',
                'status' => 'active',
            ],
            [
                'client_name' => 'Michael Chen',
                'client_description' => 'Abdullah transformed our outdated website into a modern, responsive platform. His attention to detail and technical expertise is outstanding.',
                'job' => 'Product Manager at Digital Solutions',
                'status' => 'active',
            ],
            [
                'client_name' => 'Emily Rodriguez',
                'client_description' => 'The API integration Abdullah built for us is flawless. He\'s responsive, knowledgeable, and always delivers quality work.',
                'job' => 'CTO at InnovateLab',
                'status' => 'active',
            ],
            [
                'client_name' => 'David Thompson',
                'client_description' => 'Abdullah helped us launch our e-commerce platform successfully. His Laravel expertise and problem-solving skills are top-notch.',
                'job' => 'Founder at ShopEase',
                'status' => 'active',
            ],
            [
                'client_name' => 'Lisa Anderson',
                'client_description' => 'Outstanding work! Abdullah created a beautiful and functional dashboard for our SaaS product. Couldn\'t be happier with the results.',
                'job' => 'Head of Product at CloudSoft',
                'status' => 'active',
            ],
            [
                'client_name' => 'James Wilson',
                'client_description' => 'Professional, reliable, and skilled. Abdullah delivered our mobile app backend ahead of schedule. Highly recommended!',
                'job' => 'Tech Lead at MobileFirst',
                'status' => 'active',
            ],
        ];

        $sourcePath = public_path('assets/frontend/img/images');
        $destinationPath = public_path('uploads/brands');

        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        // Use profile image as default client image
        $defaultImage = $sourcePath . '/profile.png';
        $imageFiles = ['profile.png'];

        foreach ($testimonials as $index => $testimonial) {
            $testimonialModel = Testimonial::create($testimonial);

            // Use profile image for all testimonials (or you can add different images)
            if (File::exists($defaultImage)) {
                $newFileName = time() . '_' . Str::uuid() . '_' . ($index + 1) . '.png';
                File::copy($defaultImage, $destinationPath . '/' . $newFileName);

                Media::create([
                    'mediaable_id' => $testimonialModel->id,
                    'mediaable_type' => Testimonial::class,
                    'file_name' => $newFileName,
                ]);
            }
        }
    }
}
