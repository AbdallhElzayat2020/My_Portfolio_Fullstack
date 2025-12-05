<?php

namespace App\Http\Controllers\Website;

use App\Models\Contact;
use App\Models\Service;
use App\Models\AvailableForHire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $services = Service::where('status', 'active')->get();
        $isAvailableForHire = AvailableForHire::getStatus();

        return view('frontend.pages.contact', compact('services', 'isAvailableForHire'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'service_id' => ['required', 'exists:services,id'],
            'phone_number' => ['required', 'string', 'max:255'],
        ]);

        Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
            'status' => 'pending',
            'service_id' => $validated['service_id'],
            'phone_number' => $validated['phone_number'],
        ]);

        return redirect()
            ->route('website.contact')
            ->with('success', 'Thank you! Your message has been sent successfully. We will get back to you soon.');
    }
}
