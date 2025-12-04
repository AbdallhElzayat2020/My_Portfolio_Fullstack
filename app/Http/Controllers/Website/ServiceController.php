<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('image')
            ->where('status', 'active')
            ->orderByDesc('id')
            ->paginate(12);

        return view('frontend.pages.services', compact('services'));
    }
}
