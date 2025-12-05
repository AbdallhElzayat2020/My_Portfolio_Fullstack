<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Testimonial;
use App\Models\Brand;
use App\Models\Number;
use App\Models\Faq;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Paginator::useBootstrap();

        View::composer('frontend.pages.*', function ($view) {
            $about = About::with('image')->latest()->first();
            $testimonials = Testimonial::with('image')
                ->where('status', 'active')
                ->latest()
                ->get();

            $brands = Brand::with('image')
                ->where('status', 'active')
                ->latest()
                ->take(12)
                ->get();

            $numbers = Number::latest()->first();

            $faqs = Faq::where('status', 'active')
                ->orderBy('order')
                ->latest()
                ->get();

            $view->with([
                'about' => $about,
                'testimonials' => $testimonials,
                'brands' => $brands,
                'numbers' => $numbers,
                'faqs' => $faqs,
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
