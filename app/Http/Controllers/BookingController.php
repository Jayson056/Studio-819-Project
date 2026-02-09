<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(Request $request)
    {
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
    }

    public function updateStatus(Request $request, $id)
    {
        DB::table('bookings')->where('booking_id', $id)->update([
            'status' => $request->status,
            'updated_at' => now()
        ]);
        return back()->with('success', 'Status updated to ' . $request->status);
    }

    public function store(Request $request)
    {
        $user = DB::table('users')->where('email', $request->email)->first();

        if (!$user) return back()->with('error', 'User with this email not found.');

        $customer = DB::table('customers')->where('user_id', $user->user_id)->first();

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
    }
}
