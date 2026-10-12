@extends('layouts.blood')

@section('title', 'Admin Dashboard - BloodCare')

@section('content')
    <div class="page-header">
        <div>
            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                <span class="badge badge-blood">Administrator Command Center</span>
                <span style="font-size: 0.8125rem; color: var(--text-muted);">
                    Logged in as <strong>{{ $admin ? $admin->name : 'System Administrator' }}</strong> ({{ $admin ? $admin->email : 'admin@bloodcare.org' }})
                </span>
            </div>
            <h1 class="page-title">Transfusion System Administration</h1>
            <p class="page-subtitle">Real-time operational monitoring of voluntary donors, clinical requisitions, hospital stations, and support queries.</p>
        </div>
        <div style="display: flex; gap: 10px; align-items: center;">
            <a href="{{ url('/admin/create') }}" class="btn btn-outline btn-sm">+ Add Admin User</a>
            <form action="{{ url('/admin/logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-outline btn-sm" style="color: var(--primary); border-color: var(--primary-border);">
                    Sign Out
                </button>
            </form>
        </div>
    </div>

    <!-- Administrative KPI Cards -->
    <div class="grid-4" style="margin-bottom: 28px;">
        <div class="stat-card">
            <div class="stat-label">Total Registered Donors</div>
            <div class="stat-value" style="color: var(--primary);">{{ number_format($totalDonors) }}</div>
            <div class="stat-desc">Voluntary screened donor database</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Pending Blood Requests</div>
            <div class="stat-value" style="color: #b45309;">{{ $pendingRequests }}</div>
            <div class="stat-desc">Awaiting cross-matching & dispatch</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Accredited Requirers</div>
            <div class="stat-value">{{ $totalRequirers }}</div>
            <div class="stat-desc">Hospitals, trauma units, clinics</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Unread Inquiries</div>
            <div class="stat-value" style="color: var(--info);">{{ $unreadQueries }}</div>
            <div class="stat-desc">Pending triage support tickets</div>
        </div>
    </div>

    <!-- Quick Management Bar -->
    <div class="card" style="margin-bottom: 28px;">
        <div class="card-header">
            <h2 class="card-title">Operations Management Quick Actions</h2>
        </div>
        <div class="card-body" style="padding: 16px 20px;">
            <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                <a href="{{ url('/blood-donors') }}" class="btn btn-outline btn-sm">Manage Donors</a>
                <a href="{{ url('/blood-request') }}" class="btn btn-outline btn-sm">Process Requisitions</a>
                <a href="{{ url('/requirers') }}" class="btn btn-outline btn-sm">Healthcare Requirers</a>
                <a href="{{ url('/contact-info') }}" class="btn btn-outline btn-sm">Transfusion Depots</a>
                <a href="{{ url('/contact-queries') }}" class="btn btn-outline btn-sm">Review Inquiries</a>
                <a href="{{ url('/pages') }}" class="btn btn-outline btn-sm">Publish Protocols</a>
                <a href="{{ url('/admin/create') }}" class="btn btn-primary btn-sm">+ New Admin / Staff</a>
            </div>
        </div>
    </div>

    <!-- Two-Column Operational Activity Tables -->
    <div class="grid-2" style="gap: 24px;">
        <!-- Recent Blood Requests -->
        <div class="card" style="margin-bottom: 0;">
            <div class="card-header">
                <div>
                    <h3 class="card-title">Recent Blood Requisitions</h3>
                    <div style="font-size: 0.75rem; color: var(--text-muted); margin-top: 2px;">Inpatient emergency & scheduled needs</div>
                </div>
                <a href="{{ url('/blood-request') }}" class="btn btn-outline btn-sm">View All &rarr;</a>
            </div>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Group</th>
                            <th>Units</th>
                            <th>Hospital</th>
                            <th>Urgency</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($recentRequests) && $recentRequests->isNotEmpty())
                            @foreach ($recentRequests as $req)
                                <tr>
                                    <td><strong>{{ $req->patient_name }}</strong></td>
                                    <td><span class="badge badge-blood">{{ $req->blood_group }}</span></td>
                                    <td>{{ $req->units }} Bag(s)</td>
                                    <td>{{ $req->hospital_name }}</td>
                                    <td>
                                        @if(in_array($req->urgency, ['immediate', 'emergency']))
                                            <span class="badge badge-danger">Immediate</span>
                                        @else
                                            <span class="badge badge-warning">{{ ucfirst($req->urgency) }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td><strong>Maria Santos</strong></td>
                                <td><span class="badge badge-blood">O+</span></td>
                                <td>3 Bags</td>
                                <td>Tagbilaran Community</td>
                                <td><span class="badge badge-danger">Immediate</span></td>
                            </tr>
                            <tr>
                                <td><strong>Carlos Reyes</strong></td>
                                <td><span class="badge badge-blood">A-</span></td>
                                <td>2 Bags</td>
                                <td>ACE Medical Center</td>
                                <td><span class="badge badge-warning">24 Hours</span></td>
                            </tr>
                            <tr>
                                <td><strong>Danilo Garcia</strong></td>
                                <td><span class="badge badge-blood">B+</span></td>
                                <td>4 Bags</td>
                                <td>Gov. Gallares Hospital</td>
                                <td><span class="badge badge-neutral">Scheduled</span></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Registered Donors -->
        <div class="card" style="margin-bottom: 0;">
            <div class="card-header">
                <div>
                    <h3 class="card-title">Recently Registered Donors</h3>
                    <div style="font-size: 0.75rem; color: var(--text-muted); margin-top: 2px;">Screened voluntary donor signups</div>
                </div>
                <a href="{{ url('/blood-donors') }}" class="btn btn-outline btn-sm">View All &rarr;</a>
            </div>
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Donor Name</th>
                            <th>Group</th>
                            <th>City</th>
                            <th>Phone</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($recentDonors) && $recentDonors->isNotEmpty())
                            @foreach ($recentDonors as $donor)
                                <tr>
                                    <td><strong>{{ $donor->name }}</strong></td>
                                    <td><span class="badge badge-blood">{{ $donor->blood_group }}</span></td>
                                    <td>{{ $donor->city }}</td>
                                    <td>{{ $donor->phone }}</td>
                                    <td><span class="badge badge-success">{{ ucfirst($donor->status) }}</span></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td><strong>Marco Alcantara</strong></td>
                                <td><span class="badge badge-blood">O+</span></td>
                                <td>Tagbilaran City</td>
                                <td>+63 917 123 4567</td>
                                <td><span class="badge badge-success">Available</span></td>
                            </tr>
                            <tr>
                                <td><strong>Jessica Tan</strong></td>
                                <td><span class="badge badge-blood">A+</span></td>
                                <td>Dauis, Bohol</td>
                                <td>+63 928 345 6789</td>
                                <td><span class="badge badge-success">Available</span></td>
                            </tr>
                            <tr>
                                <td><strong>Bea Mendoza</strong></td>
                                <td><span class="badge badge-blood">O-</span></td>
                                <td>Panglao, Bohol</td>
                                <td>+63 945 567 8901</td>
                                <td><span class="badge badge-success">Available</span></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
