@extends('layouts.blood')

@section('title', 'Register as Voluntary Donor - BloodCare')

@section('content')
    <div style="max-width: 800px; margin: 0 auto;">
        <div class="page-header">
            <div>
                <h1 class="page-title">Voluntary Donor Registration</h1>
                <p class="page-subtitle">Your decision to donate can save up to 3 lives in critical medical situations.</p>
            </div>
            <div>
                <a href="{{ url('/blood-donors') }}" class="btn btn-outline btn-sm">&larr; Back to Donor Directory</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Donor Clinical Intake Form</h2>
                <span class="badge badge-neutral">Confidential Medical Record</span>
            </div>

            <div class="card-body">
                <form action="{{ url('/blood-donors') }}" method="POST">
                    @csrf

                    <!-- 1. Personal & Transfusion Profile -->
                    <div class="section-label" style="margin-top: 0;">1. Personal & Transfusion Profile</div>
                    
                    <div class="form-group">
                        <label class="form-label" for="name">Full Legal Name <span style="color: var(--primary);">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="e.g. Juan C. Dela Cruz" required>
                    </div>

                    <div class="grid-3">
                        <div class="form-group">
                            <label class="form-label" for="blood_group">Blood Group <span style="color: var(--primary);">*</span></label>
                            <select id="blood_group" name="blood_group" class="form-select" required>
                                <option value="">Select Group</option>
                                <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+ (Positive)</option>
                                <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>O- (Universal)</option>
                                <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+ (Positive)</option>
                                <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A- (Negative)</option>
                                <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+ (Positive)</option>
                                <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B- (Negative)</option>
                                <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+ (Positive)</option>
                                <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB- (Negative)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="gender">Sex <span style="color: var(--primary);">*</span></label>
                            <select id="gender" name="gender" class="form-select" required>
                                <option value="">Select Sex</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="age">Age (Years) <span style="color: var(--primary);">*</span></label>
                            <input type="number" id="age" name="age" class="form-control" min="17" max="70" value="{{ old('age', 24) }}" required>
                            <div class="form-text">Must be 17–70 years old.</div>
                        </div>
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label" for="weight">Body Weight (kg) <span style="color: var(--primary);">*</span></label>
                            <input type="number" id="weight" name="weight" class="form-control" min="45" value="{{ old('weight', 60) }}" placeholder="e.g. 62" required>
                            <div class="form-text">Minimum standard donor weight is 45 kg (100 lbs).</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="last_donated">Date of Last Donation</label>
                            <input type="date" id="last_donated" name="last_donated" class="form-control" value="{{ old('last_donated') }}">
                            <div class="form-text">Leave blank if this will be your first time.</div>
                        </div>
                    </div>

                    <!-- 2. Contact & Geographic Information -->
                    <div class="section-label">2. Contact & Geographic Location</div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label" for="phone">Active Mobile / Phone <span style="color: var(--primary);">*</span></label>
                            <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="e.g. +63 917 123 4567" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">Email Address <span style="color: var(--primary);">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="e.g. donor@example.com" required>
                        </div>
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label" for="city">City / Municipality <span style="color: var(--primary);">*</span></label>
                            <input type="text" id="city" name="city" class="form-control" value="{{ old('city') }}" placeholder="e.g. Tagbilaran City" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="province">Province / Region <span style="color: var(--primary);">*</span></label>
                            <input type="text" id="province" name="province" class="form-control" value="{{ old('province', 'Bohol') }}" placeholder="e.g. Bohol" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="address">Street / Barangay Residential Address</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" placeholder="e.g. 102 Cogon District">
                    </div>

                    <!-- 3. Consent & Medical Verification -->
                    <div class="section-label">3. Clinical Eligibility & Medical Consent</div>

                    <div style="background-color: var(--bg-page); border: 1px solid var(--border-color); border-radius: var(--radius); padding: 16px; margin-bottom: 20px;">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="consent" name="consent" required>
                            <label class="form-check-label" for="consent">
                                <strong>Clinical Pre-Screening Consent:</strong> I confirm that I am in good overall physical health, free from infectious blood-borne conditions (such as HIV, Hepatitis B/C, Syphilis), have not undergone major surgical procedures or tattooing within the last 12 months, and voluntarily consent to being contacted by hospital blood coordinators during emergency requisitions.
                            </label>
                        </div>
                    </div>

                    <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 24px;">
                        <a href="{{ url('/blood-donors') }}" class="btn btn-outline">Cancel</a>
                        <button type="submit" class="btn btn-primary">Complete Donor Registration</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
