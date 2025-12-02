<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Testimonial;
use App\Models\Brand;
use App\Models\About;
use App\Models\Media;
use App\Models\Tool;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the dashboard home page.
     */
    public function index()
    {
        $stats = [
            [
                'key' => 'categories',
                'label' => 'Categories',
                'total' => Category::count(),
                'active' => Category::where('status', 'active')->count(),
                'inactive' => Category::where('status', 'inactive')->count(),
            ],
            [
                'key' => 'blogs',
                'label' => 'Blogs',
                'total' => Blog::count(),
                'active' => Blog::where('status', 'active')->count(),
                'inactive' => Blog::where('status', 'inactive')->count(),
            ],
            [
                'key' => 'services',
                'label' => 'Services',
                'total' => Service::count(),
                'active' => null,
                'inactive' => null,
            ],
            [
                'key' => 'projects',
                'label' => 'Projects',
                'total' => Project::count(),
                'active' => Project::where('status', 'active')->count(),
                'inactive' => Project::where('status', 'inactive')->count(),
            ],
            [
                'key' => 'contacts',
                'label' => 'Contacts',
                'total' => Contact::count(),
                'active' => null,
                'inactive' => null,
            ],
            [
                'key' => 'testimonials',
                'label' => 'Testimonials',
                'total' => Testimonial::count(),
                'active' => Testimonial::where('status', 'active')->count(),
                'inactive' => Testimonial::where('status', 'inactive')->count(),
            ],
            [
                'key' => 'brands',
                'label' => 'Brands',
                'total' => Brand::count(),
                'active' => Brand::where('status', 'active')->count(),
                'inactive' => Brand::where('status', 'inactive')->count(),
            ],
            [
                'key' => 'media',
                'label' => 'Media',
                'total' => Media::count(),
                'active' => null,
                'inactive' => null,
            ],
            [
                'key' => 'technologies',
                'label' => 'Tools',
                'total' => Tool::count(),
                'active' => Tool::where('status', 'active')->count(),
                'inactive' => Tool::where('status', 'inactive')->count(),
            ],
        ];

        return view('dashboard.pages.home', compact('stats'));
    }
}
