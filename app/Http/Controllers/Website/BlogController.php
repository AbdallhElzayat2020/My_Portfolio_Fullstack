<?php

namespace App\Http\Controllers\Website;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with(['category', 'image'])
            ->where('status', 'active')
            ->orderByDesc('id')
            ->paginate(6);

        return view('frontend.pages.blog', compact('blogs'));
    }

    public function showDetails($slug)
    {
        $blog = Blog::with(['category', 'image'])
            ->where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        // Get related blogs (same category, excluding current blog)
        $relatedBlogs = Blog::with(['category', 'image'])
            ->where('status', 'active')
            ->where('category_id', $blog->category_id)
            ->where('id', '!=', $blog->id)
            ->orderByDesc('id')
            ->take(2)
            ->get();

        return view('frontend.pages.blog-details', compact('blog', 'relatedBlogs'));
    }
}
