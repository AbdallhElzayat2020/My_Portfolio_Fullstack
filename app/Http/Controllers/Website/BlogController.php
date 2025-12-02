<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('frontend.pages.blog');
    }

    public function showDetails()
    {
        return view('frontend.pages.blog-details');
    }
}
