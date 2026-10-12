@extends('layouts.blood')

@section('title', 'Blood Transfusion Centers & Stations - BloodCare')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Blood Transfusion Centers & Stations</h1>
            <p class="page-subtitle">Certified regional cold-chain blood depots, screening laboratories, and hospital transfusion coordination desks.</p>
        </div>
        <div>
            <a href="{{ url('/contact-info/create') }}" class="btn btn-primary">+ Add New Station</a>
        </div>
    </div>

    <!-- Emergency Hotline Banner -->
    <div style="background-color: var(--surface); border: 1px solid var(--border-color); border-left: 4px solid var(--primary); border-radius: var(--radius); padding: 18px 24px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <div>
            <div style="font-size: 0.8125rem; font-weight: 700; color: var(--primary); text-transform: uppercase; letter-spacing: 0.5px;">24/7 Central Blood Dispatch Coordinator</div>
            <div style="font-size: 1.125rem; font-weight: 800; color: var(--text-main); margin-top: 2px;">
                Direct emergency ambulance and hospital cross-match line: <span style="color: var(--primary);">+1 (800) 555-BLOOD</span>
            </div>
        </div>
        <div>
            <a href="tel:18005552566" class="btn btn-primary btn-sm">Call Central Dispatch</a>
        </div>
    </div>

    <!-- Stations Grid -->
    <div class="grid-2" style="gap: 20px;">
        @if (isset($centers) && $centers->isNotEmpty())
            @foreach ($centers as $center)
                <div class="card" style="margin-bottom: 0;">
                    <div class="card-header">
                        <div>
                            <span class="badge badge-neutral" style="margin-bottom: 4px;">{{ ucfirst(str_replace('_', ' ', $center->facility_type)) }}</span>
                            <h3 class="card-title">{{ $center->center_name }}</h3>
                        </div>
                        <span class="badge badge-success">{{ $center->operating_hours }}</span>
                    </div>
                    <div class="card-body">
                        <div style="margin-bottom: 12px; font-size: 0.875rem;">
                            <strong style="color: var(--text-main);">Clinical Coordinator:</strong>
                            <span style="color: var(--text-muted); margin-left: 6px;">{{ $center->coordinator }}</span>
                        </div>
                        <div style="margin-bottom: 12px; font-size: 0.875rem;">
                            <strong style="color: var(--text-main);">Address:</strong>
                            <span style="color: var(--text-muted); margin-left: 6px;">{{ $center->address }}, {{ $center->city }}, {{ $center->province }}</span>
                        </div>
                        <div style="margin-bottom: 16px; font-size: 0.875rem;">
                            <strong style="color: var(--text-main);">Email:</strong>
                            <span style="color: var(--text-muted); margin-left: 6px;">{{ $center->email }}</span>
                        </div>

                        <div style="background-color: var(--bg-page); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: 12px 16px; display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <div style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">24-HOUR EMERGENCY LINE</div>
                                <div style="font-size: 1rem; font-weight: 800; color: var(--primary);">{{ $center->emergency_hotline }}</div>
                            </div>
                            <a href="tel:{{ $center->emergency_hotline }}" class="btn btn-outline btn-sm">Dial Hotline</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <!-- Standard Fallback Hospital Stations -->
            <div class="card" style="margin-bottom: 0;">
                <div class="card-header">
                    <div>
                        <span class="badge badge-neutral" style="margin-bottom: 4px;">Central Blood Bank</span>
                        <h3 class="card-title">Bohol Regional Transfusion & Blood Depot</h3>
                    </div>
                    <span class="badge badge-success">24/7 Continuous</span>
                </div>
                <div class="card-body">
                    <div style="margin-bottom: 12px; font-size: 0.875rem;">
                        <strong style="color: var(--text-main);">Clinical Coordinator:</strong>
                        <span style="color: var(--text-muted); margin-left: 6px;">Dr. Patricia Salcedo, MD (Pathologist)</span>
                    </div>
                    <div style="margin-bottom: 12px; font-size: 0.875rem;">
                        <strong style="color: var(--text-main);">Address:</strong>
                        <span style="color: var(--text-muted); margin-left: 6px;">Regional Medical Compound, J.A. Clarin St., Tagbilaran City, Bohol</span>
                    </div>
                    <div style="margin-bottom: 16px; font-size: 0.875rem;">
                        <strong style="color: var(--text-main);">Email:</strong>
                        <span style="color: var(--text-muted); margin-left: 6px;">blooddepot.bohol@doh.gov.ph</span>
                    </div>

                    <div style="background-color: var(--bg-page); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: 12px 16px; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <div style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">24-HOUR EMERGENCY LINE</div>
                            <div style="font-size: 1rem; font-weight: 800; color: var(--primary);">+63 (38) 411-9988</div>
                        </div>
                        <a href="tel:+63384119988" class="btn btn-outline btn-sm">Dial Hotline</a>
                    </div>
                </div>
            </div>

            <div class="card" style="margin-bottom: 0;">
                <div class="card-header">
                    <div>
                        <span class="badge badge-neutral" style="margin-bottom: 4px;">Tertiary Hospital Unit</span>
                        <h3 class="card-title">Gov. Celestino Gallares Memorial Blood Bank</h3>
                    </div>
                    <span class="badge badge-success">24/7 Continuous</span>
                </div>
                <div class="card-body">
                    <div style="margin-bottom: 12px; font-size: 0.875rem;">
                        <strong style="color: var(--text-main);">Clinical Coordinator:</strong>
                        <span style="color: var(--text-muted); margin-left: 6px;">Dr. Roberto Alcantara, MD (Transfusion Medicine)</span>
                    </div>
                    <div style="margin-bottom: 12px; font-size: 0.875rem;">
                        <strong style="color: var(--text-main);">Address:</strong>
                        <span style="color: var(--text-muted); margin-left: 6px;">M. Parras Street, Tagbilaran City, Bohol</span>
                    </div>
                    <div style="margin-bottom: 16px; font-size: 0.875rem;">
                        <strong style="color: var(--text-main);">Email:</strong>
                        <span style="color: var(--text-muted); margin-left: 6px;">bloodbank@gcgmh.bohol.ph</span>
                    </div>

                    <div style="background-color: var(--bg-page); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: 12px 16px; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <div style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">24-HOUR EMERGENCY LINE</div>
                            <div style="font-size: 1rem; font-weight: 800; color: var(--primary);">+63 (38) 412-3181</div>
                        </div>
                        <a href="tel:+63384123181" class="btn btn-outline btn-sm">Dial Hotline</a>
                    </div>
                </div>
            </div>

            <div class="card" style="margin-bottom: 0;">
                <div class="card-header">
                    <div>
                        <span class="badge badge-neutral" style="margin-bottom: 4px;">Private Transfusion Center</span>
                        <h3 class="card-title">ACE Medical Center Bohol Transfusion Section</h3>
                    </div>
                    <span class="badge badge-success">24/7 Continuous</span>
                </div>
                <div class="card-body">
                    <div style="margin-bottom: 12px; font-size: 0.875rem;">
                        <strong style="color: var(--text-main);">Clinical Coordinator:</strong>
                        <span style="color: var(--text-muted); margin-left: 6px;">MedTech Mariano S. Lee (Section Chief)</span>
                    </div>
                    <div style="margin-bottom: 12px; font-size: 0.875rem;">
                        <strong style="color: var(--text-main);">Address:</strong>
                        <span style="color: var(--text-muted); margin-left: 6px;">Bingag, Dauis, Bohol (Tagbilaran-Panglao Road)</span>
                    </div>
                    <div style="margin-bottom: 16px; font-size: 0.875rem;">
                        <strong style="color: var(--text-main);">Email:</strong>
                        <span style="color: var(--text-muted); margin-left: 6px;">bloodbank@acemedicalbohol.com</span>
                    </div>

                    <div style="background-color: var(--bg-page); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: 12px 16px; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <div style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">24-HOUR EMERGENCY LINE</div>
                            <div style="font-size: 1rem; font-weight: 800; color: var(--primary);">+63 (38) 501-8890</div>
                        </div>
                        <a href="tel:+63385018890" class="btn btn-outline btn-sm">Dial Hotline</a>
                    </div>
                </div>
            </div>

            <div class="card" style="margin-bottom: 0;">
                <div class="card-header">
                    <div>
                        <span class="badge badge-neutral" style="margin-bottom: 4px;">Sub-District Depot</span>
                        <h3 class="card-title">Tubigon Municipal Blood Bank Station</h3>
                    </div>
                    <span class="badge badge-neutral">08:00 - 20:00 (On-call 24/7)</span>
                </div>
                <div class="card-body">
                    <div style="margin-bottom: 12px; font-size: 0.875rem;">
                        <strong style="color: var(--text-main);">Clinical Coordinator:</strong>
                        <span style="color: var(--text-muted); margin-left: 6px;">Nurse Joan B. Calo (Triage Coordinator)</span>
                    </div>
                    <div style="margin-bottom: 12px; font-size: 0.875rem;">
                        <strong style="color: var(--text-main);">Address:</strong>
                        <span style="color: var(--text-muted); margin-left: 6px;">Tubigon Medicare Hospital, Centro, Tubigon, Bohol</span>
                    </div>
                    <div style="margin-bottom: 16px; font-size: 0.875rem;">
                        <strong style="color: var(--text-main);">Email:</strong>
                        <span style="color: var(--text-muted); margin-left: 6px;">tubigon.blood@bohol.gov.ph</span>
                    </div>

                    <div style="background-color: var(--bg-page); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: 12px 16px; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <div style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">24-HOUR EMERGENCY LINE</div>
                            <div style="font-size: 1rem; font-weight: 800; color: var(--primary);">+63 (38) 508-1122</div>
                        </div>
                        <a href="tel:+63385081122" class="btn btn-outline btn-sm">Dial Hotline</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
