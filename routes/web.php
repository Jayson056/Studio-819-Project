<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


//==============================
// Redirect Root
//==============================
Route::get('/', function () {
    return redirect('/Studio-819');
});

//==============================
// Public Pages
//==============================
Route::get('/Studio-819', [UserController::class, 'Studio_819'])->name('Studio-819/index');
Route::get('/Studio-819-login-singup', [UserController::class, 'login_signup'])->name('Studio-819/loginsignup');
Route::post('/login-submit', [UserController::class, 'login'])->name('login.submit'); // normal user login
Route::post('/signup-submit', [UserController::class, 'signup'])->name('signup.submit'); // normal user signup
Route::get('/Studio-819-about', [UserController::class, 'about'])->name('Studio-819/about');
Route::get('/Studio-819-booking', [UserController::class, 'booking'])->name('Studio-819/booking');
Route::post('/store-booking', [UserController::class, 'storeBooking'])->name('store.booking');
Route::get('/Studio-819-services', [UserController::class, 'services'])->name('Studio-819/services');

//==============================
// User Pages (Customer)
//==============================
Route::get('/Studio-819-pHome', [UserController::class, 'C_Studio_819'])->name('Studio-819/cust_index');
Route::get('/Studio-819-profile-about', [UserController::class, 'C_about'])->name('Studio-819/cust_about');
Route::get('/Studio-819-profile-services', [UserController::class, 'C_services'])->name('Studio-819/cust_services');
Route::get('/Studio-819-profile-contact', [UserController::class, 'C_contact'])->name('Studio-819/cust_contact');

// Contact form submission
Route::get('/Studio-819-contact', [UserController::class, 'contact'])->name('Studio-819/contact');
Route::post('/contact-send', [ContactController::class, 'send'])->name('contact.send');

//==============================
// Booking post
//==============================
Route::post('/booking-store', [UserController::class, 'storeBooking'])->name('booking.store');


//==============================
// User Pages (protected)
//==============================
Route::middleware(['auth'])->group(function () {
    // 1. Rename this to exactly match your controller and blade needs
    Route::get('/Studio-819-profile', [UserController::class, 'userProfile'])->name('user.profile');

    // 2. Ensure the update route is named correctly
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');

    // 3. Add the logout route
    Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
});





//==============================
// Admin Authentication Routes
//==============================

Route::controller(AdminController::class)->group(function () {
    Route::get('/Studio-819-admin-login', 'showLogin')->name('admin.login');
    Route::post('/Studio-819-admin-login', 'login')->name('admin.login.submit');
    Route::get('/Studio-819-admin-register', 'showRegister')->name('admin.register.show');
    Route::post('/Studio-819-admin-register', 'register')->name('admin.register');
    Route::post('/Studio-819-admin-logout', 'logout')->name('admin.logout');
});

//==============================
// Admin Protected Pages
//==============================
Route::middleware(['admin'])->group(function () {
    Route::get('/Studio-819-dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/Studio-819-admincustomer', [AdminController::class, 'adminCustomer'])->name('admin.customer');
    Route::get('/Studio-819-adminpackages', [AdminController::class, 'adminPackages'])->name('admin.packages');
    // Package Management
    Route::post('/admin/packages/store', [AdminController::class, 'storePackage'])->name('admin.packages.store');
    Route::put('/admin/packages/update', [AdminController::class, 'updatePackage'])->name('admin.packages.update');
    Route::delete('/admin/packages/delete/{type}/{id}', [AdminController::class, 'deletePackage'])->name('admin.packages.delete');

    // Customer Management
    Route::put('/admin/customer/update', [AdminController::class, 'updateCustomer'])->name('admin.customer.update');
    Route::delete('/admin/customer/delete/{id}', [AdminController::class, 'deleteCustomer'])->name('admin.customer.delete');

    // Admin Bookings
    Route::get('Studio-819-admin/bookings', [BookingController::class, 'index'])->name('admin.bookings');
    Route::patch('/admin/bookings/{id}/status', [BookingController::class, 'updateStatus'])->name('admin.bookings.update-status');
    Route::post('/admin/bookings/store', [BookingController::class, 'store'])->name('admin.bookings.store');

    // Admin Payments
    Route::get('Studio-819-/admin/payment', [PaymentController::class, 'index'])->name('admin.payment');
    Route::post('/admin/payment/verify', [PaymentController::class, 'verify'])->name('admin.payment.verify');
});