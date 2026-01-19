<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


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

// Show admin login form
Route::get('/Studio-819-admin-login', [AdminController::class, 'showLogin'])->name('admin.login');

// Admin login POST
Route::post('/Studio-819-admin-login', [AdminController::class, 'login'])->name('admin.login.submit');

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


// Route to show the registration form
Route::get('/admin/register', [AdminController::class, 'showAdminRegister'])->name('admin.register');

// Route to handle the form submission
Route::post('/admin/register-submit', [AdminController::class, 'registerAdmin'])->name('admin.register.submit');

    

// Admin Dashboard Route
Route::get('/Studio-819-admin-dashboard', function () {
    if (!Auth::check() || Auth::user()->role->role_name !== 'admin') {
        return redirect()->route('admin.login')->with('error', 'Please login as admin first.');
    }

    $adminName = "Admin";

    $totalUsers = DB::table('users')->where('role_id', 2)->count();
    $totalBookings = DB::table('bookings')->count();

    // FIXED: Changed packages.price to packages.base_price
    // Inside your Dashboard Route
    $totalRevenue = DB::table('payments')
        ->where('payment_status', 'Verified')
        ->sum('amount'); // This will now result in 850.00

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


Route::get('/Studio-819-admin-packages', function () {
    // 1. Security Check
    if (!Auth::check() || Auth::user()->role->role_name !== 'admin') {
        return redirect()->route('admin.login');
    }

    $adminName = "Admin";

    // 2. Fetch all data from the database
    $packages = DB::table('packages')->get();
    $addons = DB::table('addons')->get();

    // If you have a backdrops table, fetch it too:
    $backdrops = DB::table('backdrops')->get();

    // 3. Send everything to the view
    return view('Studio-819.administrator.adminpackages', compact(
        'adminName',
        'packages',
        'addons',
        'backdrops'
    ));
})->name('admin.packages');



// Store New Item
Route::post('/admin/packages/store', function (Request $request) {
    $table = ($request->type == 'package') ? 'packages' : (($request->type == 'addon') ? 'addons' : 'backdrops');
    $nameCol = $request->type . '_name';
    $data = [$nameCol => $request->name, 'created_at' => now()];

    if ($request->type == 'package') {
        $data['base_price'] = $request->price;
        $data['pax_limit'] = 0; // <--- ADD THIS LINE (or whatever default you want)
    } elseif ($request->type == 'addon') {
        $data['price'] = $request->price;
    }

    DB::table($table)->insert($data);
    return back()->with('success', 'Added!');
})->name('admin.packages.store');

// Update Existing Item
Route::put('/admin/packages/update', function (Request $request) {
    $table = ($request->type == 'package') ? 'packages' : (($request->type == 'addon') ? 'addons' : 'backdrops');
    $idCol = $request->type . '_id';
    $nameCol = $request->type . '_name';
    $data = [$nameCol => $request->name];
    if ($request->type != 'backdrop') $data[$request->type == 'package' ? 'base_price' : 'price'] = $request->price;

    DB::table($table)->where($idCol, $request->id)->update($data);
    return back()->with('success', 'Updated!');
})->name('admin.packages.update');

// Delete Item
Route::delete('/admin/packages/delete/{type}/{id}', function ($type, $id) {
    $table = ($type == 'package') ? 'packages' : (($type == 'addon') ? 'addons' : 'backdrops');
    $idCol = $type . '_id';
    DB::table($table)->where($idCol, $id)->delete();
    return back()->with('success', 'Deleted!');
})->name('admin.packages.delete');









// admincustomer

// Update Customer and their associated User email
Route::put('/admin/customer/update', function (Request $request) {
    // 1. Update the Customer profile
    DB::table('customers')
        ->where('customer_id', $request->customer_id)
        ->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
        ]);

    // 2. Update the Email in the users table (linked via user_id)
    $customerId = $request->customer_id;
    $userId = DB::table('customers')->where('customer_id', $customerId)->value('user_id');

    DB::table('users')
        ->where('user_id', $userId)
        ->update(['email' => $request->email]);

    return back()->with('success', 'Customer updated successfully!');
})->name('admin.customer.update');

// Delete Customer
Route::delete('/admin/customer/delete/{id}', function ($id) {
    // Note: If you have foreign key constraints, you may need to delete the user record too
    $userId = DB::table('customers')->where('customer_id', $id)->value('user_id');

    DB::table('customers')->where('customer_id', $id)->delete();
    DB::table('users')->where('user_id', $userId)->delete();

    return back()->with('success', 'Customer deleted.');
})->name('admin.customer.delete');










