<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $services = Service::with('image')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })

            ->paginate(15)
            ->withQueryString();

        return view('dashboard.pages.services.index', compact('services', 'search'));
    }

    public function create()
    {
        return view('dashboard.pages.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:active,inactive'],
            'icon' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg,webp', 'max:2048'],
        ]);

        $service = Service::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
            'status' => $validated['status'],
        ]);

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $fileName = time() . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('', $fileName, 'services_images');

            Media::create([
                'mediaable_id' => $service->id,
                'mediaable_type' => Service::class,
                'file_name' => $fileName,
            ]);
        }

        return redirect()
            ->route('services.index')
            ->with('success', 'Service created successfully.');
    }

    public function show(Service $service)
    {
        $service->load('image');

        return view('dashboard.pages.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        $service->load('image');

        return view('dashboard.pages.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:active,inactive'],
            'icon' => ['nullable',  'max:2048'],
        ]);

        $service->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
            'status' => $validated['status'],
        ]);

        if ($request->hasFile('icon')) {
            if ($service->image) {
                Storage::disk('services_images')->delete($service->image->file_name);
                $service->image->delete();
            }

            $file = $request->file('icon');
            $fileName = time() . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('', $fileName, 'services_images');

            Media::create([
                'mediaable_id' => $service->id,
                'mediaable_type' => Service::class,
                'file_name' => $fileName,
            ]);
        }

        return redirect()
            ->route('services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('services_images')->delete($service->image->file_name);
            $service->image->delete();
        }

        $service->delete();

        return redirect()
            ->route('services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
