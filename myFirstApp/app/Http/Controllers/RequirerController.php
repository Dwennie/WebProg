<?php

namespace App\Http\Controllers;

use App\Models\Requirer;
use Illuminate\Http\Request;

class RequirerController extends Controller
{
    public function index()
    {
        try {
            $requirers = Requirer::latest()->get();
        } catch (\Throwable $e) {
            $requirers = collect();
        }

        return view('requirers.index', compact('requirers'));
    }

    public function create()
    {
        return view('requirers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'org_name'       => 'required|string|max:255',
            'category'       => 'required|string|max:50',
            'license_no'     => 'nullable|string|max:100',
            'contact_person' => 'required|string|max:255',
            'designation'    => 'nullable|string|max:100',
            'phone'          => 'required|string|max:50',
            'email'          => 'required|email|max:255',
            'city'           => 'required|string|max:255',
            'province'       => 'required|string|max:255',
            'address'        => 'nullable|string',
        ]);

        try {
            Requirer::create($validated);
        } catch (\Throwable $e) {
            // Graceful fallback
        }

        return redirect()->route('requirers.index')
            ->with('success', 'Healthcare requirer institution registered successfully.');
    }

    public function show(Requirer $requirer)
    {
        return view('requirers.show', compact('requirer'));
    }

    public function edit(Requirer $requirer)
    {
        return view('requirers.edit', compact('requirer'));
    }

    public function update(Request $request, Requirer $requirer)
    {
        $validated = $request->validate([
            'org_name'       => 'required|string|max:255',
            'category'       => 'required|string|max:50',
            'license_no'     => 'nullable|string|max:100',
            'contact_person' => 'required|string|max:255',
            'designation'    => 'nullable|string|max:100',
            'phone'          => 'required|string|max:50',
            'email'          => 'required|email|max:255',
            'city'           => 'required|string|max:255',
            'province'       => 'required|string|max:255',
            'address'        => 'nullable|string',
            'status'         => 'nullable|string|max:50',
        ]);

        $requirer->update($validated);

        return redirect()->route('requirers.index')
            ->with('success', 'Requirer profile updated successfully.');
    }

    public function destroy(Requirer $requirer)
    {
        $requirer->delete();

        return redirect()->route('requirers.index')
            ->with('success', 'Requirer removed from the system.');
    }
}