// adminbookings

// Show Admin Bookings
Route::get('Studio-819-admin/bookings', function (Request $request) {
    $search = $request->query('search');
    $adminName = "Admin";

    $bookingsQuery = DB::table('bookings')
        ->join('customers', 'bookings.customer_id', '=', 'customers.customer_id')
        ->select('bookings.*', 'customers.first_name', 'customers.last_name');

    if ($search) {
        $bookingsQuery->where('customers.first_name', 'LIKE', "%$search%")
            ->orWhere('customers.last_name', 'LIKE', "%$search%")
            ->orWhere('bookings.booking_id', 'LIKE', "%$search%");
    }

    $bookings = $bookingsQuery->orderBy('booking_date', 'desc')->get();
    $packages = DB::table('packages')->get();

    return view('Studio-819.administrator.adminbookings', compact('bookings', 'adminName', 'packages'));
})->name('admin.bookings');

// Update Booking Status
Route::patch('/admin/bookings/{id}/status', function (Request $request, $id) {
    DB::table('bookings')->where('booking_id', $id)->update([
        'status' => $request->status,
        'updated_at' => now()
    ]);
    return back()->with('success', 'Status updated to ' . $request->status);
})->name('admin.bookings.update-status');

// Store Admin Booking
Route::post('/admin/bookings/store', function (Request $request) {
    // 1. Find the customer by email
    $user = DB::table('users')->where('email', $request->email)->first();

    if (!$user) return back()->with('error', 'User with this email not found.');

    $customer = DB::table('customers')->where('user_id', $user->user_id)->first();

    // 2. Insert the booking
    DB::table('bookings')->insert([
        'customer_id'  => $customer->customer_id,
        'package_name' => $request->package_name,
        'booking_date' => $request->booking_date,
        'booking_time' => $request->booking_time,
        'status'       => 'Confirmed',
        'created_at'   => now(),
        'updated_at'   => now()
    ]);

    return back()->with('success', 'New booking created successfully!');
})->name('admin.bookings.store');





// Ensure the ->name() part matches the view exactly
Route::get('/Studio-819-booking', [UserController::class, 'booking'])->name('Studio-819/booking');



// adminpayment


Route::get('Studio-819-/admin/payment', function () {
    $adminName = "Admin";

    $payments = DB::table('bookings')
        ->join('customers', 'bookings.customer_id', '=', 'customers.customer_id')
        // Left join so we don't lose bookings that don't have a payment row yet
        ->leftJoin('payments', 'bookings.booking_id', '=', 'payments.booking_id')
        ->select(
            'bookings.booking_id',
            'bookings.package_name',
            'customers.first_name',
            'customers.last_name',
            'payments.payment_id',
            // If payment record is missing, show 'Pending' and use a default amount logic
            DB::raw('IFNULL(payments.payment_status, "Pending") as payment_status'),
            'payments.payment_method',
            'payments.reference_number',
            // Fallback: If amount is null in payments table, you might want to show 0 or handle it in Blade
            'payments.amount'
        )
        ->orderBy('bookings.created_at', 'desc')
        ->get();

    return view('Studio-819.administrator.adminpayment', compact('payments', 'adminName'));
})->name('admin.payment');



// This handles the form submission from your "Verify" modal
Route::post('/admin/payment/verify', function (Request $request) {
    
    // 1. Check if a payment record already exists for this booking
    $exists = DB::table('payments')->where('booking_id', $request->payment_id)->exists();

    if ($exists) {
        // Update existing record
        DB::table('payments')
            ->where('booking_id', $request->payment_id)
            ->update([
                'payment_status' => 'Verified',
                'updated_at' => now()
            ]);
    } else {
        // Create a new record (this ensures your 850 revenue is recorded)
        DB::table('payments')->insert([
            'booking_id' => $request->payment_id, // We passed booking_id into this hidden input
            'payment_method' => $request->payment_method ?? 'GCash',
            'amount' => $request->amount ?? 850,
            'reference_number' => $request->reference_number ?? 'MANUAL-CONFIRM',
            'payment_status' => 'Verified',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    // 2. Update the Booking status as well
    DB::table('bookings')
        ->where('booking_id', $request->payment_id)
        ->update(['status' => 'Confirmed']);

    return back()->with('success', 'Payment verified and revenue updated!');
})->name('admin.payment.verify');