<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::with('image')->latest()->first();

        return view('dashboard.pages.about.edit', compact('about'));
    }

    public function create()
    {
        return redirect()->route('abouts.index');
    }

    public function store(Request $request)
    {
        return redirect()->route('abouts.index');
    }

    public function show(About $about)
    {
        return redirect()->route('abouts.index');
    }

    public function edit()
    {
        $about = About::with('image')->latest()->first();

        return view('dashboard.pages.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'intro' => ['required', 'string'],
            'experience' => ['required', 'string'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'facebook_link' => ['nullable', 'url', 'max:255'],
            'upwork_link' => ['nullable', 'url', 'max:255'],
            'linkedin_link' => ['nullable', 'url', 'max:255'],
            'whatsapp_link' => ['nullable', 'url', 'max:255'],
            'github_link' => ['nullable', 'url', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
        ]);

        $about = About::first() ?? new About();
        $about->name = $validated['name'];
        $about->description = [
            'intro' => $validated['intro'],
            'experience' => $validated['experience'],
        ];
        $about->email = $validated['email'];
        $about->phone = $validated['phone'];
        $about->facebook_link = $validated['facebook_link'] ?? null;
        $about->upwork_link = $validated['upwork_link'] ?? null;
        $about->linkedin_link = $validated['linkedin_link'] ?? null;
        $about->whatsapp_link = $validated['whatsapp_link'] ?? null;
        $about->github_link = $validated['github_link'] ?? null;
        $about->save();

        if ($request->hasFile('image')) {
            if ($about->image) {
                Storage::disk('about')->delete($about->image->file_name);
                $about->image->delete();
            }

            $file = $request->file('image');
            $fileName = time() . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('', $fileName, 'about');

            Media::create([
                'mediaable_id' => $about->id,
                'mediaable_type' => About::class,
                'file_name' => $fileName,
            ]);
        }

        return redirect()
            ->route('abouts.index')
            ->with('success', 'About information updated successfully.');
    }

    public function destroy(About $about)
    {
        return redirect()->route('abouts.index');
    }
}
