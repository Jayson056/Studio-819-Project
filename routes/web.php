<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


//==============================
// Public Pages
//==============================
Route::get('/Studio-819', [UserController::class, 'Studio_819'])->name('Studio-819/index');
Route::get('/Studio-819-login-singup', [UserController::class, 'login_signup'])->name('Studio-819/loginsignup');
Route::post('/login-submit', [UserController::class, 'login'])->name('login.submit'); // normal user login
Route::post('/signup-submit', [UserController::class, 'signup'])->name('signup.submit'); // normal user signup
Route::get('/Studio-819-about', [UserController::class, 'about'])->name('Studio-819/about');
Route::get('/Studio-819-booking', [UserController::class, 'booking'])->name('Studio-819/booking');

// Contact form submission
Route::post('/contact-send', [ContactController::class, 'send'])->name('contact.send');

//==============================
// User Pages
//==============================

//==============================
// User Pages (protected)
//==============================
Route::middleware(['auth'])->group(function () {
    Route::get('/Studio-819-profile', [UserController::class, 'userProfile'])->name('Studio-819/profile');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
});




//==============================
// Admin Authentication Routes
//==============================

// Show admin login form
Route::get('/Studio-819-admin-login', [AdminController::class, 'showLogin'])->name('admin.login');

// Admin login POST
Route::post('/Studio-819-admin-login', [AdminController::class, 'login'])->name('admin.login.submit');

// User login POST
Route::post('/Studio-819-login-submit', [UserController::class, 'login'])->name('login.submit');

// Show admin registration form
Route::get('/Studio-819-admin-register', [AdminController::class, 'showRegister'])->name('admin.register.show');

// Admin registration POST
Route::post('/Studio-819-admin-register', [AdminController::class, 'register'])->name('admin.register');

// Admin logout
Route::post('/Studio-819-admin-logout', [AdminController::class, 'logout'])->name('admin.logout');


//==============================
// Admin Protected Pages
//==============================

// Admin Dashboard


// Admin register page
Route::get('/Studio-819-admin-register', [AdminController::class, 'showRegister'])
    ->name('admin.register');

// Admin register submit
Route::post('/Studio-819-admin-register', [AdminController::class, 'register'])
    ->name('admin.register.submit');

Route::get('/Studio-819-admin-dashboard', function () {
    if (!Auth::check() || Auth::user()->role->role_name !== 'admin') {
        return redirect()->route('admin.login')->with('error', 'Please login as admin first.');
    }

    $adminName = "Admin";
    $totalUsers = DB::table('users')->count();
    $totalPackages = DB::table('packages')->count();

    return view('Studio-819.administrator.admindashboard', compact('adminName', 'totalUsers', 'totalPackages'));
})->name('admin.dashboard');

// Admin Customers
Route::get('/Studio-819-admin-customer', function () {
    if (!Auth::check() || Auth::user()->role->role_name !== 'admin') {
        return redirect()->route('admin.login')->with('error', 'Please login as admin first.');
    }

    $adminName = "Admin";
    $customers = DB::table('customers')
        ->join('users', 'customers.user_id', '=', 'users.user_id')
        ->select('customers.customer_id', 'customers.first_name', 'customers.last_name', 'customers.phone_number', 'users.email')
        ->get();

    return view('Studio-819.administrator.admincustomer', compact('adminName', 'customers'));
})->name('admin.customer');

// Admin Packages
Route::get('/Studio-819-admin-packages', function () {
    if (!Auth::check() || Auth::user()->role->role_name !== 'admin') {
        return redirect()->route('admin.login')->with('error', 'Please login as admin first.');
    }

    $adminName = "Admin";
    $packages = DB::table('packages')
        ->select('package_id', 'package_name', 'base_price')
        ->get();

    return view('Studio-819.administrator.adminpackages', compact('adminName', 'packages'));
})->name('admin.packages');