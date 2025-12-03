<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tools = Tool::with('image')
            ->where('status', 'active')
            ->get();

        return view('frontend.pages.home', compact('tools'));
    }
}
