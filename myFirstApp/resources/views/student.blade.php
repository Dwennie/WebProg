<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records Management - CRUD System</title>
    
    <!-- Modern Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-light: #eff6ff;
            --primary-border: #bfdbfe;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --bg-page: #f8fafc;
            --surface: #ffffff;
            --border: #e2e8f0;
            --success: #16a34a;
            --success-bg: #f0fdf4;
            --danger: #dc2626;
            --danger-bg: #fef2f2;
            --warning: #d97706;
            --warning-bg: #fffbeb;
            --radius: 8px;
            --radius-lg: 12px;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background-color: var(--bg-page);
            color: var(--text-main);
            line-height: 1.5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            width: 100%;
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Top Header */
        header.app-header {
            background-color: var(--surface);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 30;
            box-shadow: var(--shadow-sm);
        }

        .header-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 68px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--text-main);
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .brand-badge {
            width: 36px;
            height: 36px;
            background: var(--primary);
            color: #ffffff;
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.1rem;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: var(--radius);
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid transparent;
            transition: all 0.15s ease;
            line-height: 1.25rem;
        }

        .btn-primary {
            background-color: var(--primary);
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
        }

        .btn-outline {
            background-color: #ffffff;
            border-color: var(--border);
            color: var(--text-main);
        }

        .btn-outline:hover {
            background-color: #f1f5f9;
        }

        .btn-danger {
            background-color: #ffffff;
            border-color: #fecaca;
            color: var(--danger);
        }

        .btn-danger:hover {
            background-color: var(--danger-bg);
            border-color: var(--danger);
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 0.8125rem;
        }

        /* Main Content */
        main.main-content {
            flex: 1;
            padding: 32px 0 48px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .page-title {
            font-size: 1.625rem;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .page-subtitle {
            font-size: 0.875rem;
            color: var(--text-muted);
            margin-top: 4px;
        }

        /* Cards */
        .card {
            background-color: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            margin-bottom: 24px;
        }

        .card-header {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 1rem;
            font-weight: 700;
        }

        .card-body {
            padding: 24px 20px;
        }

        /* Stat Grid */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 16px;
        }

        .stat-label {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            font-size: 1.625rem;
            font-weight: 800;
            margin-top: 4px;
            color: var(--text-main);
        }

        /* Filter bar */
        .filter-panel {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 14px 18px;
            margin-bottom: 20px;
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .form-control, .form-select {
            width: 100%;
            padding: 9px 12px;
            font-size: 0.875rem;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            background-color: #ffffff;
            color: var(--text-main);
            outline: none;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        /* Tables */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table.data-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.875rem;
        }

        table.data-table th {
            background-color: #f8fafc;
            padding: 12px 16px;
            font-weight: 600;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border);
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        table.data-table td {
            padding: 12px 16px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        table.data-table tr:hover td {
            background-color: #fcfcfd;
        }

        /* Badges */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 3px 8px;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 700;
            line-height: 1;
        }

        .badge-course {
            background-color: var(--primary-light);
            color: var(--primary);
            border: 1px solid var(--primary-border);
        }

        .badge-active {
            background-color: var(--success-bg);
            color: var(--success);
            border: 1px solid #bbf7d0;
        }

        .badge-warning {
            background-color: var(--warning-bg);
            color: var(--warning);
            border: 1px solid #fde68a;
        }

        .badge-neutral {
            background-color: #f1f5f9;
            color: #475569;
            border: 1px solid var(--border);
        }

        /* Alerts */
        .alert {
            padding: 12px 16px;
            border-radius: var(--radius);
            font-size: 0.875rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background-color: var(--success-bg);
            color: var(--success);
            border: 1px solid #bbf7d0;
        }

        .alert-danger {
            background-color: var(--danger-bg);
            color: var(--danger);
            border: 1px solid #fecaca;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .stat-grid, .grid-2, .grid-3 {
                grid-template-columns: 1fr;
            }
            .page-header {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>
<body>

    <!-- Navigation Header -->
    <header class="app-header">
        <div class="container header-inner">
            <a href="{{ url('/student') }}" class="brand">
                <div class="brand-badge">S</div>
                <div>Student<span>Records</span> <span style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">CRUD System</span></div>
            </a>

            <div class="nav-links">
                <a href="{{ url('/') }}" class="btn btn-outline btn-sm">Home</a>
                <a href="{{ route('student.index') }}" class="btn btn-outline btn-sm {{ ($page ?? 'index') == 'index' ? 'btn-primary' : '' }}">All Students</a>
                <a href="{{ route('student.create') }}" class="btn btn-primary btn-sm">+ Add Student</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">

            <!-- Flash Notifications -->
            @if(session('success'))
                <div class="alert alert-success">
                    <strong>Success:</strong> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <strong>Error:</strong> {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <div>
                        <strong>Please fix the errors below:</strong>
                        <ul style="margin-left: 20px; margin-top: 4px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Legacy / Quick Result Notice if accessed via student.result -->
            @if(isset($page) && $page == 'result')
                <div class="card" style="border-left: 4px solid var(--primary); margin-bottom: 24px;">
                    <div class="card-header">
                        <h2 class="card-title">Submission Result Preview</h2>
                        <span class="badge badge-active">Form Received</span>
                    </div>
                    <div class="card-body">
                        <p style="color: var(--text-muted); margin-bottom: 16px;">Here is the submitted student information from the request:</p>
                        <div style="background: var(--bg-page); padding: 16px; border-radius: var(--radius); border: 1px solid var(--border); margin-bottom: 16px;">
                            <div style="font-size: 1.1rem; font-weight: 700; margin-bottom: 4px;">Name: {{ $name }}</div>
                            <div style="font-size: 0.95rem; color: var(--text-muted);">Course: <span class="badge badge-course">{{ $course }}</span></div>
                        </div>

                        <form action="{{ route('student.store') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="name" value="{{ $name }}">
                            <input type="hidden" name="course" value="{{ $course }}">
                            <button type="submit" class="btn btn-primary btn-sm">Save to Student Directory</button>
                        </form>
                        <a href="{{ route('student.index') }}" class="btn btn-outline btn-sm">Back to Directory</a>
                    </div>
                </div>
            @endif

            <!-- MODE: CREATE (Add New Student) -->
            @if(isset($page) && $page == 'create')
                <div style="max-width: 680px; margin: 0 auto;">
                    <div class="page-header">
                        <div>
                            <h1 class="page-title">Add New Student</h1>
                            <p class="page-subtitle">Register a student record into the academic management system.</p>
                        </div>
                        <div>
                            <a href="{{ route('student.index') }}" class="btn btn-outline btn-sm">&larr; Back to Directory</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Student Information Form</h2>
                            <span class="badge badge-course">Create Operation</span>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('student.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label class="form-label" for="name">Full Name <span style="color: var(--danger);">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="e.g. Juan C. Dela Cruz" required autofocus>
                                </div>

                                <div class="grid-2">
                                    <div class="form-group">
                                        <label class="form-label" for="course">Course / Degree Program <span style="color: var(--danger);">*</span></label>
                                        <input type="text" id="course" name="course" class="form-control" value="{{ old('course') }}" placeholder="e.g. BS Computer Science" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="student_id">Student ID / Number</label>
                                        <input type="text" id="student_id" name="student_id" class="form-control" value="{{ old('student_id') }}" placeholder="e.g. STU-2026-004">
                                    </div>
                                </div>

                                <div class="grid-2">
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email Address</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="e.g. student@university.edu.ph">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="year_level">Year Level</label>
                                        <select id="year_level" name="year_level" class="form-select">
                                            <option value="1st Year" {{ old('year_level') == '1st Year' ? 'selected' : '' }}>1st Year</option>
                                            <option value="2nd Year" {{ old('year_level') == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                                            <option value="3rd Year" {{ old('year_level') == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                                            <option value="4th Year" {{ old('year_level') == '4th Year' ? 'selected' : '' }}>4th Year</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="status">Enrollment Status</label>
                                    <select id="status" name="status" class="form-select" style="max-width: 200px;">
                                        <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Graduating" {{ old('status') == 'Graduating' ? 'selected' : '' }}>Graduating</option>
                                        <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 24px;">
                                    <a href="{{ route('student.index') }}" class="btn btn-outline">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Save Student Record</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <!-- MODE: EDIT (Update Student) -->
            @elseif(isset($page) && $page == 'edit' && isset($student))
                <div style="max-width: 680px; margin: 0 auto;">
                    <div class="page-header">
                        <div>
                            <h1 class="page-title">Edit Student Record</h1>
                            <p class="page-subtitle">Update details for {{ $student->name }}</p>
                        </div>
                        <div>
                            <a href="{{ route('student.index') }}" class="btn btn-outline btn-sm">&larr; Back to Directory</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Modify Student Information</h2>
                            <span class="badge badge-warning">Update Operation</span>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('student.update', $student->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label class="form-label" for="name">Full Name <span style="color: var(--danger);">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
                                </div>

                                <div class="grid-2">
                                    <div class="form-group">
                                        <label class="form-label" for="course">Course / Degree Program <span style="color: var(--danger);">*</span></label>
                                        <input type="text" id="course" name="course" class="form-control" value="{{ old('course', $student->course) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="student_id">Student ID</label>
                                        <input type="text" id="student_id" name="student_id" class="form-control" value="{{ old('student_id', $student->student_id ?? '') }}">
                                    </div>
                                </div>

                                <div class="grid-2">
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email Address</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $student->email ?? '') }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="year_level">Year Level</label>
                                        <select id="year_level" name="year_level" class="form-select">
                                            <option value="1st Year" {{ old('year_level', $student->year_level ?? '') == '1st Year' ? 'selected' : '' }}>1st Year</option>
                                            <option value="2nd Year" {{ old('year_level', $student->year_level ?? '') == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                                            <option value="3rd Year" {{ old('year_level', $student->year_level ?? '') == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                                            <option value="4th Year" {{ old('year_level', $student->year_level ?? '') == '4th Year' ? 'selected' : '' }}>4th Year</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="status">Enrollment Status</label>
                                    <select id="status" name="status" class="form-select" style="max-width: 200px;">
                                        <option value="Active" {{ old('status', $student->status ?? '') == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Graduating" {{ old('status', $student->status ?? '') == 'Graduating' ? 'selected' : '' }}>Graduating</option>
                                        <option value="Inactive" {{ old('status', $student->status ?? '') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 24px;">
                                    <a href="{{ route('student.index') }}" class="btn btn-outline">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update Student</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <!-- MODE: SHOW (View Single Student Details) -->
            @elseif(isset($page) && $page == 'show' && isset($student))
                <div style="max-width: 600px; margin: 0 auto;">
                    <div class="page-header">
                        <div>
                            <h1 class="page-title">Student Details</h1>
                            <p class="page-subtitle">Profile information for {{ $student->name }}</p>
                        </div>
                        <div>
                            <a href="{{ route('student.index') }}" class="btn btn-outline btn-sm">&larr; Back to Directory</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div>
                                <span class="badge badge-course" style="margin-bottom: 4px;">{{ $student->course }}</span>
                                <h2 class="card-title" style="font-size: 1.25rem;">{{ $student->name }}</h2>
                            </div>
                            <span class="badge {{ ($student->status ?? 'Active') == 'Active' ? 'badge-active' : 'badge-neutral' }}">
                                {{ $student->status ?? 'Active' }}
                            </span>
                        </div>
                        <div class="card-body">
                            <div style="display: flex; flex-direction: column; gap: 12px; font-size: 0.9rem;">
                                <div><strong>Student ID:</strong> <code>{{ $student->student_id ?? 'STU-'.str_pad($student->id, 4, '0', STR_PAD_LEFT) }}</code></div>
                                <div><strong>Course:</strong> {{ $student->course }}</div>
                                <div><strong>Year Level:</strong> {{ $student->year_level ?? '1st Year' }}</div>
                                <div><strong>Email:</strong> {{ $student->email ?? 'Not provided' }}</div>
                                <div><strong>Registration Date:</strong> {{ isset($student->created_at) ? \Carbon\Carbon::parse($student->created_at)->format('M d, Y') : 'Recent' }}</div>
                            </div>

                            <div style="display: flex; gap: 10px; margin-top: 24px; padding-top: 16px; border-top: 1px solid var(--border);">
                                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-outline btn-sm">Edit Student</a>
                                <form action="{{ route('student.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- MODE: INDEX (Default Student Directory & Quick Add) -->
            @else
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Student Directory</h1>
                        <p class="page-subtitle">Manage, view, and organize student enrollment records with full CRUD operations.</p>
                    </div>
                    <div>
                        <a href="{{ route('student.create') }}" class="btn btn-primary">+ Add New Student</a>
                    </div>
                </div>

                <!-- KPI Metric Counters -->
                <div class="stat-grid">
                    <div class="stat-card">
                        <div class="stat-label">Total Students</div>
                        <div class="stat-value" style="color: var(--primary);">{{ isset($students) ? $students->count() : 0 }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Enrolled Courses</div>
                        <div class="stat-value">{{ isset($students) ? $students->pluck('course')->unique()->count() : 0 }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Active Enrollment</div>
                        <div class="stat-value" style="color: var(--success);">
                            {{ isset($students) ? $students->where('status', 'Active')->count() : 0 }}
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Graduating</div>
                        <div class="stat-value" style="color: var(--warning);">
                            {{ isset($students) ? $students->where('status', 'Graduating')->count() : 0 }}
                        </div>
                    </div>
                </div>

                <!-- Filter & Search Bar -->
                <form action="{{ route('student.index') }}" method="GET" class="filter-panel">
                    <div style="flex: 2; min-width: 220px;">
                        <input type="text" name="search" class="form-control" placeholder="Search by student name, course, or ID..." value="{{ $search ?? '' }}">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Search</button>
                        @if(!empty($search))
                            <a href="{{ route('student.index') }}" class="btn btn-outline">Clear</a>
                        @endif
                    </div>
                </form>

                <!-- Student Records Table Card -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Enrolled Students</h2>
                        <span style="font-size: 0.8125rem; color: var(--text-muted);">
                            Showing {{ isset($students) ? $students->count() : 0 }} student(s)
                        </span>
                    </div>

                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th style="width: 120px;">Student ID</th>
                                    <th>Full Name</th>
                                    <th>Course</th>
                                    <th style="width: 110px;">Year Level</th>
                                    <th style="width: 100px;">Status</th>
                                    <th style="width: 160px; text-align: right;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($students) && $students->isNotEmpty())
                                    @foreach($students as $s)
                                        <tr>
                                            <td><code>{{ $s->student_id ?? 'STU-'.str_pad($s->id, 4, '0', STR_PAD_LEFT) }}</code></td>
                                            <td>
                                                <strong>{{ $s->name }}</strong>
                                                @if(isset($s->email) && $s->email)
                                                    <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $s->email }}</div>
                                                @endif
                                            </td>
                                            <td><span class="badge badge-course">{{ $s->course }}</span></td>
                                            <td>{{ $s->year_level ?? '1st Year' }}</td>
                                            <td>
                                                @if(($s->status ?? 'Active') == 'Active')
                                                    <span class="badge badge-active">Active</span>
                                                @elseif(($s->status ?? '') == 'Graduating')
                                                    <span class="badge badge-warning">Graduating</span>
                                                @else
                                                    <span class="badge badge-neutral">{{ $s->status ?? 'Inactive' }}</span>
                                                @endif
                                            </td>
                                            <td style="text-align: right; white-space: nowrap;">
                                                <a href="{{ route('student.show', $s->id) }}" class="btn btn-outline btn-sm">View</a>
                                                <a href="{{ route('student.edit', $s->id) }}" class="btn btn-outline btn-sm">Edit</a>
                                                <form action="{{ route('student.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete {{ addslashes($s->name) }}?');" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" style="text-align: center; padding: 32px; color: var(--text-muted);">
                                            No student records found. <a href="{{ route('student.create') }}">Add your first student</a>.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Quick Submission Form (Legacy Test Box) -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Quick Student Entry Test</h3>
                        <span class="badge badge-neutral">Quick POST Form</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('student.result') }}" method="POST">
                            @csrf
                            <div class="grid-2">
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label class="form-label" for="quick_name">Name:</label>
                                    <input type="text" id="quick_name" name="name" class="form-control" placeholder="Student name" required>
                                </div>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label class="form-label" for="quick_course">Course:</label>
                                    <input type="text" id="quick_course" name="course" class="form-control" placeholder="Course name" required>
                                </div>
                            </div>
                            <div style="margin-top: 14px; display: flex; justify-content: flex-end;">
                                <button type="submit" class="btn btn-primary btn-sm">Submit Quick Test</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

        </div>
    </main>

</body>
</html>