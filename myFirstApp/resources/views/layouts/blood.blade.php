<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BloodCare - Blood Donor Management System')</title>
    
    <!-- Professional Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #b91c1c;
            --primary-hover: #991b1b;
            --primary-subtle: #fef2f2;
            --primary-border: #fecaca;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --text-light: #94a3b8;
            --bg-page: #f8fafc;
            --surface: #ffffff;
            --border-color: #e2e8f0;
            --border-dark: #cbd5e1;
            --success: #15803d;
            --success-bg: #f0fdf4;
            --warning: #b45309;
            --warning-bg: #fffbeb;
            --danger: #b91c1c;
            --danger-bg: #fef2f2;
            --info: #0369a1;
            --info-bg: #f0f9ff;
            --radius-sm: 6px;
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
            -webkit-font-smoothing: antialiased;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Top Notification Bar */
        .top-bar {
            background-color: #7f1d1d;
            color: #ffffff;
            font-size: 0.8125rem;
            padding: 7px 0;
            border-bottom: 1px solid #991b1b;
        }

        .top-bar-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar a {
            color: #fca5a5;
            text-decoration: none;
            margin-left: 14px;
            font-weight: 500;
        }

        .top-bar a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        /* Navigation Header */
        header.site-header {
            background-color: var(--surface);
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 40;
            box-shadow: var(--shadow-sm);
        }

        .nav-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 68px;
        }

        .site-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--text-main);
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .brand-icon {
            width: 32px;
            height: 32px;
            background-color: var(--primary);
            color: #ffffff;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-icon svg {
            width: 18px;
            height: 18px;
            fill: currentColor;
        }

        .site-brand span {
            color: var(--primary);
        }

        .main-nav {
            display: flex;
            align-items: center;
            gap: 4px;
            list-style: none;
        }

        .nav-item a {
            display: inline-block;
            padding: 8px 12px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: var(--radius-sm);
            transition: all 0.15s ease;
        }

        .nav-item a:hover {
            color: var(--text-main);
            background-color: #f1f5f9;
        }

        .nav-item a.active {
            color: var(--primary);
            background-color: var(--primary-subtle);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Page Layout */
        .app-main {
            flex: 1;
            padding: 32px 0 48px;
        }

        /* Page Titles & Headers */
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
            color: var(--text-main);
        }

        .page-subtitle {
            font-size: 0.875rem;
            color: var(--text-muted);
            margin-top: 4px;
        }

        /* Standard Cards */
        .card {
            background-color: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            margin-bottom: 24px;
        }

        .card-header {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
        }

        .card-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-main);
        }

        .card-body {
            padding: 20px;
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
            border-color: var(--border-color);
            color: var(--text-main);
        }

        .btn-outline:hover {
            background-color: #f8fafc;
            border-color: var(--border-dark);
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 0.8125rem;
            border-radius: var(--radius-sm);
        }

        .btn-danger {
            background-color: #ef4444;
            color: white;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 6px;
        }

        .form-control, .form-select {
            width: 100%;
            padding: 9px 12px;
            font-size: 0.875rem;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            background-color: #ffffff;
            color: var(--text-main);
            outline: none;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(185, 28, 28, 0.12);
        }

        .form-text {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-top: 4px;
        }

        /* Stat & Metric Cards */
        .stat-card {
            background-color: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            padding: 20px;
            box-shadow: var(--shadow-sm);
        }

        .stat-label {
            font-size: 0.8125rem;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .stat-value {
            font-size: 1.875rem;
            font-weight: 800;
            color: var(--text-main);
            line-height: 1.1;
        }

        .stat-desc {
            font-size: 0.75rem;
            color: var(--text-light);
            margin-top: 6px;
        }

        /* Form Checks */
        .form-check {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 8px;
        }

        .form-check-input {
            margin-top: 3px;
            cursor: pointer;
        }

        .form-check-label {
            font-size: 0.875rem;
            color: var(--text-main);
            cursor: pointer;
        }

        /* Section divider */
        .section-label {
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 24px 0 16px;
            padding-bottom: 8px;
            border-bottom: 1px solid var(--primary-border);
        }

        /* Grid utilities */
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

        .grid-4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
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
            border-bottom: 1px solid var(--border-color);
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        table.data-table td {
            padding: 12px 16px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-main);
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

        .badge-blood {
            background-color: var(--primary-subtle);
            color: var(--primary);
            border: 1px solid var(--primary-border);
        }

        .badge-success {
            background-color: var(--success-bg);
            color: var(--success);
            border: 1px solid #bbf7d0;
        }

        .badge-warning {
            background-color: var(--warning-bg);
            color: var(--warning);
            border: 1px solid #fde68a;
        }

        .badge-danger {
            background-color: var(--danger-bg);
            color: var(--danger);
            border: 1px solid var(--primary-border);
        }

        .badge-neutral {
            background-color: #f1f5f9;
            color: #475569;
            border: 1px solid var(--border-color);
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
            border: 1px solid var(--primary-border);
        }

        /* Filter Bar */
        .filter-panel {
            background-color: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            padding: 14px 18px;
            margin-bottom: 20px;
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
        }

        /* Footer */
        footer.site-footer {
            background-color: #0f172a;
            color: #94a3b8;
            padding: 40px 0 24px;
            font-size: 0.875rem;
            border-top: 1px solid #1e293b;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 32px;
            margin-bottom: 32px;
        }

        .footer-col h5 {
            color: #ffffff;
            font-size: 0.9375rem;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 8px;
        }

        .footer-col ul li a {
            color: #94a3b8;
            text-decoration: none;
        }

        .footer-col ul li a:hover {
            color: #ffffff;
        }

        .footer-bottom {
            border-top: 1px solid #1e293b;
            padding-top: 20px;
            text-align: center;
            font-size: 0.8125rem;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .main-nav {
                display: none;
            }
            .grid-2, .grid-3, .grid-4, .footer-grid {
                grid-template-columns: 1fr;
            }
            .page-header {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Emergency Hotline Banner -->
    <div class="top-bar">
        <div class="container top-bar-inner">
            <div>
                <strong>24/7 Blood Emergency Hotline:</strong> +1 (800) 555-BLOOD (Toll Free)
            </div>
            <div>
                <a href="{{ url('/blood-request/create') }}">Immediate Need?</a>
                <a href="{{ url('/contact-info') }}">Hospital Stations</a>
                <a href="{{ url('/admin/login') }}">Admin Login</a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <header class="site-header">
        <div class="container nav-wrapper">
            <a href="{{ url('/') }}" class="site-brand">
                <div class="brand-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                </div>
                <div>Blood<span>Care</span></div>
            </a>

            <ul class="main-nav">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/blood-donors') }}" class="{{ request()->is('blood-donors*') ? 'active' : '' }}">Donors</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/blood-request') }}" class="{{ request()->is('blood-request*') ? 'active' : '' }}">Blood Requests</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/requirers') }}" class="{{ request()->is('requirers*') ? 'active' : '' }}">Requirers</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/contact-info') }}" class="{{ request()->is('contact-info*') ? 'active' : '' }}">Centers</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/contact-queries') }}" class="{{ request()->is('contact-queries*') ? 'active' : '' }}">Inquiries</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/pages') }}" class="{{ request()->is('pages*') || request()->is('page*') ? 'active' : '' }}">Pages</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin') }}" class="{{ request()->is('admin*') ? 'active' : '' }}">Admin</a>
                </li>
            </ul>

            <div class="nav-actions">
                <a href="{{ url('/blood-donors/create') }}" class="btn btn-primary btn-sm">Become a Donor</a>
                <a href="{{ url('/blood-request/create') }}" class="btn btn-outline btn-sm">Request Blood</a>
            </div>
        </div>
    </header>

    <!-- Main Content Body -->
    <main class="app-main">
        <div class="container">
            <!-- Global Flash Messages -->
            @if (session('success'))
                <div class="alert alert-success">
                    <span>&#10003;</span>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    <span>&#10003;</span>
                    <div>{{ session('status') }}</div>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <span>&#9888;</span>
                    <div>
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <div class="site-brand" style="color: #ffffff; margin-bottom: 12px;">
                        <div class="brand-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                        </div>
                        <div>Blood<span style="color: #ef4444;">Care</span></div>
                    </div>
                    <p style="font-size: 0.8125rem; line-height: 1.6; max-width: 300px;">
                        Standardized hospital and voluntary blood donation network for connecting donors, patients, and healthcare centers.
                    </p>
                </div>

                <div class="footer-col">
                    <h5>Donation Modules</h5>
                    <ul>
                        <li><a href="{{ url('/blood-donors') }}">Registered Donors</a></li>
                        <li><a href="{{ url('/blood-donors/create') }}">Register as Donor</a></li>
                        <li><a href="{{ url('/blood-request') }}">Emergency Requests</a></li>
                        <li><a href="{{ url('/blood-request/create') }}">Submit Blood Request</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h5>Institutional</h5>
                    <ul>
                        <li><a href="{{ url('/requirers') }}">Healthcare Requirers</a></li>
                        <li><a href="{{ url('/contact-info') }}">Blood Stations & Depots</a></li>
                        <li><a href="{{ url('/contact-queries/create') }}">Submit an Inquiry</a></li>
                        <li><a href="{{ url('/pages') }}">Guidelines & Eligibility</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h5>Emergency Dispatch</h5>
                    <p style="color: #ffffff; font-weight: 700; margin-bottom: 4px;">24-Hour Hotline:</p>
                    <p style="color: #f87171; font-weight: 800; font-size: 1.1rem; margin-bottom: 8px;">+1 (800) 555-BLOOD</p>
                    <p style="font-size: 0.8125rem;">Email: emergency@bloodcare.org</p>
                </div>
            </div>

            <div class="footer-bottom">
                &copy; {{ date('Y') }} BloodCare Management System. Designed for clinical and voluntary transfusion coordination.
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
