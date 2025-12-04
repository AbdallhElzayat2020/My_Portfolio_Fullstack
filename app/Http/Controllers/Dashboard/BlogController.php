<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with(['category', 'image'])->orderByDesc('id')->paginate(10);
        return view('dashboard.pages.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('dashboard.pages.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'short_name' => ['required', 'string', 'max:255'],
            'short_desc' => ['required', 'string', 'max:20000000'],
            'full_desc' => ['required', 'string', 'max:20000000'],
            'category_id' => ['required', 'exists:categories,id'],
            'status' => ['required', 'in:active,inactive'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:4096'],
        ]);

        $blog = Blog::create([
            'full_name' => $validated['full_name'],
            'short_name' => $validated['short_name'],
            'short_desc' => $validated['short_desc'],
            'full_desc' => $validated['full_desc'],
            'slug' => Str::slug($validated['full_name']),
            'category_id' => $validated['category_id'],
            'status' => $validated['status'],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('', $fileName, 'blogs_images');

            Media::create([
                'mediaable_id' => $blog->id,
                'mediaable_type' => Blog::class,
                'file_name' => $fileName,
            ]);
        }

        return redirect()
            ->route('blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog->load(['category', 'image']);
        return view('dashboard.pages.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $blog->load(['category', 'image']);
        $categories = Category::orderBy('name')->get();
        return view('dashboard.pages.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'short_name' => ['required', 'string', 'max:255'],
            'short_desc' => ['required', 'string', 'max:20000000'],
            'full_desc' => ['required', 'string', 'max:20000000'],
            'category_id' => ['required', 'exists:categories,id'],
            'status' => ['required', 'in:active,inactive'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:4096'],
        ]);

        $blog->update([
            'full_name' => $validated['full_name'],
            'short_name' => $validated['short_name'],
            'short_desc' => $validated['short_desc'],
            'full_desc' => $validated['full_desc'],
            'slug' => Str::slug($validated['full_name']),
            'category_id' => $validated['category_id'],
            'status' => $validated['status'],
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image()->exists()) {
                $old = $blog->image;
                Storage::disk('blogs_images')->delete($old->file_name);
                $old->delete();
            }

            $file = $request->file('image');
            $fileName = time() . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('', $fileName, 'blogs_images');

            Media::create([
                'mediaable_id' => $blog->id,
                'mediaable_type' => Blog::class,
                'file_name' => $fileName,
            ]);
        }

        return redirect()
            ->route('blogs.index')
            ->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->image()->exists()) {
            $old = $blog->image;
            Storage::disk('blogs_images')->delete($old->file_name);
            $old->delete();
        }

        $blog->delete();

        return redirect()
            ->route('blogs.index')
            ->with('success', 'Blog deleted successfully.');
    }
}
