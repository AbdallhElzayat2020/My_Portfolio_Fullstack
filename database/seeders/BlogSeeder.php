<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        Blog::truncate();
        Media::where('mediaable_type', Blog::class)->delete();

        // Ensure we have categories
        $defaultCategory = Category::first() ?? Category::create([
            'name' => 'Web Development',
            'slug' => Str::slug('Web Development'),
            'status' => 'active',
        ]);

        $blogsData = [
            [
                'full_name' => 'Getting Started with Laravel 11: A Complete Guide',
                'short_name' => 'Laravel 11 Guide',
                'short_desc' => '<p>Learn the fundamentals of Laravel 11 and build your first application with this comprehensive guide.</p>',
                'full_desc' => '<h2>Introduction to Laravel 11</h2><p>Laravel 11 brings exciting new features and improvements to the PHP framework ecosystem. In this comprehensive guide, we\'ll explore everything you need to know to get started.</p><h3>Key Features</h3><ul><li>Improved performance and speed</li><li>Enhanced developer experience</li><li>Better security features</li><li>Modern PHP 8.2+ support</li></ul><p>Whether you\'re a beginner or an experienced developer, this guide will help you master Laravel 11.</p>',
                'image' => 'blog-img-1.jpg',
            ],
            [
                'full_name' => 'Building Modern UIs with React and Tailwind CSS',
                'short_name' => 'React & Tailwind',
                'short_desc' => '<p>Discover how to create beautiful and responsive user interfaces using React and Tailwind CSS.</p>',
                'full_desc' => '<h2>Modern UI Development</h2><p>React and Tailwind CSS are a powerful combination for building modern web applications. This article covers best practices and advanced techniques.</p><h3>What You\'ll Learn</h3><ul><li>Component architecture</li><li>Responsive design patterns</li><li>Performance optimization</li><li>Accessibility best practices</li></ul><p>Start building beautiful UIs today!</p>',
                'image' => 'blog-img-2.jpg',
            ],
            [
                'full_name' => 'Mastering API Development with Laravel',
                'short_name' => 'Laravel APIs',
                'short_desc' => '<p>A deep dive into building robust RESTful APIs using Laravel\'s powerful features.</p>',
                'full_desc' => '<h2>API Development Best Practices</h2><p>Building APIs is a crucial skill for modern developers. Laravel provides excellent tools for creating scalable and maintainable APIs.</p><h3>Topics Covered</h3><ul><li>RESTful API design</li><li>Authentication and authorization</li><li>API versioning</li><li>Error handling and validation</li><li>Testing strategies</li></ul><p>Learn how to build production-ready APIs.</p>',
                'image' => 'blog-img-3.jpg',
            ],
            [
                'full_name' => 'Vue.js 3 Composition API: Complete Tutorial',
                'short_name' => 'Vue 3 Tutorial',
                'short_desc' => '<p>Explore the new Composition API in Vue.js 3 and learn how to write more maintainable code.</p>',
                'full_desc' => '<h2>Vue.js 3 Composition API</h2><p>The Composition API is one of the most significant changes in Vue.js 3. It provides a more flexible way to organize component logic.</p><h3>Benefits</h3><ul><li>Better code organization</li><li>Improved reusability</li><li>TypeScript support</li><li>Better performance</li></ul><p>Transform your Vue.js development workflow.</p>',
                'image' => 'blog-img-4.jpg',
            ],
            [
                'full_name' => 'Database Optimization Techniques for Laravel',
                'short_name' => 'DB Optimization',
                'short_desc' => '<p>Learn advanced database optimization techniques to improve your Laravel application\'s performance.</p>',
                'full_desc' => '<h2>Database Performance</h2><p>Database optimization is crucial for application performance. This guide covers indexing, query optimization, and caching strategies.</p><h3>Key Strategies</h3><ul><li>Proper indexing</li><li>Query optimization</li><li>Eager loading</li><li>Caching strategies</li><li>Database scaling</li></ul><p>Make your application faster and more efficient.</p>',
                'image' => 'blog-img-5.jpg',
            ],
            [
                'full_name' => 'Deploying Laravel Applications: A Step-by-Step Guide',
                'short_name' => 'Laravel Deployment',
                'short_desc' => '<p>Everything you need to know about deploying Laravel applications to production servers.</p>',
                'full_desc' => '<h2>Production Deployment</h2><p>Deploying applications can be challenging. This comprehensive guide covers everything from server setup to CI/CD pipelines.</p><h3>Deployment Steps</h3><ul><li>Server configuration</li><li>Environment setup</li><li>Database migrations</li><li>SSL certificates</li><li>Monitoring and logging</li></ul><p>Deploy with confidence!</p>',
                'image' => 'blog-img-6.jpg',
            ],
        ];

        $sourcePath = public_path('assets/frontend/img/blog');
        $destinationPath = public_path('uploads/blogs');

        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        foreach ($blogsData as $data) {
            $blog = Blog::create([
                'full_name' => $data['full_name'],
                'short_name' => $data['short_name'],
                'short_desc' => $data['short_desc'],
                'full_desc' => $data['full_desc'],
                'slug' => Str::slug($data['full_name']),
                'category_id' => $defaultCategory->id,
                'status' => 'active',
            ]);

            $imageFileName = $data['image'];
            $sourceFile = $sourcePath . '/' . $imageFileName;

            if (File::exists($sourceFile)) {
                $newFileName = time() . '_' . Str::uuid() . '.' . File::extension($imageFileName);
                File::copy($sourceFile, $destinationPath . '/' . $newFileName);

                Media::create([
                    'mediaable_id' => $blog->id,
                    'mediaable_type' => Blog::class,
                    'file_name' => $newFileName,
                ]);
            }
        }
    }
}
