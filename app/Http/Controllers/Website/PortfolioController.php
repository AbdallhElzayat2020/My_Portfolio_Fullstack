<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Project;
use App\Models\AvailableForHire;

class PortfolioController extends Controller
{
    public function index()
    {

        $projects = Project::with(['image', 'category'])
            ->where('status', 'active')
            ->oldest()
            ->paginate(6);

        $isAvailableForHire = AvailableForHire::getStatus();

        return view('frontend.pages.portfolio', compact('projects', 'isAvailableForHire'));
    }

    public function showDetails($slug)
    {
        $project = Project::where('slug', $slug)->with(['image'])->first();
        if (!$project) {
            return redirect()->route('website.portfolio')->with('error', 'Project not found');
        }
        return view('frontend.pages.portfolio-details', compact('project'));
    }
}
