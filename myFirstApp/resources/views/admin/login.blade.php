<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - BloodCare System</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #b91c1c;
            --primary-hover: #991b1b;
            --primary-light: #fef2f2;
            --primary-border: #fecaca;
            --secondary: #0f172a;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --card-bg: #ffffff;
            --radius: 8px;
            --radius-lg: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background-color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            color: var(--text-main);
        }

        .login-card {
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            width: 100%;
            max-width: 440px;
            padding: 36px 32px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
        }

        .brand-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .brand-logo {
            width: 44px;
            height: 44px;
            background: var(--primary);
            color: #ffffff;
            border-radius: var(--radius);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
        }

        .brand-logo svg {
            width: 22px;
            height: 22px;
            fill: #ffffff;
        }

        .brand-title {
            font-size: 1.375rem;
            font-weight: 800;
            color: var(--text-main);
            letter-spacing: -0.5px;
        }

        .brand-title span {
            color: var(--primary);
        }

        .brand-subtitle {
            color: var(--text-muted);
            font-size: 0.875rem;
            margin-top: 4px;
        }

        /* Demo Credentials Callout */
        .demo-badge {
            background: var(--primary-light);
            border: 1px solid var(--primary-border);
            border-radius: var(--radius);
            padding: 12px 16px;
            margin-bottom: 24px;
            font-size: 0.8125rem;
            color: var(--text-main);
        }

        .demo-badge strong {
            display: block;
            margin-bottom: 4px;
            color: var(--primary);
            font-size: 0.8125rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .demo-badge code {
            background: #ffffff;
            border: 1px solid var(--primary-border);
            padding: 2px 6px;
            border-radius: 4px;
            font-family: monospace;
            font-weight: 600;
            color: var(--primary);
        }

        /* Alerts */
        .alert {
            padding: 12px 14px;
            border-radius: var(--radius);
            font-size: 0.875rem;
            margin-bottom: 20px;
            line-height: 1.4;
        }

        .alert-danger {
            background-color: #fef2f2;
            border: 1px solid #fee2e2;
            color: #991b1b;
        }

        .alert-success {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #15803d;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 6px;
            color: var(--text-main);
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            font-size: 0.875rem;
            outline: none;
            transition: all 0.15s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(185, 28, 28, 0.12);
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.875rem;
            color: var(--text-muted);
            margin-bottom: 20px;
        }

        .btn-submit {
            width: 100%;
            background: var(--primary);
            color: #ffffff;
            border: none;
            padding: 11px;
            border-radius: var(--radius);
            font-size: 0.9375rem;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.15s ease;
        }

        .btn-submit:hover {
            background: var(--primary-hover);
        }

        .footer-link {
            text-align: center;
            margin-top: 24px;
            font-size: 0.8125rem;
        }

        .footer-link a {
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 600;
        }

        .footer-link a:hover {
            color: var(--primary);
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="brand-header">
            <div class="brand-logo">
                <svg viewBox="0 0 24 24">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
            </div>
            <h1 class="brand-title">Blood<span>Care</span> Portal</h1>
            <p class="brand-subtitle">Administrator Authentication</p>
        </div>

        <!-- Working Credentials for Class & Testing -->
        <div class="demo-badge">
            <strong>Administrator Access Credentials</strong>
            <div>Email: <code>admin@bloodcare.org</code></div>
            <div style="margin-top: 4px;">Password: <code>admin123</code> <span style="font-size: 0.75rem; color: var(--text-muted);">(Hashed with bcrypt)</span></div>
        </div>

        <!-- Success Status Notice -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <!-- Error Feedback -->
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ url('/admin/login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">Admin Email Address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-control" 
                    value="{{ old('email', 'admin@bloodcare.org') }}" 
                    placeholder="admin@bloodcare.org" 
                    required 
                    autocomplete="email"
                    autofocus
                >
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="form-control" 
                    placeholder="Enter password" 
                    required 
                    autocomplete="current-password"
                >
            </div>

            <div class="form-check">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember" style="cursor: pointer;">Remember this session</label>
            </div>

            <button type="submit" class="btn-submit">Sign In to Dashboard</button>
        </form>

        <div class="footer-link">
            <a href="{{ url('/') }}">&larr; Return to Public Portal</a>
        </div>
    </div>

</body>
</html>
