<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        Faq::truncate();

        $faqs = [
            [
                'question' => 'What does a product designer need to know?',
                'answer' => 'I\'m here to help if you\'re searching for a product designer to bring your idea to life or a design partner to help take your business to the next level. A product designer should understand user experience, visual design, prototyping, and user research.',
                'status' => 'active',
                'order' => 1,
            ],
            [
                'question' => 'How long does it take to complete a project?',
                'answer' => 'Project timelines vary depending on the scope and complexity. A simple website might take 2-4 weeks, while a complex web application could take 2-3 months. I always provide detailed timelines during our initial consultation.',
                'status' => 'active',
                'order' => 2,
            ],
            [
                'question' => 'What technologies do you work with?',
                'answer' => 'I specialize in Laravel, React, Vue.js, Livewire, and modern JavaScript frameworks. I also work with MySQL, MongoDB, Tailwind CSS, Bootstrap, and various APIs. I stay updated with the latest technologies and best practices.',
                'status' => 'active',
                'order' => 3,
            ],
            [
                'question' => 'Do you provide ongoing support after project completion?',
                'answer' => 'Yes, I offer maintenance and support packages to ensure your project continues to run smoothly. This includes bug fixes, updates, security patches, and feature additions. We can discuss a support plan that fits your needs.',
                'status' => 'active',
                'order' => 4,
            ],
            [
                'question' => 'What is your pricing structure?',
                'answer' => 'Pricing depends on project scope, complexity, and timeline. I provide detailed quotes after understanding your requirements. I offer both fixed-price and hourly rate options. Let\'s discuss your project to determine the best pricing model.',
                'status' => 'active',
                'order' => 5,
            ],
            [
                'question' => 'Can you work with existing codebases?',
                'answer' => 'Absolutely! I have experience working with legacy codebases and can help modernize, refactor, or extend existing applications. I can work with various frameworks and technologies, adapting to your current tech stack.',
                'status' => 'active',
                'order' => 6,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
