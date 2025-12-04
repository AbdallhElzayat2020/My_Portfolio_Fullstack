<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::orderByDesc('id')->paginate(10);

        return view('dashboard.pages.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => ['required', 'string', 'max:255'],
            'client_description' => ['required', 'string', 'max:1000'],
            'job' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:active,inactive'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
        ]);

        $testimonial = Testimonial::create($validated);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('', $fileName, 'brands_logos');

            Media::create([
                'mediaable_id' => $testimonial->id,
                'mediaable_type' => Testimonial::class,
                'file_name' => $fileName,
            ]);
        }

        return redirect()
            ->route('testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        $testimonial->load('image');

        return view('dashboard.pages.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        $testimonial->load('image');

        return view('dashboard.pages.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'client_name' => ['required', 'string', 'max:255'],
            'client_description' => ['required', 'string', 'max:1000'],
            'job' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:active,inactive'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
        ]);

        $testimonial->update($validated);

        if ($request->hasFile('image')) {
            if ($testimonial->image()->exists()) {
                $old = $testimonial->image;
                Storage::disk('brands_logos')->delete($old->file_name);
                $old->delete();
            }

            $file = $request->file('image');
            $fileName = time() . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('', $fileName, 'brands_logos');

            Media::create([
                'mediaable_id' => $testimonial->id,
                'mediaable_type' => Testimonial::class,
                'file_name' => $fileName,
            ]);
        }

        return redirect()
            ->route('testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image()->exists()) {
            $old = $testimonial->image;
            Storage::disk('brands_logos')->delete($old->file_name);
            $old->delete();
        }

        $testimonial->delete();

        return redirect()
            ->route('testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}
