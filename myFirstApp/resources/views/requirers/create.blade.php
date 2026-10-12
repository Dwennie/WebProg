@extends('layouts.blood')

@section('title', 'Register Healthcare Requirer - BloodCare')

@section('content')
    <div style="max-width: 800px; margin: 0 auto;">
        <div class="page-header">
            <div>
                <h1 class="page-title">Healthcare Requirer Onboarding</h1>
                <p class="page-subtitle">Register a licensed medical facility or humanitarian chapter to receive direct transfusion allocations.</p>
            </div>
            <div>
                <a href="{{ url('/requirers') }}" class="btn btn-outline btn-sm">&larr; Back to Requirers Directory</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Institutional Requirer Registration Form</h2>
                <span class="badge badge-neutral">Accreditation Review Required</span>
            </div>

            <div class="card-body">
                <form action="{{ url('/requirers') }}" method="POST">
                    @csrf

                    <!-- 1. Institution Particulars -->
                    <div class="section-label" style="margin-top: 0;">1. Institution Particulars</div>

                    <div class="form-group">
                        <label class="form-label" for="org_name">Official Organization / Hospital Name <span style="color: var(--primary);">*</span></label>
                        <input type="text" id="org_name" name="org_name" class="form-control" value="{{ old('org_name') }}" placeholder="e.g. Tagbilaran Community Hospital" required>
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label" for="category">Facility Category <span style="color: var(--primary);">*</span></label>
                            <select id="category" name="category" class="form-select" required>
                                <option value="hospital" {{ old('category') == 'hospital' ? 'selected' : '' }}>Tertiary / Secondary Hospital</option>
                                <option value="trauma_center" {{ old('category') == 'trauma_center' ? 'selected' : '' }}>Trauma & Surgical Center</option>
                                <option value="clinic" {{ old('category') == 'clinic' ? 'selected' : '' }}>Specialty / Dialysis Clinic</option>
                                <option value="red_cross" {{ old('category') == 'red_cross' ? 'selected' : '' }}>Humanitarian Organization / Red Cross</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="license_no">DOH License / Accreditation ID</label>
                            <input type="text" id="license_no" name="license_no" class="form-control" value="{{ old('license_no') }}" placeholder="e.g. DOH-TERT-0492">
                            <div class="form-text">Department of Health or institutional registration code.</div>
                        </div>
                    </div>

                    <!-- 2. Clinical Liaison -->
                    <div class="section-label">2. Clinical Coordinator & Contact Liaison</div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label" for="contact_person">Designated Coordinator Name <span style="color: var(--primary);">*</span></label>
                            <input type="text" id="contact_person" name="contact_person" class="form-control" value="{{ old('contact_person') }}" placeholder="e.g. Dr. Eduardo Ramos" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="designation">Designation / Role</label>
                            <input type="text" id="designation" name="designation" class="form-control" value="{{ old('designation') }}" placeholder="e.g. Head of Blood Bank / Hematology">
                        </div>
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label" for="phone">Emergency Dispatch Telephone <span style="color: var(--primary);">*</span></label>
                            <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="e.g. +63 (38) 411-2233" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">Official Institution Email <span style="color: var(--primary);">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="e.g. dispatch@hospital.med.ph" required>
                        </div>
                    </div>

                    <!-- 3. Facility Location -->
                    <div class="section-label">3. Facility Delivery Location</div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label" for="city">City / Municipality <span style="color: var(--primary);">*</span></label>
                            <input type="text" id="city" name="city" class="form-control" value="{{ old('city', 'Tagbilaran City') }}" placeholder="e.g. Tagbilaran City" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="province">Province / Region <span style="color: var(--primary);">*</span></label>
                            <input type="text" id="province" name="province" class="form-control" value="{{ old('province', 'Bohol') }}" placeholder="e.g. Bohol" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="address">Full Physical Address / Depot Delivery Bay</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" placeholder="e.g. Medical Depot Wing, Hospital Compound, Cogon District">
                    </div>

                    <div style="background-color: var(--bg-page); border: 1px solid var(--border-color); border-radius: var(--radius); padding: 16px; margin-bottom: 20px;">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="compliance" name="compliance" required>
                            <label class="form-check-label" for="compliance">
                                <strong>Transfusion Safety Protocol Commitment:</strong> The registering healthcare facility verifies that it possesses certified cold-chain storage equipment (1°C to 6°C), adheres to national blood transfusion standards, and ensures that cross-matching is performed by licensed medical technologists.
                            </label>
                        </div>
                    </div>

                    <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 24px;">
                        <a href="{{ url('/requirers') }}" class="btn btn-outline">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit Requirer Application</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
