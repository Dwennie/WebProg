@extends('layouts.blood')

@section('title', 'Transfusion Inquiries & Support - BloodCare')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Transfusion Inquiries & Communications</h1>
            <p class="page-subtitle">Incoming inquiries regarding donor eligibility, hospital supply coordination, and mobile donation drives.</p>
        </div>
        <div>
            <a href="{{ url('/contact-queries/create') }}" class="btn btn-primary">+ Submit an Inquiry</a>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="filter-panel">
        <div style="flex: 2; min-width: 220px;">
            <input type="text" class="form-control" placeholder="Search inquiry by sender, email, or subject...">
        </div>
        <div style="flex: 1; min-width: 170px;">
            <select class="form-select">
                <option value="">All Inquiry Statuses</option>
                <option value="new">New / Unread</option>
                <option value="in_progress">Under Review</option>
                <option value="resolved">Resolved</option>
            </select>
        </div>
        <div>
            <button type="button" class="btn btn-outline">Filter Inquiries</button>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Inquiry Support Desk</h2>
            <span style="font-size: 0.8125rem; color: var(--text-muted);">
                Showing {{ isset($queries) && $queries->count() ? $queries->count() : 3 }} inquiry record(s)
            </span>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 100px;">Ticket ID</th>
                        <th>Sender Name</th>
                        <th>Contact Liaison</th>
                        <th>Subject</th>
                        <th>Message Preview</th>
                        <th style="width: 120px;">Submitted</th>
                        <th style="width: 110px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($queries) && $queries->isNotEmpty())
                        @foreach ($queries as $q)
                            <tr>
                                <td><code>#TKT-{{ str_pad($q->id, 4, '0', STR_PAD_LEFT) }}</code></td>
                                <td><strong>{{ $q->name }}</strong></td>
                                <td>
                                    <div>{{ $q->email }}</div>
                                    <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $q->phone ?? 'N/A' }}</div>
                                </td>
                                <td><strong>{{ $q->subject }}</strong></td>
                                <td style="max-width: 320px; font-size: 0.8125rem; color: var(--text-muted);">
                                    {{ Str::limit($q->message, 80) }}
                                </td>
                                <td>{{ $q->created_at ? $q->created_at->format('M d, Y') : 'Recent' }}</td>
                                <td>
                                    @if ($q->status === 'new')
                                        <span class="badge badge-warning">New</span>
                                    @elseif ($q->status === 'resolved')
                                        <span class="badge badge-success">Resolved</span>
                                    @else
                                        <span class="badge badge-neutral">{{ ucfirst($q->status) }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td><code>#TKT-0101</code></td>
                            <td><strong>Maria Carmen Veloso</strong></td>
                            <td>
                                <div>carmen.veloso@bholresort.ph</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">+63 917 888 1234</div>
                            </td>
                            <td><strong>Mobile Blood Drive Request</strong></td>
                            <td style="max-width: 320px; font-size: 0.8125rem; color: var(--text-muted);">
                                Inquiring whether the BloodCare mobile collection bus can visit our resort facility next month for our corporate social drive...
                            </td>
                            <td>Yesterday</td>
                            <td><span class="badge badge-warning">New</span></td>
                        </tr>
                        <tr>
                            <td><code>#TKT-0102</code></td>
                            <td><strong>Dr. Henry Lim</strong></td>
                            <td>
                                <div>dr.lim@boholclinic.com</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">+63 922 456 7890</div>
                            </td>
                            <td><strong>Rare Blood Group O- Matching Protocol</strong></td>
                            <td style="max-width: 320px; font-size: 0.8125rem; color: var(--text-muted);">
                                We have an expectant mother with Rh-negative sensitization scheduled for C-section and would like to pre-reserve compatible O- blood...
                            </td>
                            <td>Sep 21, 2026</td>
                            <td><span class="badge badge-neutral">In Review</span></td>
                        </tr>
                        <tr>
                            <td><code>#TKT-0103</code></td>
                            <td><strong>Alexander Yap</strong></td>
                            <td>
                                <div>alex.yap@gmail.com</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">+63 933 111 2233</div>
                            </td>
                            <td><strong>Post-Tattoo Deferral Period Question</strong></td>
                            <td style="max-width: 320px; font-size: 0.8125rem; color: var(--text-muted);">
                                I had a small tattoo done 9 months ago in a licensed studio. Am I eligible to donate whole blood for the upcoming university drive?
                            </td>
                            <td>Sep 19, 2026</td>
                            <td><span class="badge badge-success">Resolved</span></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
