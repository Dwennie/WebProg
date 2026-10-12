@extends('layouts.blood')

@section('title', 'Create Administrator User - BloodCare')

@section('content')
    <div style="max-width: 650px; margin: 0 auto;">
        <div class="page-header">
            <div>
                <h1 class="page-title">Create Administrator User</h1>
                <p class="page-subtitle">Add a hospital administrator or coordination staff member with bcrypt hashed authentication.</p>
            </div>
            <div>
                <a href="{{ url('/admin') }}" class="btn btn-outline btn-sm">&larr; Back to Dashboard</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Staff Account Credentials</h2>
                <span class="badge badge-neutral">Security Hashing Enabled</span>
            </div>

            <div class="card-body">
                <form action="{{ url('/admin') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="name">Staff Member Full Name <span style="color: var(--primary);">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="e.g. Dr. Arthur Vance" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Official Email Address <span style="color: var(--primary);">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="e.g. arthur.vance@bloodcare.org" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="role">Administrative Role & Scope <span style="color: var(--primary);">*</span></label>
                        <select id="role" name="role" class="form-select" required>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>System Administrator (Full Management)</option>
                            <option value="medical_coordinator" {{ old('role') == 'medical_coordinator' ? 'selected' : '' }}>Medical Transfusion Coordinator</option>
                            <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Depot Staff / Data Officer</option>
                        </select>
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label" for="password">Password <span style="color: var(--primary);">*</span></label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Minimum 6 characters" required>
                            <div class="form-text">Encrypted with one-way bcrypt hashing.</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password_confirmation">Confirm Password <span style="color: var(--primary);">*</span></label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Re-enter password" required>
                        </div>
                    </div>

                    <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 24px;">
                        <a href="{{ url('/admin') }}" class="btn btn-outline">Cancel</a>
                        <button type="submit" class="btn btn-primary">Create Staff Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
