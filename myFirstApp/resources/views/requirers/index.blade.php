@extends('layouts.blood')

@section('title', 'Healthcare Requirers Directory - BloodCare')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Healthcare Requirers & Partners</h1>
            <p class="page-subtitle">Accredited hospital networks, trauma facilities, and medical institutions authorized to requisition blood supplies.</p>
        </div>
        <div>
            <a href="{{ url('/requirers/create') }}" class="btn btn-primary">+ Register as Requirer</a>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="filter-panel">
        <div style="flex: 2; min-width: 220px;">
            <input type="text" class="form-control" placeholder="Search institution, city, or license number...">
        </div>
        <div style="flex: 1; min-width: 170px;">
            <select class="form-select">
                <option value="">All Facility Categories</option>
                <option value="hospital">Tertiary & Base Hospital</option>
                <option value="trauma_center">Trauma & Emergency Care</option>
                <option value="clinic">Dialysis & Specialty Clinic</option>
                <option value="red_cross">Humanitarian / Red Cross</option>
            </select>
        </div>
        <div style="flex: 1; min-width: 150px;">
            <select class="form-select">
                <option value="">All Accreditation Status</option>
                <option value="verified">Verified Partner</option>
                <option value="pending">Verification Pending</option>
            </select>
        </div>
        <div>
            <button type="button" class="btn btn-outline">Filter Partners</button>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Accredited Transfusion Facilities</h2>
            <span style="font-size: 0.8125rem; color: var(--text-muted);">
                Showing {{ isset($requirers) && $requirers->count() ? $requirers->count() : 4 }} institution(s)
            </span>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 90px;">Inst ID</th>
                        <th>Institution & Facility</th>
                        <th style="width: 130px;">Category</th>
                        <th style="width: 130px;">License / Reg</th>
                        <th>Clinical Liaison</th>
                        <th>Location</th>
                        <th>Emergency Line</th>
                        <th style="width: 110px;">Status</th>
                        <th style="width: 110px; text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($requirers) && $requirers->isNotEmpty())
                        @foreach ($requirers as $req)
                            <tr>
                                <td><code>#REQ-{{ str_pad($req->id, 4, '0', STR_PAD_LEFT) }}</code></td>
                                <td>
                                    <strong>{{ $req->org_name }}</strong>
                                    <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $req->email }}</div>
                                </td>
                                <td><span class="badge badge-neutral">{{ ucfirst(str_replace('_', ' ', $req->category)) }}</span></td>
                                <td><code>{{ $req->license_no ?? 'N/A' }}</code></td>
                                <td>
                                    <div>{{ $req->contact_person }}</div>
                                    <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $req->designation ?? 'Representative' }}</div>
                                </td>
                                <td>
                                    <div>{{ $req->city }}</div>
                                    <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $req->province }}</div>
                                </td>
                                <td>{{ $req->phone }}</td>
                                <td>
                                    @if ($req->status === 'verified')
                                        <span class="badge badge-success">Verified</span>
                                    @else
                                        <span class="badge badge-warning">Pending</span>
                                    @endif
                                </td>
                                <td style="text-align: right;">
                                    <a href="tel:{{ $req->phone }}" class="btn btn-outline btn-sm">Contact</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td><code>#REQ-0001</code></td>
                            <td>
                                <strong>Tagbilaran Community Hospital</strong>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">dispatch@tch-bohol.med.ph</div>
                            </td>
                            <td><span class="badge badge-neutral">Tertiary Hospital</span></td>
                            <td><code>DOH-TERT-0492</code></td>
                            <td>
                                <div>Dr. Eduardo V. Ramos</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">Chief Hematologist</div>
                            </td>
                            <td>
                                <div>Tagbilaran City</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">Bohol &bull; Cogon</div>
                            </td>
                            <td>+63 (38) 411-2233</td>
                            <td><span class="badge badge-success">Verified</span></td>
                            <td style="text-align: right;">
                                <a href="tel:+63384112233" class="btn btn-outline btn-sm">Contact</a>
                            </td>
                        </tr>
                        <tr>
                            <td><code>#REQ-0002</code></td>
                            <td>
                                <strong>ACE Medical Center Bohol</strong>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">bloodbank@acemedicalbohol.com</div>
                            </td>
                            <td><span class="badge badge-neutral">Private Hospital</span></td>
                            <td><code>DOH-PRIV-8102</code></td>
                            <td>
                                <div>Mariano S. Lee</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">Blood Bank Supervisor</div>
                            </td>
                            <td>
                                <div>Dauis</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">Bohol &bull; Bingag</div>
                            </td>
                            <td>+63 (38) 501-8890</td>
                            <td><span class="badge badge-success">Verified</span></td>
                            <td style="text-align: right;">
                                <a href="tel:+63385018890" class="btn btn-outline btn-sm">Contact</a>
                            </td>
                        </tr>
                        <tr>
                            <td><code>#REQ-0003</code></td>
                            <td>
                                <strong>Philippine Red Cross - Bohol Chapter</strong>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">bohol@redcross.org.ph</div>
                            </td>
                            <td><span class="badge badge-neutral">Humanitarian Org</span></td>
                            <td><code>PRC-CH-0012</code></td>
                            <td>
                                <div>Atty. Clara P. Montero</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">Chapter Administrator</div>
                            </td>
                            <td>
                                <div>Tagbilaran City</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">Bohol &bull; Peñaflor St.</div>
                            </td>
                            <td>+63 (38) 411-3444</td>
                            <td><span class="badge badge-success">Verified</span></td>
                            <td style="text-align: right;">
                                <a href="tel:+63384113444" class="btn btn-outline btn-sm">Contact</a>
                            </td>
                        </tr>
                        <tr>
                            <td><code>#REQ-0004</code></td>
                            <td>
                                <strong>Tubigon Medicare & Emergency Center</strong>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">tubigon.medicare@bohol.gov.ph</div>
                            </td>
                            <td><span class="badge badge-neutral">Emergency Clinic</span></td>
                            <td><code>DOH-CLIN-3391</code></td>
                            <td>
                                <div>Nurse Joan B. Calo</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">Triage Head</div>
                            </td>
                            <td>
                                <div>Tubigon</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">Bohol &bull; Poblacion</div>
                            </td>
                            <td>+63 (38) 508-1122</td>
                            <td><span class="badge badge-warning">Pending</span></td>
                            <td style="text-align: right;">
                                <a href="tel:+63385081122" class="btn btn-outline btn-sm">Contact</a>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
