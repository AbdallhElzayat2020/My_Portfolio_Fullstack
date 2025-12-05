<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Tool;
use App\Models\Service;
use App\Models\Project;
use App\Models\AvailableForHire;

class HomeController extends Controller
{
    public function index()
    {
        $tools = Tool::with('image')
            ->where('status', 'active')
            ->get();

        // $about = About::with(['image'])->latest()->first();

        $services = Service::with('image')
            ->where('status', 'active')
            ->orderByDesc('id')
            ->take(4)
            ->get();

        $homeProjects = Project::with(['image', 'category'])
            ->where('status', 'active')
            ->where('in_home', true)
            ->where('is_featured', true)
            ->oldest()
            ->take(3)
            ->get();

        $isAvailableForHire = AvailableForHire::getStatus();

        return view('frontend.pages.home', compact('tools', 'services', 'homeProjects', 'isAvailableForHire'));
    }
}
