<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Number;
use Illuminate\Http\Request;

class NumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $numbers = Number::orderByDesc('id')->paginate(10);
        return view('dashboard.pages.numbers.index', compact('numbers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.numbers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'experience_year' => ['required', 'string', 'max:255'],
            'complete_project' => ['required', 'string', 'max:255'],
            'happy_client' => ['required', 'string', 'max:255'],
        ]);

        Number::create($validated);

        return redirect()
            ->route('main-steps.index')
            ->with('success', 'Numbers created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Number $number)
    {
        return view('dashboard.pages.numbers.show', compact('number'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Number $number)
    {
        return view('dashboard.pages.numbers.edit', compact('number'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Number $number)
    {
        $validated = $request->validate([
            'experience_year' => ['required', 'string', 'max:255'],
            'complete_project' => ['required', 'string', 'max:255'],
            'happy_client' => ['required', 'string', 'max:255'],
        ]);

        $number->update($validated);

        return redirect()
            ->route('main-steps.index')
            ->with('success', 'Numbers updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Number $number)
    {
        $number->delete();

        return redirect()
            ->route('main-steps.index')
            ->with('success', 'Numbers deleted successfully.');
    }
}
