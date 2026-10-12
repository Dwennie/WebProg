@extends('layouts.blood')

@section('title', 'Publish Clinical Protocol / Article - BloodCare')

@section('content')
    <div style="max-width: 800px; margin: 0 auto;">
        <div class="page-header">
            <div>
                <h1 class="page-title">Publish Clinical Protocol / Article</h1>
                <p class="page-subtitle">Publish clinical donation documentation, donor instructions, or transfusion reference standards.</p>
            </div>
            <div>
                <a href="{{ url('/pages') }}" class="btn btn-outline btn-sm">&larr; Back to Pages</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Article Editor</h2>
                <span class="badge badge-neutral">Clinical Publication</span>
            </div>

            <div class="card-body">
                <form action="{{ url('/pages') }}" method="POST">
                    @csrf

                    <div class="section-label" style="margin-top: 0;">1. Article Metadata</div>

                    <div class="form-group">
                        <label class="form-label" for="title">Article / Protocol Title <span style="color: var(--primary);">*</span></label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" placeholder="e.g. Whole Blood Donation Eligibility Criteria" required>
                    </div>

                    <div class="grid-3">
                        <div class="form-group">
                            <label class="form-label" for="slug">URL Slug (Optional)</label>
                            <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="e.g. eligibility-criteria">
                            <div class="form-text">Auto-generated from title if left blank.</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="category">Category <span style="color: var(--primary);">*</span></label>
                            <select id="category" name="category" class="form-select" required>
                                <option value="guidelines" {{ old('category') == 'guidelines' ? 'selected' : '' }}>Eligibility Guidelines</option>
                                <option value="clinical" {{ old('category') == 'clinical' ? 'selected' : '' }}>Clinical Protocols</option>
                                <option value="educational" {{ old('category') == 'educational' ? 'selected' : '' }}>Public Education</option>
                                <option value="faq" {{ old('category') == 'faq' ? 'selected' : '' }}>Frequently Asked Questions</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="order">Display Order Index</label>
                            <input type="number" id="order" name="order" class="form-control" min="0" value="{{ old('order', 1) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="summary">Clinical Scope Summary (Abstract)</label>
                        <textarea id="summary" name="summary" rows="2" class="form-control" placeholder="Brief 1-2 sentence overview of the article's clinical or educational scope...">{{ old('summary') }}</textarea>
                    </div>

                    <div class="section-label">2. Article Body & Content</div>

                    <div class="form-group">
                        <label class="form-label" for="body">Full Article Content <span style="color: var(--primary);">*</span></label>
                        <textarea id="body" name="body" rows="8" class="form-control" placeholder="Detailed evidence-based medical protocol, guidelines, clinical considerations..." required>{{ old('body') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="status">Publication Status</label>
                        <select id="status" name="status" class="form-select" style="max-width: 200px;">
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published (Live)</option>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft (Review)</option>
                        </select>
                    </div>

                    <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 24px;">
                        <a href="{{ url('/pages') }}" class="btn btn-outline">Cancel</a>
                        <button type="submit" class="btn btn-primary">Publish Article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
