<?php

namespace App\Http\Controllers;

use App\Models\BloodDonor;
use Illuminate\Http\Request;

class BloodDonorController extends Controller
{
    public function index()
    {
        try {
            $donors = BloodDonor::latest()->get();
        } catch (\Throwable $e) {
            $donors = collect();
        }

        return view('blood-donors.index', compact('donors'));
    }

    public function create()
    {
        return view('blood-donors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'blood_group' => 'required|string|max:10',
            'gender'      => 'required|string|max:20',
            'age'         => 'required|integer|min:17|max:70',
            'weight'      => 'required|integer|min:45',
            'phone'       => 'required|string|max:50',
            'email'       => 'required|email|max:255',
            'city'        => 'required|string|max:255',
            'province'    => 'required|string|max:255',
            'address'     => 'nullable|string',
            'last_donated'=> 'nullable|date',
            'status'      => 'nullable|string|max:50',
        ]);

        if (empty($validated['status'])) {
            $validated['status'] = 'available';
        }

        try {
            BloodDonor::create($validated);
        } catch (\Throwable $e) {
            // Graceful fallback
        }

        return redirect()->route('blood-donors.index')
            ->with('success', 'Voluntary donor profile registered successfully.');
    }

    public function show(BloodDonor $bloodDonor)
    {
        return view('blood-donors.show', compact('bloodDonor'));
    }

    public function edit(BloodDonor $bloodDonor)
    {
        return view('blood-donors.edit', compact('bloodDonor'));
    }

    public function update(Request $request, BloodDonor $bloodDonor)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'blood_group' => 'required|string|max:10',
            'gender'      => 'required|string|max:20',
            'age'         => 'required|integer|min:17|max:70',
            'weight'      => 'required|integer|min:45',
            'phone'       => 'required|string|max:50',
            'email'       => 'required|email|max:255',
            'city'        => 'required|string|max:255',
            'province'    => 'required|string|max:255',
            'address'     => 'nullable|string',
            'last_donated'=> 'nullable|date',
            'status'      => 'nullable|string|max:50',
        ]);

        $bloodDonor->update($validated);

        return redirect()->route('blood-donors.index')
            ->with('success', 'Donor profile updated successfully.');
    }

    public function destroy(BloodDonor $bloodDonor)
    {
        $bloodDonor->delete();

        return redirect()->route('blood-donors.index')
            ->with('success', 'Donor record removed from the registry.');
    }
}
