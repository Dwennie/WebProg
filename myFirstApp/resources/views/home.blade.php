@extends('layouts.blood')

@section('title', 'BloodCare - Transfusion & Voluntary Blood Donation Network')

@section('content')
    <!-- Clinical Dispatch Hero -->
    <div class="card" style="border-left: 4px solid var(--primary); margin-bottom: 32px;">
        <div class="card-body" style="padding: 36px 32px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 32px; flex-wrap: wrap;">
                <div style="flex: 1.4; min-width: 300px;">
                    <span class="badge badge-blood" style="margin-bottom: 12px; font-size: 0.8125rem; padding: 4px 10px;">
                        Emergency Transfusion Dispatch Active
                    </span>
                    <h1 style="font-size: 2.25rem; font-weight: 800; line-height: 1.2; margin-bottom: 14px; letter-spacing: -0.5px;">
                        Regional Voluntary Blood Donation & Transfusion Coordination Network
                    </h1>
                    <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.6; margin-bottom: 24px;">
                        BloodCare unifies voluntary donors, regional hospitals, and emergency blood banks into a single clinical dispatch platform. Every donation unit is logged, cross-matched, and directed to save critical patients.
                    </p>
                    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                        <a href="{{ url('/blood-donors/create') }}" class="btn btn-primary">
                            Register as Voluntary Donor
                        </a>
                        <a href="{{ url('/blood-request/create') }}" class="btn btn-outline" style="border-color: var(--primary); color: var(--primary);">
                            Submit Blood Requisition
                        </a>
                        <a href="{{ url('/blood-donors') }}" class="btn btn-outline">
                            Search Donor Registry
                        </a>
                    </div>
                </div>

                <div style="flex: 1; min-width: 280px; background-color: var(--bg-page); border: 1px solid var(--border-color); border-radius: var(--radius); padding: 20px;">
                    <h3 style="font-size: 0.9375rem; font-weight: 700; margin-bottom: 12px; color: var(--text-main); display: flex; align-items: center; justify-content: space-between;">
                        <span>Rapid Transfusion Lookup</span>
                        <span class="badge badge-neutral">Live</span>
                    </h3>
                    <p style="font-size: 0.8125rem; color: var(--text-muted); margin-bottom: 14px;">
                        Check donor availability or active emergency hospital requisitions by blood type.
                    </p>
                    <form action="{{ url('/blood-donors') }}" method="GET" style="display: flex; flex-direction: column; gap: 10px;">
                        <div>
                            <select name="blood_group" class="form-select" style="font-size: 0.875rem;">
                                <option value="">Select Blood Group to Match</option>
                                <option value="O+">O+ (Universal RBC Recipient Match)</option>
                                <option value="O-">O- (Universal Red Blood Cell Donor)</option>
                                <option value="A+">A+ Positive</option>
                                <option value="A-">A- Negative</option>
                                <option value="B+">B+ Positive</option>
                                <option value="B-">B- Negative</option>
                                <option value="AB+">AB+ (Universal Plasma Donor)</option>
                                <option value="AB-">AB- Negative</option>
                            </select>
                        </div>
                        <div style="display: flex; gap: 8px;">
                            <button type="submit" class="btn btn-primary btn-sm" style="flex: 1;">Find Donors</button>
                            <a href="{{ url('/blood-request') }}" class="btn btn-outline btn-sm" style="flex: 1;">View Requests</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Operational Metrics -->
    <div class="grid-4" style="margin-bottom: 32px;">
        <div class="stat-card">
            <div class="stat-label">Registered Donors</div>
            <div class="stat-value" style="color: var(--primary);">1,420+</div>
            <div class="stat-desc">Screened & eligible donors on file</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Transfusion Stations</div>
            <div class="stat-value">48</div>
            <div class="stat-desc">Accredited hospital blood banks</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Pending Requisitions</div>
            <div class="stat-value" style="color: #b45309;">18</div>
            <div class="stat-desc">Active cross-match procedures</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Mean Dispatch Time</div>
            <div class="stat-value" style="color: var(--success);">28 min</div>
            <div class="stat-desc">Emergency cold-chain dispatch</div>
        </div>
    </div>

    <!-- Active Transfusion Requisitions Preview -->
    <div class="card" style="margin-bottom: 32px;">
        <div class="card-header">
            <div>
                <h2 class="card-title">Urgent Transfusion Requisitions</h2>
                <div style="font-size: 0.8125rem; color: var(--text-muted); margin-top: 2px;">
                    Critical hospital requisitions requiring immediate donor response
                </div>
            </div>
            <a href="{{ url('/blood-request') }}" class="btn btn-outline btn-sm">
                View All Requisitions &rarr;
            </a>
        </div>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 100px;">Req ID</th>
                        <th>Patient Name</th>
                        <th style="width: 120px;">Blood Group</th>
                        <th style="width: 90px;">Units</th>
                        <th>Hospital Facility</th>
                        <th style="width: 120px;">Urgency</th>
                        <th>Emergency Contact</th>
                        <th style="width: 130px; text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>#BR-0001</code></td>
                        <td><strong>Maria Santos</strong></td>
                        <td><span class="badge badge-blood">O+</span></td>
                        <td>3 Units</td>
                        <td>
                            <div>Tagbilaran Community Hospital</div>
                            <div style="font-size: 0.75rem; color: var(--text-muted);">Tagbilaran City &bull; ICU Ward 4</div>
                        </td>
                        <td><span class="badge badge-danger">Immediate</span></td>
                        <td>
                            <div>Roberto Santos (Husband)</div>
                            <div style="font-size: 0.75rem; color: var(--text-muted);">+63 918 123 4567</div>
                        </td>
                        <td style="text-align: right;">
                            <a href="tel:+639181234567" class="btn btn-outline btn-sm">Respond</a>
                        </td>
                    </tr>
                    <tr>
                        <td><code>#BR-0002</code></td>
                        <td><strong>Carlos Reyes</strong></td>
                        <td><span class="badge badge-blood">A-</span></td>
                        <td>2 Units</td>
                        <td>
                            <div>ACE Medical Center Bohol</div>
                            <div style="font-size: 0.75rem; color: var(--text-muted);">Dauis &bull; Emergency Trauma Center</div>
                        </td>
                        <td><span class="badge badge-warning">Within 24h</span></td>
                        <td>
                            <div>Elena Reyes (Sister)</div>
                            <div style="font-size: 0.75rem; color: var(--text-muted);">+63 920 987 6543</div>
                        </td>
                        <td style="text-align: right;">
                            <a href="tel:+639209876543" class="btn btn-outline btn-sm">Respond</a>
                        </td>
                    </tr>
                    <tr>
                        <td><code>#BR-0003</code></td>
                        <td><strong>Danilo Garcia</strong></td>
                        <td><span class="badge badge-blood">B+</span></td>
                        <td>4 Units</td>
                        <td>
                            <div>Gov. Celestino Gallares Memorial Hospital</div>
                            <div style="font-size: 0.75rem; color: var(--text-muted);">Tagbilaran City &bull; Surgical Wing</div>
                        </td>
                        <td><span class="badge badge-neutral">Scheduled</span></td>
                        <td>
                            <div>Grace Garcia (Daughter)</div>
                            <div style="font-size: 0.75rem; color: var(--text-muted);">+63 939 555 4321</div>
                        </td>
                        <td style="text-align: right;">
                            <a href="tel:+639395554321" class="btn btn-outline btn-sm">Respond</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Blood Compatibility Clinical Matrix -->
    <div class="card" style="margin-bottom: 32px;">
        <div class="card-header">
            <div>
                <h2 class="card-title">Blood Group Transfusion Compatibility Matrix</h2>
                <div style="font-size: 0.8125rem; color: var(--text-muted); margin-top: 2px;">
                    Clinical standards for red blood cell donor-recipient cross-matching
                </div>
            </div>
            <span class="badge badge-neutral">Transfusion Standard</span>
        </div>
        <div class="card-body">
            <div class="grid-4">
                <div style="border: 1px solid var(--border-color); border-radius: var(--radius); padding: 16px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <span class="badge badge-blood" style="font-size: 1rem; padding: 4px 10px;">O-</span>
                        <span style="font-size: 0.75rem; color: var(--success); font-weight: 700;">Universal RBC</span>
                    </div>
                    <div style="font-size: 0.8125rem; margin-bottom: 6px;">
                        <strong style="color: var(--text-main);">Can Donate To:</strong><br>
                        <span style="color: var(--text-muted);">All Types (O-, O+, A-, A+, B-, B+, AB-, AB+)</span>
                    </div>
                    <div style="font-size: 0.8125rem;">
                        <strong style="color: var(--text-main);">Can Receive From:</strong><br>
                        <span style="color: var(--text-muted);">O- only</span>
                    </div>
                </div>

                <div style="border: 1px solid var(--border-color); border-radius: var(--radius); padding: 16px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <span class="badge badge-blood" style="font-size: 1rem; padding: 4px 10px;">O+</span>
                        <span style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">High Demand</span>
                    </div>
                    <div style="font-size: 0.8125rem; margin-bottom: 6px;">
                        <strong style="color: var(--text-main);">Can Donate To:</strong><br>
                        <span style="color: var(--text-muted);">O+, A+, B+, AB+</span>
                    </div>
                    <div style="font-size: 0.8125rem;">
                        <strong style="color: var(--text-main);">Can Receive From:</strong><br>
                        <span style="color: var(--text-muted);">O+, O-</span>
                    </div>
                </div>

                <div style="border: 1px solid var(--border-color); border-radius: var(--radius); padding: 16px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <span class="badge badge-blood" style="font-size: 1rem; padding: 4px 10px;">A+</span>
                        <span style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">Common Type</span>
                    </div>
                    <div style="font-size: 0.8125rem; margin-bottom: 6px;">
                        <strong style="color: var(--text-main);">Can Donate To:</strong><br>
                        <span style="color: var(--text-muted);">A+, AB+</span>
                    </div>
                    <div style="font-size: 0.8125rem;">
                        <strong style="color: var(--text-main);">Can Receive From:</strong><br>
                        <span style="color: var(--text-muted);">A+, A-, O+, O-</span>
                    </div>
                </div>

                <div style="border: 1px solid var(--border-color); border-radius: var(--radius); padding: 16px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <span class="badge badge-blood" style="font-size: 1rem; padding: 4px 10px;">A-</span>
                        <span style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">Rare Type</span>
                    </div>
                    <div style="font-size: 0.8125rem; margin-bottom: 6px;">
                        <strong style="color: var(--text-main);">Can Donate To:</strong><br>
                        <span style="color: var(--text-muted);">A-, A+, AB-, AB+</span>
                    </div>
                    <div style="font-size: 0.8125rem;">
                        <strong style="color: var(--text-main);">Can Receive From:</strong><br>
                        <span style="color: var(--text-muted);">A-, O-</span>
                    </div>
                </div>

                <div style="border: 1px solid var(--border-color); border-radius: var(--radius); padding: 16px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <span class="badge badge-blood" style="font-size: 1rem; padding: 4px 10px;">B+</span>
                        <span style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">Regular Demand</span>
                    </div>
                    <div style="font-size: 0.8125rem; margin-bottom: 6px;">
                        <strong style="color: var(--text-main);">Can Donate To:</strong><br>
                        <span style="color: var(--text-muted);">B+, AB+</span>
                    </div>
                    <div style="font-size: 0.8125rem;">
                        <strong style="color: var(--text-main);">Can Receive From:</strong><br>
                        <span style="color: var(--text-muted);">B+, B-, O+, O-</span>
                    </div>
                </div>

                <div style="border: 1px solid var(--border-color); border-radius: var(--radius); padding: 16px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <span class="badge badge-blood" style="font-size: 1rem; padding: 4px 10px;">B-</span>
                        <span style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">Rare Type</span>
                    </div>
                    <div style="font-size: 0.8125rem; margin-bottom: 6px;">
                        <strong style="color: var(--text-main);">Can Donate To:</strong><br>
                        <span style="color: var(--text-muted);">B-, B+, AB-, AB+</span>
                    </div>
                    <div style="font-size: 0.8125rem;">
                        <strong style="color: var(--text-main);">Can Receive From:</strong><br>
                        <span style="color: var(--text-muted);">B-, O-</span>
                    </div>
                </div>

                <div style="border: 1px solid var(--border-color); border-radius: var(--radius); padding: 16px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <span class="badge badge-blood" style="font-size: 1rem; padding: 4px 10px;">AB+</span>
                        <span style="font-size: 0.75rem; color: var(--info); font-weight: 700;">Universal Recipient</span>
                    </div>
                    <div style="font-size: 0.8125rem; margin-bottom: 6px;">
                        <strong style="color: var(--text-main);">Can Donate To:</strong><br>
                        <span style="color: var(--text-muted);">AB+ only</span>
                    </div>
                    <div style="font-size: 0.8125rem;">
                        <strong style="color: var(--text-main);">Can Receive From:</strong><br>
                        <span style="color: var(--text-muted);">All Types (Universal RBC Recipient)</span>
                    </div>
                </div>

                <div style="border: 1px solid var(--border-color); border-radius: var(--radius); padding: 16px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <span class="badge badge-blood" style="font-size: 1rem; padding: 4px 10px;">AB-</span>
                        <span style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">Rarest Type (1%)</span>
                    </div>
                    <div style="font-size: 0.8125rem; margin-bottom: 6px;">
                        <strong style="color: var(--text-main);">Can Donate To:</strong><br>
                        <span style="color: var(--text-muted);">AB-, AB+</span>
                    </div>
                    <div style="font-size: 0.8125rem;">
                        <strong style="color: var(--text-main);">Can Receive From:</strong><br>
                        <span style="color: var(--text-muted);">AB-, A-, B-, O-</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- System Modules Portal -->
    <div class="card" style="margin-bottom: 32px;">
        <div class="card-header">
            <div>
                <h2 class="card-title">Network Coordination Modules</h2>
                <div style="font-size: 0.8125rem; color: var(--text-muted); margin-top: 2px;">
                    Core operational services for donors, hospital staff, and coordination personnel
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="grid-3">
                <div style="border: 1px solid var(--border-color); border-radius: var(--radius); padding: 20px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <h3 style="font-size: 1rem; font-weight: 700; margin-bottom: 8px;">Voluntary Donor Registry</h3>
                        <p style="font-size: 0.875rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 16px;">
                            Access the certified registry of voluntary blood donors. Filter by ABO/Rh group, location, and donation cooldown period.
                        </p>
                    </div>
                    <div style="display: flex; gap: 8px;">
                        <a href="{{ url('/blood-donors') }}" class="btn btn-outline btn-sm">Browse Donors</a>
                        <a href="{{ url('/blood-donors/create') }}" class="btn btn-primary btn-sm">+ Register</a>
                    </div>
                </div>

                <div style="border: 1px solid var(--border-color); border-radius: var(--radius); padding: 20px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <h3 style="font-size: 1rem; font-weight: 700; margin-bottom: 8px;">Emergency Blood Requests</h3>
                        <p style="font-size: 0.875rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 16px;">
                            Track clinical blood requisitions from emergency wards, surgical theaters, and regional healthcare institutions.
                        </p>
                    </div>
                    <div style="display: flex; gap: 8px;">
                        <a href="{{ url('/blood-request') }}" class="btn btn-outline btn-sm">All Requests</a>
                        <a href="{{ url('/blood-request/create') }}" class="btn btn-primary btn-sm">+ Post Req</a>
                    </div>
                </div>

                <div style="border: 1px solid var(--border-color); border-radius: var(--radius); padding: 20px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <h3 style="font-size: 1rem; font-weight: 700; margin-bottom: 8px;">Healthcare Requirers</h3>
                        <p style="font-size: 0.875rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 16px;">
                            Accredited institutional partners including public and private hospitals, trauma centers, and dialysis facilities.
                        </p>
                    </div>
                    <div style="display: flex; gap: 8px;">
                        <a href="{{ url('/requirers') }}" class="btn btn-outline btn-sm">View Partners</a>
                        <a href="{{ url('/requirers/create') }}" class="btn btn-primary btn-sm">+ Register</a>
                    </div>
                </div>

                <div style="border: 1px solid var(--border-color); border-radius: var(--radius); padding: 20px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <h3 style="font-size: 1rem; font-weight: 700; margin-bottom: 8px;">Blood Bank Stations</h3>
                        <p style="font-size: 0.875rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 16px;">
                            Locate 24/7 cold-chain blood depot centers, laboratory blood screening units, and emergency dispatch centers.
                        </p>
                    </div>
                    <div style="display: flex; gap: 8px;">
                        <a href="{{ url('/contact-info') }}" class="btn btn-outline btn-sm">Find Stations</a>
                        <a href="{{ url('/contact-info/create') }}" class="btn btn-primary btn-sm">+ Add Station</a>
                    </div>
                </div>

                <div style="border: 1px solid var(--border-color); border-radius: var(--radius); padding: 20px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <h3 style="font-size: 1rem; font-weight: 700; margin-bottom: 8px;">Clinical Protocols & Pages</h3>
                        <p style="font-size: 0.875rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 16px;">
                            Evidence-based guidelines on donor eligibility, deferral criteria, adverse reaction management, and collection standards.
                        </p>
                    </div>
                    <div style="display: flex; gap: 8px;">
                        <a href="{{ url('/pages') }}" class="btn btn-outline btn-sm">Read Protocols</a>
                        <a href="{{ url('/pages/create') }}" class="btn btn-primary btn-sm">+ New Article</a>
                    </div>
                </div>

                <div style="border: 1px solid var(--border-color); border-radius: var(--radius); padding: 20px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <h3 style="font-size: 1rem; font-weight: 700; margin-bottom: 8px;">Transfusion Support & Inquiries</h3>
                        <p style="font-size: 0.875rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 16px;">
                            Submit questions regarding donor eligibility, hospital partnerships, emergency blood allocation, or public drives.
                        </p>
                    </div>
                    <div style="display: flex; gap: 8px;">
                        <a href="{{ url('/contact-queries') }}" class="btn btn-outline btn-sm">Support Desk</a>
                        <a href="{{ url('/contact-queries/create') }}" class="btn btn-primary btn-sm">+ Send Inquiry</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Clinical Donation Protocol Steps -->
    <div class="card">
        <div class="card-header">
            <div>
                <h2 class="card-title">Voluntary Transfusion Donation Protocol</h2>
                <div style="font-size: 0.8125rem; color: var(--text-muted); margin-top: 2px;">
                    Standard operating procedures practiced at all accredited collection centers
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="grid-4">
                <div style="text-align: left; padding: 12px; border-left: 2px solid var(--primary);">
                    <div style="font-weight: 800; color: var(--primary); font-size: 0.875rem; margin-bottom: 4px;">PHASE 01</div>
                    <h4 style="font-size: 0.9375rem; font-weight: 700; margin-bottom: 6px;">Eligibility Pre-Screen</h4>
                    <p style="font-size: 0.8125rem; color: var(--text-muted); line-height: 1.5;">
                        Donor registers with identification, completes clinical history questionnaire, and verifies minimum age (17+) and weight (50kg+).
                    </p>
                </div>

                <div style="text-align: left; padding: 12px; border-left: 2px solid var(--primary);">
                    <div style="font-weight: 800; color: var(--primary); font-size: 0.875rem; margin-bottom: 4px;">PHASE 02</div>
                    <h4 style="font-size: 0.9375rem; font-weight: 700; margin-bottom: 6px;">Vitals & Hemoglobin</h4>
                    <p style="font-size: 0.8125rem; color: var(--text-muted); line-height: 1.5;">
                        Medical staff check blood pressure, pulse, temperature, and conduct a finger-prick test to ensure adequate hemoglobin levels (12.5 g/dL+).
                    </p>
                </div>

                <div style="text-align: left; padding: 12px; border-left: 2px solid var(--primary);">
                    <div style="font-weight: 800; color: var(--primary); font-size: 0.875rem; margin-bottom: 4px;">PHASE 03</div>
                    <h4 style="font-size: 0.9375rem; font-weight: 700; margin-bottom: 6px;">Transfusion Draw</h4>
                    <p style="font-size: 0.8125rem; color: var(--text-muted); line-height: 1.5;">
                        Using sterile single-use equipment, approx. 450 mL of whole blood is safely collected in 8–10 minutes under clinical supervision.
                    </p>
                </div>

                <div style="text-align: left; padding: 12px; border-left: 2px solid var(--primary);">
                    <div style="font-weight: 800; color: var(--primary); font-size: 0.875rem; margin-bottom: 4px;">PHASE 04</div>
                    <h4 style="font-size: 0.9375rem; font-weight: 700; margin-bottom: 6px;">Rest & Refreshment</h4>
                    <p style="font-size: 0.8125rem; color: var(--text-muted); line-height: 1.5;">
                        The donor rests for 10–15 minutes with oral rehydration fluids and light refreshments before resuming standard daily routines.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection