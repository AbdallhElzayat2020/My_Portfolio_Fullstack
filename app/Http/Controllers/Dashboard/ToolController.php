<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tools = Tool::with('image')->paginate(15);

        return view('dashboard.pages.technologies.index', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:active,inactive'],
            'icon' => ['nullable', 'max:4096'],
        ]);

        $tool = Tool::create([
            'name' => $validated['name'],
            'status' => $validated['status'],
        ]);

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $file_name = time() . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('/', $file_name, 'tools');

            Media::create([
                'mediaable_id' => $tool->id,
                'mediaable_type' => Tool::class,
                'file_name' => $path,
            ]);
        }
        return redirect()
            ->route('technologies.index')
            ->with('success', 'Technology created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tool $technology)
    {
        $technology->load('image');

        return view('dashboard.pages.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tool $technology)
    {
        $technology->load('image');

        return view('dashboard.pages.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tool $technology)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:active,inactive'],
            'icon' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg,webp', 'max:2048'],
        ]);

        $technology->update([
            'name' => $validated['name'],
            'status' => $validated['status'],
        ]);

        if ($request->hasFile('icon')) {
            // delete old image file if exists
            if ($technology->image) {
                Storage::disk('tools')->delete($technology->image->file_name);
                $technology->image->delete();
            }

            $file = $request->file('icon');
            $file_name = time() . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('tools', $file_name, 'tools');

            Media::create([
                'mediaable_id' => $technology->id,
                'mediaable_type' => Tool::class,
                'file_name' => $path,
            ]);
        }

        return redirect()
            ->route('technologies.index')
            ->with('success', 'Technology updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tool $technology)
    {
        if ($technology->image) {
            Storage::disk('tools')->delete($technology->image->file_name);
            $technology->image->delete();
        }

        $technology->delete();

        return redirect()
            ->route('technologies.index')
            ->with('success', 'Technology deleted successfully.');
    }
}
