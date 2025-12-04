<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderByDesc('id')->paginate(10);

        return view('dashboard.pages.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => ['required', 'string', 'max:255'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:active,inactive'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,webp,svg', 'max:4096'],
        ]);

        $brand = Brand::create([
            'brand_name' => $validated['brand_name'],
            'alt_text' => $validated['alt_text'] ?? null,
            'status' => $validated['status'],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('', $fileName, 'brands_logos');

            Media::create([
                'mediaable_id' => $brand->id,
                'mediaable_type' => Brand::class,
                'file_name' => $fileName,
            ]);
        }

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        $brand->load('image');

        return view('dashboard.pages.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $brand->load('image');

        return view('dashboard.pages.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'brand_name' => ['required', 'string', 'max:255'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:active,inactive'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp,svg', 'max:4096'],
        ]);

        $brand->update([
            'brand_name' => $validated['brand_name'],
            'alt_text' => $validated['alt_text'] ?? null,
            'status' => $validated['status'],
        ]);

        if ($request->hasFile('image')) {
            if ($brand->image()->exists()) {
                $old = $brand->image;
                Storage::disk('brands_logos')->delete($old->file_name);
                $old->delete();
            }

            $file = $request->file('image');
            $fileName = time() . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('', $fileName, 'brands_logos');

            Media::create([
                'mediaable_id' => $brand->id,
                'mediaable_type' => Brand::class,
                'file_name' => $fileName,
            ]);
        }

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if ($brand->image()->exists()) {
            $old = $brand->image;
            Storage::disk('brands_logos')->delete($old->file_name);
            $old->delete();
        }

        $brand->delete();

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand deleted successfully.');
    }
}
