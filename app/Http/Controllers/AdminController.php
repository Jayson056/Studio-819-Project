<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{
    /* ===========================
       SHOW ADMIN LOGIN
    =========================== */
    public function showLogin()
    {
        return view('Studio-819.administrator.admin');
    }

    /* ===========================
       HANDLE ADMIN LOGIN
    =========================== */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::where('email', $request->email)
            ->whereHas('role', function ($q) {
                $q->where('role_name', 'admin');
            })
            ->first();

        // Email OR role not found
        if (!$user) {
            return back()
                ->withErrors(['email' => 'Invalid email or password'])
                ->withInput();
        }

        // Password mismatch
        if (!Hash::check($request->password, $user->password_hash)) {
            return back()
                ->withErrors(['password' => 'Wrong password'])
                ->withInput();
        }

        // Account inactive
        if ($user->status !== 'Active') {
            return back()
                ->withErrors(['email' => 'Account is inactive']);
        }

        Auth::login($user);

        return redirect()->route('admin.dashboard');
    }

    /* ===========================
       SHOW ADMIN REGISTER
    =========================== */
    public function showRegister()
    {
        return view('Studio-819.administrator.admin-register');
    }

    /* ===========================
       HANDLE ADMIN REGISTER
    =========================== */
    public function register(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $adminRole = Role::where('role_name', 'admin')->first();

        if (!$adminRole) {
            return back()->withErrors([
                'role' => 'Admin role not found. Please create it first.'
            ]);
        }

        User::create([
            'email'          => $request->email,
            'password_hash'  => Hash::make($request->password),
            'status'         => 'Active',
            'role_id'        => $adminRole->role_id,
        ]);

        return redirect()
            ->route('admin.login')
            ->with('success', 'Admin account created successfully!');
    }

    /* ===========================
       ADMIN LOGOUT
    =========================== */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('admin.login')
            ->with('success', 'Logged out successfully.');
    }

    /* ===========================
       ADMIN DASHBOARD
    =========================== */
    public function adminDashboard()
    {
        if (!Auth::check() || Auth::user()->role->role_name !== 'admin') {
            return redirect()->route('admin.login');
        }

        $adminName = 'Admin';

        $totalUsers = DB::table('users')->count();
        $totalPackages = DB::table('packages')->count();

        return view(
            'Studio-819.administrator.admindashboard',
            compact('adminName', 'totalUsers', 'totalPackages')
        );
    }

    /* ===========================
       ADMIN CUSTOMER PAGE
    =========================== */
    public function adminCustomer()
    {
        $adminName = 'Admin';

        $customers = DB::table('customers')
            ->join('users', 'customers.user_id', '=', 'users.user_id')
            ->select(
                'customers.customer_id',
                'customers.first_name',
                'customers.last_name',
                'customers.phone_number',
                'users.email'
            )
            ->get();

        return view(
            'Studio-819.administrator.admincustomer',
            compact('adminName', 'customers')
        );
    }

    /* ===========================
       ADMIN PACKAGES PAGE
    =========================== */
    public function adminPackages()
    {
        $adminName = 'Admin';

        $packages = DB::table('packages')
            ->select('package_id', 'package_name', 'base_price')
            ->get();

        return view(
            'Studio-819.administrator.adminpackages',
            compact('adminName', 'packages')
        );
    }
}
