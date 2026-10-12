<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    /**
     * Display the admin login page.
     */
    public function showLoginForm()
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect('/admin');
        }

        return view('admin.login');
    }

    /**
     * Handle an admin login attempt with secure password hash verification.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find user by email
        $user = User::where('email', $credentials['email'])->first();

        // Verify password using Hash::check (bcrypt hash validation)
        if ($user && Hash::check($credentials['password'], $user->password)) {
            if ($user->isAdmin()) {
                Auth::login($user, $request->boolean('remember'));
                $request->session()->regenerate();

                return redirect()->route('admin.index')
                    ->with('success', 'Welcome back, ' . $user->name . '!');
            }

            return back()->withErrors([
                'email' => 'Access denied: You do not have administrator permissions.',
            ])->onlyInput('email');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password. Please verify your credentials.',
        ])->onlyInput('email');
    }

    /**
     * Log the admin out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login')->with('status', 'You have successfully logged out.');
    }
}

