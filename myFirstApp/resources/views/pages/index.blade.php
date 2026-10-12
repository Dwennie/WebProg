@extends('layouts.blood')

@section('title', 'Clinical Protocols & Educational Articles - BloodCare')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Clinical Protocols & Informational Pages</h1>
            <p class="page-subtitle">Evidence-based donor eligibility guidelines, transfusion safety standards, and public health awareness resources.</p>
        </div>
        <div>
            <a href="{{ url('/pages/create') }}" class="btn btn-primary">+ Create New Article</a>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="filter-panel">
        <div style="flex: 2; min-width: 220px;">
            <input type="text" class="form-control" placeholder="Search page title, slug, or keywords...">
        </div>
        <div style="flex: 1; min-width: 170px;">
            <select class="form-select">
                <option value="">All Categories</option>
                <option value="guidelines">Eligibility Guidelines</option>
                <option value="clinical">Clinical Protocols</option>
                <option value="educational">Public Education</option>
                <option value="faq">Frequently Asked Questions</option>
            </select>
        </div>
        <div>
            <button type="button" class="btn btn-outline">Filter Pages</button>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Published Information Registry</h2>
            <span style="font-size: 0.8125rem; color: var(--text-muted);">
                Showing {{ isset($pages) && $pages->count() ? $pages->count() : 4 }} article(s)
            </span>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Article Title & Slug</th>
                        <th style="width: 140px;">Category</th>
                        <th>Summary / Clinical Scope</th>
                        <th style="width: 80px;">Order</th>
                        <th style="width: 110px;">Status</th>
                        <th style="width: 120px;">Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($pages) && $pages->isNotEmpty())
                        @foreach ($pages as $p)
                            <tr>
                                <td><code>#PG-{{ str_pad($p->id, 3, '0', STR_PAD_LEFT) }}</code></td>
                                <td>
                                    <strong>{{ $p->title }}</strong>
                                    <div style="font-size: 0.75rem; color: var(--text-muted);"><code>/page/{{ $p->slug }}</code></div>
                                </td>
                                <td><span class="badge badge-neutral">{{ ucfirst($p->category) }}</span></td>
                                <td style="max-width: 320px; font-size: 0.8125rem; color: var(--text-muted);">
                                    {{ Str::limit($p->summary ?? $p->body, 90) }}
                                </td>
                                <td>{{ $p->order }}</td>
                                <td>
                                    @if ($p->status === 'published')
                                        <span class="badge badge-success">Published</span>
                                    @else
                                        <span class="badge badge-neutral">Draft</span>
                                    @endif
                                </td>
                                <td>{{ $p->updated_at ? $p->updated_at->format('M d, Y') : 'Recent' }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td><code>#PG-001</code></td>
                            <td>
                                <strong>Whole Blood Donation Eligibility Criteria</strong>
                                <div style="font-size: 0.75rem; color: var(--text-muted);"><code>/page/eligibility-criteria</code></div>
                            </td>
                            <td><span class="badge badge-neutral">Guidelines</span></td>
                            <td style="max-width: 320px; font-size: 0.8125rem; color: var(--text-muted);">
                                Detailed medical pre-requisites including body mass index, minimum hemoglobin (12.5 g/dL), blood pressure, and age limits (17–70).
                            </td>
                            <td>1</td>
                            <td><span class="badge badge-success">Published</span></td>
                            <td>Sep 15, 2026</td>
                        </tr>
                        <tr>
                            <td><code>#PG-002</code></td>
                            <td>
                                <strong>Transfusion Adverse Reaction Protocols</strong>
                                <div style="font-size: 0.75rem; color: var(--text-muted);"><code>/page/adverse-reactions</code></div>
                            </td>
                            <td><span class="badge badge-neutral">Clinical</span></td>
                            <td style="max-width: 320px; font-size: 0.8125rem; color: var(--text-muted);">
                                Emergency management guidelines for febrile non-hemolytic reactions, allergic responses, and post-donation vasovagal syncope.
                            </td>
                            <td>2</td>
                            <td><span class="badge badge-success">Published</span></td>
                            <td>Sep 16, 2026</td>
                        </tr>
                        <tr>
                            <td><code>#PG-003</code></td>
                            <td>
                                <strong>Universal Transfusion & Blood Group Matching</strong>
                                <div style="font-size: 0.75rem; color: var(--text-muted);"><code>/page/compatibility-matrix</code></div>
                            </td>
                            <td><span class="badge badge-neutral">Educational</span></td>
                            <td style="max-width: 320px; font-size: 0.8125rem; color: var(--text-muted);">
                                Comprehensive reference for Rh(D) antigens and ABO antigen cross-matching for whole blood, packed red cells, and fresh frozen plasma.
                            </td>
                            <td>3</td>
                            <td><span class="badge badge-success">Published</span></td>
                            <td>Sep 18, 2026</td>
                        </tr>
                        <tr>
                            <td><code>#PG-004</code></td>
                            <td>
                                <strong>Donor Pre-Donation Nutrition & Preparation</strong>
                                <div style="font-size: 0.75rem; color: var(--text-muted);"><code>/page/pre-donation-nutrition</code></div>
                            </td>
                            <td><span class="badge badge-neutral">Educational</span></td>
                            <td style="max-width: 320px; font-size: 0.8125rem; color: var(--text-muted);">
                                Recommended dietary guidelines 24 hours prior to donation: hydration, iron-rich meals, and avoiding fatty meals or alcohol.
                            </td>
                            <td>4</td>
                            <td><span class="badge badge-success">Published</span></td>
                            <td>Sep 20, 2026</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
