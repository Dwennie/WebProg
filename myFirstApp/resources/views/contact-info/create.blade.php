@extends('layouts.blood')

@section('title', 'Register Transfusion Station - BloodCare')

@section('content')
    <div style="max-width: 800px; margin: 0 auto;">
        <div class="page-header">
            <div>
                <h1 class="page-title">Register Transfusion Station</h1>
                <p class="page-subtitle">Add a certified cold-chain blood depot or hospital transfusion department to the network directory.</p>
            </div>
            <div>
                <a href="{{ url('/contact-info') }}" class="btn btn-outline btn-sm">&larr; Back to Stations Directory</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Blood Station Specifications Form</h2>
                <span class="badge badge-neutral">Clinical Facility</span>
            </div>

            <div class="card-body">
                <form action="{{ url('/contact-info') }}" method="POST">
                    @csrf

                    <!-- 1. Station Details -->
                    <div class="section-label" style="margin-top: 0;">1. Facility Identification</div>

                    <div class="form-group">
                        <label class="form-label" for="center_name">Official Center / Station Name <span style="color: var(--primary);">*</span></label>
                        <input type="text" id="center_name" name="center_name" class="form-control" value="{{ old('center_name') }}" placeholder="e.g. Bohol Regional Transfusion & Blood Depot" required>
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label" for="facility_type">Facility Category <span style="color: var(--primary);">*</span></label>
                            <select id="facility_type" name="facility_type" class="form-select" required>
                                <option value="central_blood_bank" {{ old('facility_type') == 'central_blood_bank' ? 'selected' : '' }}>Central Blood Bank & Depot</option>
                                <option value="hospital_station" {{ old('facility_type') == 'hospital_station' ? 'selected' : '' }}>Hospital Transfusion Service</option>
                                <option value="mobile_depot" {{ old('facility_type') == 'mobile_depot' ? 'selected' : '' }}>Mobile Collection Depot</option>
                                <option value="screening_lab" {{ old('facility_type') == 'screening_lab' ? 'selected' : '' }}>Regional Screening Laboratory</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="operating_hours">Operating Schedule <span style="color: var(--primary);">*</span></label>
                            <input type="text" id="operating_hours" name="operating_hours" class="form-control" value="{{ old('operating_hours', '24/7 Transfusion Service') }}" placeholder="e.g. 24/7 Continuous or 08:00 - 17:00" required>
                        </div>
                    </div>

                    <!-- 2. Supervision & Emergency Contacts -->
                    <div class="section-label">2. Clinical Supervision & Dispatch Hotlines</div>

                    <div class="form-group">
                        <label class="form-label" for="coordinator">Medical Director / Supervising Pathologist <span style="color: var(--primary);">*</span></label>
                        <input type="text" id="coordinator" name="coordinator" class="form-control" value="{{ old('coordinator') }}" placeholder="e.g. Dr. Patricia Salcedo, MD" required>
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label" for="emergency_hotline">24-Hour Emergency Dispatch Line <span style="color: var(--primary);">*</span></label>
                            <input type="tel" id="emergency_hotline" name="emergency_hotline" class="form-control" value="{{ old('emergency_hotline') }}" placeholder="e.g. +63 (38) 411-9988" required>
                            <div class="form-text">Directly routed to the on-call transfusion technologist.</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="phone">Administrative Telephone</label>
                            <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="e.g. +63 (38) 411-0022">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Official Transfusion Desk Email <span style="color: var(--primary);">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="e.g. blooddepot@doh.gov.ph" required>
                    </div>

                    <!-- 3. Physical Depot Address -->
                    <div class="section-label">3. Physical Depot Address & Cold Storage</div>

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
                        <label class="form-label" for="address">Street & Building Address <span style="color: var(--primary);">*</span></label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" placeholder="e.g. Regional Medical Compound, J.A. Clarin St." required>
                    </div>

                    <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 24px;">
                        <a href="{{ url('/contact-info') }}" class="btn btn-outline">Cancel</a>
                        <button type="submit" class="btn btn-primary">Publish Blood Station</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
