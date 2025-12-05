<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Service;
use App\Models\AvailableForHire;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('image')
            ->where('status', 'active')
            ->latest()
            ->get();

        $isAvailableForHire = AvailableForHire::getStatus();

        return view('frontend.pages.services', compact('services', 'isAvailableForHire'));
    }
}
