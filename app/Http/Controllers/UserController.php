<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Customer;

class UserController extends Controller
{
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

    public function contact()
    {
        return view('Studio-819.contact');
    }

    public function services()
    {
        return view('Studio-819.services');
    }

    public function booking()
    {
        $packages = DB::table('packages')->get();
        $addons = DB::table('addons')->get(); // Fetch addons from DB

        return view('Studio-819.booking', compact('packages', 'addons'));
    }

    //==========================
    // User Pages
    //==========================

    // Added underscore to match web.php
    public function C_Studio_819()
    {
        return view('Studio-819.cust_index');
    }

    public function C_about()
    {
        return view('Studio-819.cust_about');
    }

    public function C_contact()
    {
        return view('Studio-819.cust_contact');
    }

    public function C_services()
    {
        return view('Studio-819.cust_services');
    }



    //==========================
    // Handle Login POST
    //==========================
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password_hash)) {
            return back()->withErrors([
                'loginError' => 'Email or password is incorrect'
            ])->withInput();
        }

        Auth::login($user);

        // Redirect based on role using standardized route names
        if ($user->role && strtolower($user->role->role_name) === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.profile');
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

        // Change this line to redirect to the home index route
        return redirect()->route('Studio-819/index')->with('success', 'Logged out successfully.');
    }

    //==========================
    // Handle User Sign Up
    //==========================
    public function signup(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $nameParts = explode(' ', $request->fullName, 2);
        $firstName = $nameParts[0];
        $lastName = $nameParts[1] ?? '';

        $user = User::create([
            'email' => $request->email,
            'password_hash' => Hash::make($request->password),
            'role_id' => 2, // Default Customer role
            'status' => 'Active',
        ]);

        Customer::create([
            'user_id' => $user->user_id,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'phone_number' => $request->phone_number ?? null,
        ]);

        Auth::login($user);

        return redirect()->route('user.profile')->with('success', 'Account created successfully!');
    }

    //==========================
    // User Profile View
    //==========================
    public function userProfile()
    {
        $user = auth()->user();

        // 1. Initialize bookings as an empty collection
        $bookings = collect();

        // 2. Protective check: fetch bookings only if customer record exists
        if ($user->customer) {
            $bookings = DB::table('bookings')
                // Join with payments table to get the amount and verification status
                ->leftJoin('payments', 'bookings.booking_id', '=', 'payments.booking_id')
                ->where('bookings.customer_id', $user->customer->customer_id)
                // Select booking details + payment details
                ->select(
                    'bookings.*',
                    'payments.amount as total_paid',
                    'payments.payment_status'
                )
                ->orderBy('bookings.booking_date', 'desc')
                ->get();
        }

        // 3. Protective check for reviews
        try {
            $reviews = DB::table('reviews')
                ->where('user_id', $user->user_id)
                ->get();
        } catch (\Exception $e) {
            $reviews = collect();
        }

        // 4. Return the view with the combined data
        return view('Studio-819.profile', compact('user', 'bookings', 'reviews'));
    }

    //==========================
    // Update Profile Logic
    //==========================
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
            'phone_number' => 'nullable|string|max:20',
        ]);

        // 1. Update the User table (email)
        $user->update([
            'email' => $request->email
        ]);

        // 2. Update OR Create the Customer table record
        // This is the most reliable way to ensure data hits the database
        $user->customer()->updateOrCreate(
            ['user_id' => $user->user_id], // Search criteria
            [                              // Data to update/create
                'first_name'   => $request->first_name,
                'last_name'    => $request->last_name,
                'phone_number' => $request->phone_number,
            ]
        );

        return back()->with('success', 'Profile updated successfully!');
    }

    public function storeBooking(Request $request)
    {
        $request->validate([
            'package_name'   => 'required|string',
            'booking_date'   => 'required|date',
            'booking_time'   => 'required',
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'phone_number'   => 'required|string|max:20',
            'payment_method' => 'required|string',
            'payment_status' => 'required|string',
            'amount'         => 'required|numeric',
            'addons'         => 'nullable|array'
        ]);

        $user = auth()->user();

        return DB::transaction(function () use ($request, $user) {

            // 1. Update/Create Customer
            $customer = $user->customer()->updateOrCreate(
                ['user_id' => $user->user_id],
                [
                    'first_name'   => $request->first_name,
                    'last_name'    => $request->last_name,
                    'phone_number' => $request->phone_number,
                ]
            );

            // 2. Insert Booking
            $bookingId = DB::table('bookings')->insertGetId([
                'customer_id'  => $customer->customer_id,
                'package_name' => $request->package_name,
                'booking_date' => $request->booking_date,
                'booking_time' => $request->booking_time,
                'status'       => ($request->payment_status === 'Paid') ? 'Confirmed' : 'Pending',
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

            // 3. Insert Addons
            if ($request->has('addons')) {
                foreach ($request->addons as $addonId) {
                    $addon = DB::table('addons')->where('addon_id', $addonId)->first();
                    if ($addon) {
                        DB::table('booking_addons')->insert([
                            'user_id'    => $user->user_id,
                            'booking_id' => $bookingId,
                            'addon_id'   => $addonId,
                            'price'      => $addon->price,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }

            // 4. Insert Payment
            DB::table('payments')->insert([
                'booking_id'     => $bookingId,
                'payment_method' => $request->payment_method,
                'amount'         => $request->amount,
                'payment_status' => ($request->payment_status === 'Paid') ? 'Verified' : 'Pending',
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);

            // FIX: Redirect to a URL if the Route Name is missing
            // Change '/Studio-819-cust_index' to whatever your actual URL path is
            return redirect('/Studio-819-cust_index')->with('success', 'Booking submitted successfully!');
        });
    }
}
