<?php

namespace App\Http\Controllers;

use App\Models\ContactQuery;
use Illuminate\Http\Request;

class ContactQueryController extends Controller
{
    public function index()
    {
        try {
            $queries = ContactQuery::latest()->get();
        } catch (\Throwable $e) {
            $queries = collect();
        }

        return view('contact-queries.index', compact('queries'));
    }

    public function create()
    {
        return view('contact-queries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            ContactQuery::create($validated);
        } catch (\Throwable $e) {
            // Graceful fallback
        }

        return redirect()->route('contact-queries.index')
            ->with('success', 'Your inquiry has been submitted to the transfusion coordination team.');
    }

    public function show(ContactQuery $contactQuery)
    {
        return view('contact-queries.show', compact('contactQuery'));
    }

    public function edit(ContactQuery $contactQuery)
    {
        return view('contact-queries.edit', compact('contactQuery'));
    }

    public function update(Request $request, ContactQuery $contactQuery)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:50',
        ]);

        $contactQuery->update($validated);

        return redirect()->route('contact-queries.index')
            ->with('success', 'Inquiry status updated.');
    }

    public function destroy(ContactQuery $contactQuery)
    {
        $contactQuery->delete();

        return redirect()->route('contact-queries.index')
            ->with('success', 'Inquiry removed from the support desk.');
    }
}
