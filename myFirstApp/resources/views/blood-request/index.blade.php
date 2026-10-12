@extends('layouts.blood')

@section('title', 'Emergency Blood Requests - BloodCare')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Emergency Blood Requests</h1>
            <p class="page-subtitle">Current inpatient blood requisitions requiring donor cross-matching and dispatch.</p>
        </div>
        <div>
            <a href="{{ url('/blood-request/create') }}" class="btn btn-primary">+ Post Requisition</a>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="filter-panel">
        <div style="flex: 2; min-width: 200px;">
            <input type="text" class="form-control" placeholder="Search patient name, hospital, or city...">
        </div>
        <div style="flex: 1; min-width: 160px;">
            <select class="form-select">
                <option value="">All Blood Types</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
        </div>
        <div style="flex: 1; min-width: 160px;">
            <select class="form-select">
                <option value="">All Urgency Levels</option>
                <option value="immediate">Immediate / Emergency</option>
                <option value="24h">Within 24 Hours</option>
                <option value="48h">Within 48 Hours</option>
                <option value="scheduled">Scheduled Procedure</option>
            </select>
        </div>
        <div>
            <button type="button" class="btn btn-outline">Apply Filters</button>
        </div>
    </div>

    <!-- Requests Table Card -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Active Blood Requisitions</h2>
            <span style="font-size: 0.8125rem; color: var(--text-muted);">
                Showing {{ isset($requests) && $requests->count() ? $requests->count() : 3 }} requisition(s)
            </span>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 100px;">Req ID</th>
                        <th>Patient</th>
                        <th style="width: 110px;">Blood Type</th>
                        <th style="width: 90px;">Units</th>
                        <th>Hospital & Facility</th>
                        <th style="width: 130px;">Urgency</th>
                        <th>Contact Liaison</th>
                        <th style="width: 110px;">Status</th>
                        <th style="width: 120px; text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($requests) && $requests->isNotEmpty())
                        @foreach ($requests as $req)
                            <tr>
                                <td><code>#BR-{{ str_pad($req->id, 4, '0', STR_PAD_LEFT) }}</code></td>
                                <td><strong>{{ $req->patient_name }}</strong></td>
                                <td><span class="badge badge-blood">{{ $req->blood_group }}</span></td>
                                <td>{{ $req->units }} Bag(s)</td>
                                <td>
                                    <div>{{ $req->hospital_name }}</div>
                                    <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $req->city }} @if($req->ward) &bull; {{ $req->ward }} @endif</div>
                                </td>
                                <td>
                                    @if(in_array($req->urgency, ['immediate', 'emergency']))
                                        <span class="badge badge-danger">Immediate</span>
                                    @elseif($req->urgency == '24h')
                                        <span class="badge badge-warning">Within 24h</span>
                                    @else
                                        <span class="badge badge-neutral">Standard</span>
                                    @endif
                                </td>
                                <td>
                                    <div>{{ $req->contact_name }}</div>
                                    <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $req->contact_phone }}</div>
                                </td>
                                <td>
                                    @if($req->status == 'fulfilled')
                                        <span class="badge badge-success">Fulfilled</span>
                                    @elseif($req->status == 'matched')
                                        <span class="badge badge-warning">Matched</span>
                                    @else
                                        <span class="badge badge-danger">Pending</span>
                                    @endif
                                </td>
                                <td style="text-align: right;">
                                    <a href="tel:{{ $req->contact_phone }}" class="btn btn-outline btn-sm">Contact</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td><code>#BR-0301</code></td>
                            <td><strong>Maria Santos</strong></td>
                            <td><span class="badge badge-blood">O+</span></td>
                            <td>3 Bags</td>
                            <td>
                                <div>Cebu Doctors' University Hospital</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">Cebu City &bull; ICU Bed 4</div>
                            </td>
                            <td><span class="badge badge-danger">Immediate</span></td>
                            <td>
                                <div>Eduardo Santos (Spouse)</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">+63 917 111 2233</div>
                            </td>
                            <td><span class="badge badge-danger">Pending</span></td>
                            <td style="text-align: right;">
                                <a href="tel:+639171112233" class="btn btn-outline btn-sm">Contact</a>
                            </td>
                        </tr>
                        <tr>
                            <td><code>#BR-0302</code></td>
                            <td><strong>Roberto Cruz</strong></td>
                            <td><span class="badge badge-blood">B-</span></td>
                            <td>2 Bags</td>
                            <td>
                                <div>Gov. Celestino Gallares Memorial Medical Center</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">Tagbilaran City &bull; Surgical Ward</div>
                            </td>
                            <td><span class="badge badge-warning">Within 24h</span></td>
                            <td>
                                <div>Nora Cruz (Mother)</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">+63 922 444 5566</div>
                            </td>
                            <td><span class="badge badge-warning">1 Pledged</span></td>
                            <td style="text-align: right;">
                                <a href="tel:+639224445566" class="btn btn-outline btn-sm">Contact</a>
                            </td>
                        </tr>
                        <tr>
                            <td><code>#BR-0303</code></td>
                            <td><strong>David Kim</strong></td>
                            <td><span class="badge badge-blood">AB+</span></td>
                            <td>1 Bag</td>
                            <td>
                                <div>Holy Name University Medical Center</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">Tagbilaran City &bull; Room 302</div>
                            </td>
                            <td><span class="badge badge-neutral">Standard</span></td>
                            <td>
                                <div>Grace Kim (Daughter)</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">+63 933 777 8899</div>
                            </td>
                            <td><span class="badge badge-success">Fulfilled</span></td>
                            <td style="text-align: right;">
                                <span style="font-size: 0.8125rem; color: var(--text-muted);">Completed</span>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
