<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Media;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure we have some categories to link to
        $defaultCategory = Category::first() ?? Category::create([
            'name'   => 'Web Projects',
            'slug'   => Str::slug('Web Projects'),
            'status' => 'active',
        ]);

        $projects = [
            [
                'short_title' => 'SaaS Dashboard',
                'full_title'  => 'FlowSaaS - SaaS Application Management Dashboard',
                'short_desc'  => 'A modern SaaS dashboard for managing subscriptions, analytics, and user onboarding.',
                'full_desc'   => '<p>A full-featured SaaS dashboard built with Laravel, Livewire, and Tailwind CSS.</p>
                                   <ul>
                                       <li>Authentication &amp; authorization</li>
                                       <li>Subscription &amp; billing management</li>
                                       <li>Real-time metrics and charts</li>
                                   </ul>',
                'image'       => 'project-1.png',
                'link'        => 'https://example.com/flowsaas',
                'in_home'     => true,
                'is_featured' => true,
            ],
            [
                'short_title' => 'E‑Commerce Platform',
                'full_title'  => 'ShopEase - Modern E‑Commerce Web Application',
                'short_desc'  => 'High-converting e‑commerce platform with product filters, cart, and checkout.',
                'full_desc'   => '<p>ShopEase is a complete e‑commerce solution built with Laravel, React, and MySQL.</p>
                                   <ul>
                                       <li>Product catalog with advanced filtering</li>
                                       <li>Shopping cart &amp; secure checkout</li>
                                       <li>Order tracking and admin dashboard</li>
                                   </ul>',
                'image'       => 'project-2.png',
                'link'        => 'https://example.com/shopease',
                'in_home'     => true,
                'is_featured' => true,
            ],
            [
                'short_title' => 'Portfolio Website',
                'full_title'  => 'Personal Portfolio & Blog for Developers',
                'short_desc'  => 'Clean portfolio & blog to showcase projects, skills, and technical articles.',
                'full_desc'   => '<p>Responsive personal portfolio with blog, case studies, and contact forms.</p>
                                   <ul>
                                       <li>Dynamic projects section</li>
                                       <li>Markdown-based blog engine</li>
                                       <li>Integrated contact form</li>
                                   </ul>',
                'image'       => 'project-3.png',
                'link'        => 'https://example.com/portfolio',
                'in_home'     => true,
                'is_featured' => true,
            ],
        ];

        foreach ($projects as $item) {
            $project = Project::firstOrCreate(
                ['slug' => Str::slug($item['full_title'])],
                [
                    'short_title' => $item['short_title'],
                    'full_title'  => $item['full_title'],
                    // store as plain strings (no JSON) to avoid JSON issues
                    'short_desc'  => strip_tags($item['short_desc']),
                    'full_desc'   => $item['full_desc'],
                    'category_id' => $defaultCategory->id,
                    'status'      => 'active',
                    'link'        => $item['link'],
                    'in_home'     => $item['in_home'],
                    'is_featured' => $item['is_featured'],
                ]
            );

            // Attach image if none exists
            if ($project->image()->doesntExist() && ! empty($item['image'])) {
                $sourcePath = public_path('assets/frontend/img/projects/' . $item['image']);
                if (is_file($sourcePath)) {
                    $fileName = $item['image'];

                    if (! Storage::disk('projects_images')->exists($fileName)) {
                        Storage::disk('projects_images')->put($fileName, file_get_contents($sourcePath));
                    }

                    Media::create([
                        'mediaable_id'   => $project->id,
                        'mediaable_type' => Project::class,
                        'file_name'      => $fileName,
                    ]);
                }
            }
        }
    }
}
