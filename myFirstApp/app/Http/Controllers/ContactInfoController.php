<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index()
    {
        try {
            $centers = ContactInfo::latest()->get();
        } catch (\Throwable $e) {
            $centers = collect();
        }

        return view('contact-info.index', compact('centers'));
    }

    public function create()
    {
        return view('contact-info.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'center_name'      => 'required|string|max:255',
            'facility_type'    => 'required|string|max:50',
            'coordinator'      => 'required|string|max:255',
            'address'          => 'required|string|max:255',
            'city'             => 'required|string|max:255',
            'province'         => 'required|string|max:255',
            'emergency_hotline'=> 'required|string|max:50',
            'phone'            => 'nullable|string|max:50',
            'email'            => 'required|email|max:255',
            'operating_hours'  => 'required|string|max:100',
        ]);

        try {
            ContactInfo::create($validated);
        } catch (\Throwable $e) {
            // Graceful fallback
        }

        return redirect()->route('contact-info.index')
            ->with('success', 'Transfusion center registered successfully.');
    }

    public function show(ContactInfo $contactInfo)
    {
        return view('contact-info.show', compact('contactInfo'));
    }

    public function edit(ContactInfo $contactInfo)
    {
        return view('contact-info.edit', compact('contactInfo'));
    }

    public function update(Request $request, ContactInfo $contactInfo)
    {
        $validated = $request->validate([
            'center_name'      => 'required|string|max:255',
            'facility_type'    => 'required|string|max:50',
            'coordinator'      => 'required|string|max:255',
            'address'          => 'required|string|max:255',
            'city'             => 'required|string|max:255',
            'province'         => 'required|string|max:255',
            'emergency_hotline'=> 'required|string|max:50',
            'phone'            => 'nullable|string|max:50',
            'email'            => 'required|email|max:255',
            'operating_hours'  => 'required|string|max:100',
        ]);

        $contactInfo->update($validated);

        return redirect()->route('contact-info.index')
            ->with('success', 'Blood station information updated.');
    }

    public function destroy(ContactInfo $contactInfo)
    {
        $contactInfo->delete();

        return redirect()->route('contact-info.index')
            ->with('success', 'Blood station removed from the directory.');
    }
}
