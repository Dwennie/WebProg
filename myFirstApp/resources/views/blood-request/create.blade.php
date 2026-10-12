@extends('layouts.blood')

@section('title', 'Submit Blood Requisition - BloodCare')

@section('content')
    <div style="max-width: 800px; margin: 0 auto;">
        <div class="page-header">
            <div>
                <h1 class="page-title">Submit Blood Requisition</h1>
                <p class="page-subtitle">Post a hospital transfusion requisition to alert matching voluntary donors and local depots.</p>
            </div>
            <div>
                <a href="{{ url('/blood-request') }}" class="btn btn-outline btn-sm">&larr; Back to Requests</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Patient Transfusion Requisition Form</h2>
                <span class="badge badge-blood">Clinical Dispatch</span>
            </div>

            <div class="card-body">
                <form action="{{ url('/blood-request') }}" method="POST">
                    @csrf

                    <!-- 1. Patient & Transfusion Specifics -->
                    <div class="section-label" style="margin-top: 0;">1. Patient & Transfusion Specifications</div>

                    <div class="form-group">
                        <label class="form-label" for="patient_name">Patient's Full Name <span style="color: var(--primary);">*</span></label>
                        <input type="text" id="patient_name" name="patient_name" class="form-control" value="{{ old('patient_name') }}" placeholder="e.g. Maria Clara Santos" required>
                    </div>

                    <div class="grid-3">
                        <div class="form-group">
                            <label class="form-label" for="blood_group">Required Blood Group <span style="color: var(--primary);">*</span></label>
                            <select id="blood_group" name="blood_group" class="form-select" required>
                                <option value="">Select Group</option>
                                <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+ (Positive)</option>
                                <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>O- (Negative)</option>
                                <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+ (Positive)</option>
                                <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A- (Negative)</option>
                                <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+ (Positive)</option>
                                <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B- (Negative)</option>
                                <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+ (Positive)</option>
                                <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB- (Negative)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="units">Units Required (Bags) <span style="color: var(--primary);">*</span></label>
                            <input type="number" id="units" name="units" class="form-control" min="1" max="20" value="{{ old('units', 2) }}" required>
                            <div class="form-text">Standard whole blood bag (450 mL).</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="urgency">Urgency Priority <span style="color: var(--primary);">*</span></label>
                            <select id="urgency" name="urgency" class="form-select" required>
                                <option value="immediate" {{ old('urgency') == 'immediate' ? 'selected' : '' }}>Immediate / Critical (0-6h)</option>
                                <option value="24h" {{ old('urgency') == '24h' ? 'selected' : '' }}>Within 24 Hours</option>
                                <option value="48h" {{ old('urgency') == '48h' ? 'selected' : '' }}>Within 48 Hours</option>
                                <option value="scheduled" {{ old('urgency') == 'scheduled' ? 'selected' : '' }}>Scheduled Operation</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="reason">Diagnosis / Clinical Indication</label>
                        <textarea id="reason" name="reason" rows="2" class="form-control" placeholder="e.g. Postpartum hemorrhage, severe anemia, scheduled coronary bypass, orthopedic trauma surgery">{{ old('reason') }}</textarea>
                    </div>

                    <!-- 2. Facility & Location -->
                    <div class="section-label">2. Hospital & Transfusion Facility</div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label" for="hospital_name">Hospital / Medical Center <span style="color: var(--primary);">*</span></label>
                            <input type="text" id="hospital_name" name="hospital_name" class="form-control" value="{{ old('hospital_name') }}" placeholder="e.g. Tagbilaran Community Hospital" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="city">City / Municipality <span style="color: var(--primary);">*</span></label>
                            <input type="text" id="city" name="city" class="form-control" value="{{ old('city', 'Tagbilaran City') }}" placeholder="e.g. Tagbilaran City" required>
                        </div>
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label" for="ward">Ward / Room / Department</label>
                            <input type="text" id="ward" name="ward" class="form-control" value="{{ old('ward') }}" placeholder="e.g. Intensive Care Unit, Bed 12">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="doctor">Attending Hematologist / Physician</label>
                            <input type="text" id="doctor" name="doctor" class="form-control" value="{{ old('doctor') }}" placeholder="e.g. Dr. Roberto Mendoza, MD">
                        </div>
                    </div>

                    <!-- 3. Contact Liaison -->
                    <div class="section-label">3. Emergency Liaison Contact</div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label" for="contact_name">Liaison Contact Person <span style="color: var(--primary);">*</span></label>
                            <input type="text" id="contact_name" name="contact_name" class="form-control" value="{{ old('contact_name') }}" placeholder="e.g. Roberto Santos" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="relationship">Relationship to Patient <span style="color: var(--primary);">*</span></label>
                            <input type="text" id="relationship" name="relationship" class="form-control" value="{{ old('relationship') }}" placeholder="e.g. Spouse, Parent, Hospital Nurse" required>
                        </div>
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label" for="contact_phone">Emergency Mobile Phone <span style="color: var(--primary);">*</span></label>
                            <input type="tel" id="contact_phone" name="contact_phone" class="form-control" value="{{ old('contact_phone') }}" placeholder="e.g. +63 918 123 4567" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="contact_email">Email Address</label>
                            <input type="email" id="contact_email" name="contact_email" class="form-control" value="{{ old('contact_email') }}" placeholder="e.g. contact@example.com">
                        </div>
                    </div>

                    <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 24px;">
                        <a href="{{ url('/blood-request') }}" class="btn btn-outline">Cancel</a>
                        <button type="submit" class="btn btn-primary">Broadcast Blood Requisition</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
