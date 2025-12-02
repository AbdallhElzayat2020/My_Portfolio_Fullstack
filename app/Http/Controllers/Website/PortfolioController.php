<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('frontend.pages.portfolio');
    }

    public function showDetails()
    {
        return view('frontend.pages.portfolio-details');
    }
}
