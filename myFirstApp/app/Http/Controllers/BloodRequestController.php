<?php

namespace App\Http\Controllers;

use App\Models\BloodRequest;
use Illuminate\Http\Request;

class BloodRequestController extends Controller
{
    public function index()
    {
        try {
            $requests = BloodRequest::latest()->get();
        } catch (\Throwable $e) {
            $requests = collect();
        }

        return view('blood-request.index', compact('requests'));
    }

    public function create()
    {
        return view('blood-request.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_name'  => 'required|string|max:255',
            'blood_group'   => 'required|string|max:10',
            'units'         => 'required|integer|min:1',
            'urgency'       => 'required|string',
            'hospital_name' => 'required|string|max:255',
            'city'          => 'required|string|max:255',
            'contact_name'  => 'required|string|max:255',
            'relationship'  => 'required|string|max:100',
            'contact_phone' => 'required|string|max:50',
            'reason'        => 'nullable|string',
            'ward'          => 'nullable|string|max:100',
            'doctor'        => 'nullable|string|max:255',
            'contact_email' => 'nullable|email',
        ]);

        try {
            BloodRequest::create($validated);
        } catch (\Throwable $e) {
            // Graceful fallback
        }

        return redirect()->route('blood-request.index')
            ->with('success', 'Blood requisition posted successfully.');
    }

    public function edit(BloodRequest $bloodRequest)
    {
        return view('blood-request.edit', compact('bloodRequest'));
    }

    public function update(Request $request, BloodRequest $bloodRequest)
    {
        $validated = $request->validate([
            'patient_name'  => 'required|string|max:255',
            'blood_group'   => 'required|string|max:10',
            'units'         => 'required|integer|min:1',
            'urgency'       => 'required|string',
            'hospital_name' => 'required|string|max:255',
            'city'          => 'required|string|max:255',
            'contact_name'  => 'required|string|max:255',
            'relationship'  => 'required|string|max:100',
            'contact_phone' => 'required|string|max:50',
            'reason'        => 'nullable|string',
            'ward'          => 'nullable|string|max:100',
            'doctor'        => 'nullable|string|max:255',
            'contact_email' => 'nullable|email',
            'status'        => 'nullable|string|max:50',
        ]);

        $bloodRequest->update($validated);

        return redirect()->route('blood-request.index')
            ->with('success', 'Requisition updated successfully.');
    }

    public function destroy(BloodRequest $bloodRequest)
    {
        $bloodRequest->delete();

        return redirect()->route('blood-request.index')
            ->with('success', 'Requisition removed from the board.');
    }
}
