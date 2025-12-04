<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        About::truncate();

        About::create([
            'name' => 'Abdullah Elzayat',
            'description' => [
                'intro' => 'A Passionate <span>Fullstack Laravel Developer</span> having <span>4 years</span> of experiences. Worked as a sole developer and in small teams, reporting to senior developers and product managers. Worked with people from all around the world and in different time zones, so I\'m confident in my communication skills.',
                'experience' => 'Full-stack web developer with 2 years of <span>Laravel</span> experience, 2 years of <span>React</span> experience, and 5 years of coding experience.',
            ],
            'email' => 'abdallhelzayat194@gmail.com',
            'phone' => '+201212484233',
            'facebook_link' => 'https://www.facebook.com/abdalla.elzayat.73/',
            'upwork_link' => 'https://www.upwork.com/freelancers/~0118efbb6f6aad23b8',
            'linkedin_link' => 'https://www.linkedin.com/in/abdallh-elzayat-924a00259/',
            'whatsapp_link' => 'https://wa.me/201212484233',
            'github_link' => 'https://github.com/AbdallhElzayat2020',
        ]);
    }
}
