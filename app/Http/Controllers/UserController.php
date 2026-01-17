<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Customer;

class UserController extends Controller
{
    //========================================================================================================
    // Studio-819 UserController.php

    //==========================
    // Public Pages
    //==========================
    public function Studio_819()
    {
        return view('Studio-819.index');
    }

    public function login_signup()
    {
        return view('Studio-819.loginsignup');
    }

    public function about()
    {
        return view('Studio-819.about');
    }

    public function booking()
    {
        return view('Studio-819.booking');
    }

    //==========================
    // Handle Login POST
    //==========================
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Find user by email
        $user = User::where('email', $request->email)->first();

        // Check if user exists and password matches
        if (!$user || !Hash::check($request->password, $user->password_hash)) {
            return back()->withErrors([
                'loginError' => 'Email or password is incorrect'
            ])->withInput();
        }

        // Log the user in
        Auth::login($user);

        // Redirect based on role
        if ($user->role && strtolower($user->role->role_name) === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('Studio-819/profile'); // <-- fixed route name
        }
    }

    //==========================
    // Handle Logout
    //==========================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('Studio-819/loginsignup')->with('success', 'Logged out successfully.');
    }

    //==========================
    // Handle User Sign Up
    //==========================
    public function signup(Request $request)
    {
        // Validate input
        $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // uses password_confirmation
        ]);

        // Split full name into first and last
        $nameParts = explode(' ', $request->fullName, 2);
        $firstName = $nameParts[0];
        $lastName = $nameParts[1] ?? '';

        // Create user
        $user = User::create([
            'email' => $request->email,
            'password_hash' => Hash::make($request->password),
            'role_id' => 2, // Customer role
            'status' => 'Active',
        ]);

        // Create linked customer profile
        Customer::create([
            'user_id' => $user->user_id,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'phone_number' => $request->phone_number ?? null,
        ]);

        // Auto-login after registration
        Auth::login($user);

        return redirect()->route('Studio-819/profile')->with('success', 'Account created successfully!'); // <-- fixed
    }

    //==========================
    // User Profile
    //==========================
    public function userProfile()
    {
        $user = auth()->user();

        // Fetch bookings and reviews for this user
        $bookings = DB::table('bookings')
            ->where('customer_id', $user->customer?->customer_id)
            ->get();

        $reviews = DB::table('reviews')
            ->where('user_id', $user->user_id)
            ->get();

        return view('Studio-819.profile', compact('user', 'bookings', 'reviews'));
    }
}
