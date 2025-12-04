<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Tool;

class HomeController extends Controller
{
    public function index()
    {
        $tools = Tool::with('image')
            ->where('status', 'active')
            ->get();

        $about = About::with('image')->latest()->first();

        return view('frontend.pages.home', compact('tools', 'about'));
    }
}
