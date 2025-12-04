<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Media;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $projects = Project::with(['category', 'image'])
            ->when($search, function ($query, $search) {
                $query->where('short_title', 'like', '%' . $search . '%')
                    ->orWhere('full_title', 'like', '%' . $search . '%');
            })
            ->paginate(15)
            ->withQueryString();

        return view('dashboard.pages.projects.index', compact('projects', 'search'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('dashboard.pages.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'short_title' => ['required', 'string', 'max:255'],
            'full_title' => ['required', 'string', 'max:255'],
            'short_desc' => ['required', 'string', 'max:20000000'],
            'full_desc' => ['required', 'string', 'max:200000'],
            'category_id' => ['required', 'exists:categories,id'],
            'status' => ['required', 'in:active,inactive'],
            'link' => ['nullable', 'url', 'max:255'],
            'in_home' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:4096'],
        ]);

        $project = Project::create([
            'short_title' => $validated['short_title'],
            'full_title' => $validated['full_title'],
            'short_desc' => $validated['short_desc'],
            'full_desc' => $validated['full_desc'],
            'slug' => Str::slug($validated['full_title']),
            'category_id' => $validated['category_id'],
            'status' => $validated['status'],
            'link' => $validated['link'] ?? null,
            'in_home' => $request->boolean('in_home'),
            'is_featured' => $request->boolean('is_featured'),
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('', $fileName, 'projects_images');

            Media::create([
                'mediaable_id' => $project->id,
                'mediaable_type' => Project::class,
                'file_name' => $fileName,
            ]);
        }

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        $project->load(['category', 'image']);

        return view('dashboard.pages.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $project->load(['category', 'image']);
        $categories = Category::orderBy('name')->get();

        return view('dashboard.pages.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'short_title' => ['required', 'string', 'max:255'],
            'full_title' => ['required', 'string', 'max:255'],
            'short_desc' => ['required', 'string', 'max:20000000'],
            'full_desc' => ['required', 'string',  'max:20000000'],
            'category_id' => ['required', 'exists:categories,id'],
            'status' => ['required', 'in:active,inactive'],
            'link' => ['nullable', 'url', 'max:255'],
            'in_home' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:4096'],
        ]);

        $project->update([
            'short_title' => $validated['short_title'],
            'full_title' => $validated['full_title'],
            'short_desc' => $validated['short_desc'],
            'full_desc' => $validated['full_desc'],
            'slug' => Str::slug($validated['full_title']),
            'category_id' => $validated['category_id'],
            'status' => $validated['status'],
            'link' => $validated['link'] ?? null,
            'in_home' => $request->boolean('in_home'),
            'is_featured' => $request->boolean('is_featured'),
        ]);

        if ($request->hasFile('image')) {
            if ($project->image()->exists()) {
                foreach ($project->image as $img) {
                    Storage::disk('projects_images')->delete($img->file_name);
                    $img->delete();
                }
            }

            $file = $request->file('image');
            $fileName = time() . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('', $fileName, 'projects_images');

            Media::create([
                'mediaable_id' => $project->id,
                'mediaable_type' => Project::class,
                'file_name' => $fileName,
            ]);
        }

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->image()->exists()) {
            foreach ($project->image as $img) {
                Storage::disk('projects_images')->delete($img->file_name);
                $img->delete();
            }
        }

        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
