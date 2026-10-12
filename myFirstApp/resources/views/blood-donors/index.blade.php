@extends('layouts.blood')

@section('title', 'Voluntary Blood Donors Directory - BloodCare')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Voluntary Blood Donors Directory</h1>
            <p class="page-subtitle">Certified registry of screened voluntary donors available for emergency and scheduled clinical transfusions.</p>
        </div>
        <div>
            <a href="{{ url('/blood-donors/create') }}" class="btn btn-primary">+ Register as Donor</a>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="filter-panel">
        <div style="flex: 2; min-width: 220px;">
            <input type="text" class="form-control" placeholder="Search donor by name, city, or province...">
        </div>
        <div style="flex: 1; min-width: 170px;">
            <select class="form-select">
                <option value="">All Blood Groups</option>
                <option value="O+">O+ (Positive)</option>
                <option value="O-">O- (Universal)</option>
                <option value="A+">A+ (Positive)</option>
                <option value="A-">A- (Negative)</option>
                <option value="B+">B+ (Positive)</option>
                <option value="B-">B- (Negative)</option>
                <option value="AB+">AB+ (Positive)</option>
                <option value="AB-">AB- (Negative)</option>
            </select>
        </div>
        <div style="flex: 1; min-width: 150px;">
            <select class="form-select">
                <option value="">All Statuses</option>
                <option value="available">Available Now</option>
                <option value="cooldown">In Cooldown</option>
                <option value="unavailable">Unavailable</option>
            </select>
        </div>
        <div>
            <button type="button" class="btn btn-outline">Filter Registry</button>
        </div>
    </div>

    <!-- Donors Table Card -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Screened Donor Profiles</h2>
            <span style="font-size: 0.8125rem; color: var(--text-muted);">
                Showing {{ isset($donors) && $donors->count() ? $donors->count() : 4 }} verified donor(s)
            </span>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 90px;">Donor ID</th>
                        <th>Donor Name</th>
                        <th style="width: 110px;">Blood Group</th>
                        <th style="width: 100px;">Age / Sex</th>
                        <th style="width: 90px;">Weight</th>
                        <th>Location</th>
                        <th>Contact Liaison</th>
                        <th style="width: 130px;">Last Donated</th>
                        <th style="width: 110px;">Status</th>
                        <th style="width: 110px; text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($donors) && $donors->isNotEmpty())
                        @foreach ($donors as $donor)
                            <tr>
                                <td><code>#D-{{ str_pad($donor->id, 4, '0', STR_PAD_LEFT) }}</code></td>
                                <td>
                                    <strong>{{ $donor->name }}</strong>
                                    <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $donor->email }}</div>
                                </td>
                                <td><span class="badge badge-blood">{{ $donor->blood_group }}</span></td>
                                <td>{{ $donor->age }}y &bull; {{ $donor->gender }}</td>
                                <td>{{ $donor->weight }} kg</td>
                                <td>
                                    <div>{{ $donor->city }}</div>
                                    <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $donor->province }}</div>
                                </td>
                                <td>{{ $donor->phone }}</td>
                                <td>
                                    @if ($donor->last_donated)
                                        {{ \Carbon\Carbon::parse($donor->last_donated)->format('M d, Y') }}
                                    @else
                                        <span style="color: var(--text-muted);">First time</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($donor->status === 'available')
                                        <span class="badge badge-success">Available</span>
                                    @elseif ($donor->status === 'cooldown')
                                        <span class="badge badge-warning">Cooldown</span>
                                    @else
                                        <span class="badge badge-neutral">{{ ucfirst($donor->status) }}</span>
                                    @endif
                                </td>
                                <td style="text-align: right;">
                                    <a href="tel:{{ $donor->phone }}" class="btn btn-outline btn-sm">Contact</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td><code>#D-0001</code></td>
                            <td>
                                <strong>Marco Alcantara</strong>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">marco.alcantara@gmail.com</div>
                            </td>
                            <td><span class="badge badge-blood">O+</span></td>
                            <td>26y &bull; Male</td>
                            <td>68 kg</td>
                            <td>
                                <div>Tagbilaran City</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">Bohol &bull; Brgy. Cogon</div>
                            </td>
                            <td>+63 917 123 4567</td>
                            <td>3 mos ago</td>
                            <td><span class="badge badge-success">Available</span></td>
                            <td style="text-align: right;">
                                <a href="tel:+639171234567" class="btn btn-outline btn-sm">Contact</a>
                            </td>
                        </tr>
                        <tr>
                            <td><code>#D-0002</code></td>
                            <td>
                                <strong>Jessica Tan</strong>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">jessica.tan@outlook.com</div>
                            </td>
                            <td><span class="badge badge-blood">A+</span></td>
                            <td>23y &bull; Female</td>
                            <td>54 kg</td>
                            <td>
                                <div>Dauis</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">Bohol &bull; Poblacion</div>
                            </td>
                            <td>+63 928 345 6789</td>
                            <td>First time</td>
                            <td><span class="badge badge-success">Available</span></td>
                            <td style="text-align: right;">
                                <a href="tel:+639283456789" class="btn btn-outline btn-sm">Contact</a>
                            </td>
                        </tr>
                        <tr>
                            <td><code>#D-0003</code></td>
                            <td>
                                <strong>Bea Mendoza</strong>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">bea.mendoza@gmail.com</div>
                            </td>
                            <td><span class="badge badge-blood">O-</span></td>
                            <td>28y &bull; Female</td>
                            <td>58 kg</td>
                            <td>
                                <div>Panglao</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">Bohol &bull; Tawala</div>
                            </td>
                            <td>+63 945 567 8901</td>
                            <td>5 mos ago</td>
                            <td><span class="badge badge-success">Available</span></td>
                            <td style="text-align: right;">
                                <a href="tel:+639455678901" class="btn btn-outline btn-sm">Contact</a>
                            </td>
                        </tr>
                        <tr>
                            <td><code>#D-0004</code></td>
                            <td>
                                <strong>Ronald Gomez</strong>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">ronald.gomez@yahoo.com</div>
                            </td>
                            <td><span class="badge badge-blood">B+</span></td>
                            <td>31y &bull; Male</td>
                            <td>74 kg</td>
                            <td>
                                <div>Tubigon</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">Bohol &bull; Centro</div>
                            </td>
                            <td>+63 939 456 7890</td>
                            <td>1 mo ago</td>
                            <td><span class="badge badge-warning">Cooldown</span></td>
                            <td style="text-align: right;">
                                <span style="font-size: 0.75rem; color: var(--text-muted);">Eligible in 60d</span>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
