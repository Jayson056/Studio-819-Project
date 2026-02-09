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
        $adminName = "Admin";
        
        $totalUsers = DB::table('users')->where('role_id', 2)->count();
        $totalBookings = DB::table('bookings')->count();
        
        // Dynamic Revenue Calculation
        $totalRevenue = DB::table('payments')
            ->where('payment_status', 'Verified')
            ->sum('amount');
            
        $totalPackages = DB::table('packages')->count();
        $totalAddOns = DB::table('addons')->count();

        return view('Studio-819.administrator.admindashboard', compact(
            'adminName',
            'totalUsers',
            'totalBookings',
            'totalRevenue',
            'totalPackages',
            'totalAddOns'
        ));
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

        $packages = DB::table('packages')->get();
        $addons = DB::table('addons')->get();
        $backdrops = DB::table('backdrops')->get();

        return view('Studio-819.administrator.adminpackages', compact(
            'adminName',
            'packages',
            'addons',
            'backdrops'
        ));
    }

    public function storePackage(Request $request)
    {
        $table = ($request->type == 'package') ? 'packages' : (($request->type == 'addon') ? 'addons' : 'backdrops');
        $nameCol = $request->type . '_name';
        $data = [$nameCol => $request->name, 'created_at' => now()];

        if ($request->type == 'package') {
            $data['base_price'] = $request->price;
            $data['pax_limit'] = 0; 
        } elseif ($request->type == 'addon') {
            $data['price'] = $request->price;
        }

        DB::table($table)->insert($data);
        return back()->with('success', 'Added!');
    }

    public function updatePackage(Request $request)
    {
        $table = ($request->type == 'package') ? 'packages' : (($request->type == 'addon') ? 'addons' : 'backdrops');
        $idCol = $request->type . '_id';
        $nameCol = $request->type . '_name';
        $data = [$nameCol => $request->name];
        
        if ($request->type != 'backdrop') {
            $data[$request->type == 'package' ? 'base_price' : 'price'] = $request->price;
        }

        DB::table($table)->where($idCol, $request->id)->update($data);
        return back()->with('success', 'Updated!');
    }

    public function deletePackage($type, $id)
    {
        $table = ($type == 'package') ? 'packages' : (($type == 'addon') ? 'addons' : 'backdrops');
        $idCol = $type . '_id';
        DB::table($table)->where($idCol, $id)->delete();
        return back()->with('success', 'Deleted!');
    }

    /* ===========================
       ADMIN CUSTOMER ACTIONS
    =========================== */
    public function updateCustomer(Request $request)
    {
        DB::table('customers')
            ->where('customer_id', $request->customer_id)
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
            ]);

        $userId = DB::table('customers')->where('customer_id', $request->customer_id)->value('user_id');

        DB::table('users')
            ->where('user_id', $userId)
            ->update(['email' => $request->email]);

        return back()->with('success', 'Customer updated successfully!');
    }

    public function deleteCustomer($id)
    {
        $userId = DB::table('customers')->where('customer_id', $id)->value('user_id');

        DB::table('customers')->where('customer_id', $id)->delete();
        DB::table('users')->where('user_id', $userId)->delete();

        return back()->with('success', 'Customer deleted.');
    }
}
