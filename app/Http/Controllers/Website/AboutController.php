<?php

namespace App\Http\Controllers\Website;

use App\Models\About;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        // Get latest 4 active blogs
        $latestBlogs = Blog::with(['category', 'image'])
            ->where('status', 'active')
            ->orderByDesc('id')
            ->take(4)
            ->get();

        return view('frontend.pages.about', compact('latestBlogs'));
    }
}
