@extends('layouts.blood')

@section('title', 'Submit Transfusion Inquiry - BloodCare')

@section('content')
    <div style="max-width: 800px; margin: 0 auto;">
        <div class="page-header">
            <div>
                <h1 class="page-title">Submit Transfusion Inquiry</h1>
                <p class="page-subtitle">Send a question or coordination request to the BloodCare medical liaison and depot coordination team.</p>
            </div>
            <div>
                <a href="{{ url('/contact-queries') }}" class="btn btn-outline btn-sm">&larr; Back to Inquiries</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Inquiry / Communication Form</h2>
                <span class="badge badge-neutral">Medical Desk</span>
            </div>

            <div class="card-body">
                <form action="{{ url('/contact-queries') }}" method="POST">
                    @csrf

                    <div class="section-label" style="margin-top: 0;">1. Sender Details</div>

                    <div class="form-group">
                        <label class="form-label" for="name">Your Full Name <span style="color: var(--primary);">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="e.g. Maria Carmen Veloso" required>
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label" for="email">Email Address <span style="color: var(--primary);">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="e.g. carmen.veloso@example.com" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="phone">Contact Mobile Number</label>
                            <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="e.g. +63 917 888 1234">
                        </div>
                    </div>

                    <div class="section-label">2. Inquiry & Topic</div>

                    <div class="form-group">
                        <label class="form-label" for="subject">Subject / Inquiry Title <span style="color: var(--primary);">*</span></label>
                        <input type="text" id="subject" name="subject" class="form-control" value="{{ old('subject') }}" placeholder="e.g. Inquiring about mobile blood donation drive for company" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="message">Detailed Message <span style="color: var(--primary);">*</span></label>
                        <textarea id="message" name="message" rows="5" class="form-control" placeholder="Provide full details regarding your question, required dates, or clinical concern..." required>{{ old('message') }}</textarea>
                    </div>

                    <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 24px;">
                        <a href="{{ url('/contact-queries') }}" class="btn btn-outline">Cancel</a>
                        <button type="submit" class="btn btn-primary">Transmit Inquiry</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
