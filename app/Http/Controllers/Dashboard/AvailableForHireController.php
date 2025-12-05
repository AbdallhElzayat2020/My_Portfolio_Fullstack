<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AvailableForHire;
use Illuminate\Http\Request;

class AvailableForHireController extends Controller
{
    public function index()
    {
        return redirect()->route('available-for-hire.edit');
    }

    public function create()
    {
        return redirect()->route('available-for-hire.edit');
    }

    public function store(Request $request)
    {
        return redirect()->route('available-for-hire.edit');
    }

    public function show()
    {
        return redirect()->route('available-for-hire.edit');
    }

    public function edit()
    {
        $availableForHire = AvailableForHire::first() ?? new AvailableForHire();

        return view('dashboard.pages.available-for-hire.edit', compact('availableForHire'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'status' => ['required', 'boolean'],
        ]);

        $availableForHire = AvailableForHire::first() ?? new AvailableForHire();
        $availableForHire->status = $validated['status'];
        $availableForHire->save();

        return redirect()
            ->route('available-for-hire.edit')
            ->with('success', 'Availability status updated successfully.');
    }

    public function destroy()
    {
        return redirect()->route('available-for-hire.edit');
    }
}
