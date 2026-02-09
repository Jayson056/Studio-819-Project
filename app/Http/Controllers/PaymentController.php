<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $adminName = "Admin";

        $payments = DB::table('bookings')
            ->join('customers', 'bookings.customer_id', '=', 'customers.customer_id')
            ->leftJoin('payments', 'bookings.booking_id', '=', 'payments.booking_id')
            ->select(
                'bookings.booking_id',
                'bookings.package_name',
                'customers.first_name',
                'customers.last_name',
                'payments.payment_id',
                DB::raw('IFNULL(payments.payment_status, "Pending") as payment_status'),
                'payments.payment_method',
                'payments.reference_number',
                'payments.amount'
            )
            ->orderBy('bookings.created_at', 'desc')
            ->get();

        return view('Studio-819.administrator.adminpayment', compact('payments', 'adminName'));
    }

    public function verify(Request $request)
    {
        $exists = DB::table('payments')->where('booking_id', $request->payment_id)->exists();

        if ($exists) {
            DB::table('payments')
                ->where('booking_id', $request->payment_id)
                ->update([
                    'payment_status' => 'Verified',
                    'updated_at' => now()
                ]);
        } else {
            DB::table('payments')->insert([
                'booking_id' => $request->payment_id,
                'payment_method' => $request->payment_method ?? 'GCash',
                'amount' => $request->amount ?? 850,
                'reference_number' => $request->reference_number ?? 'MANUAL-CONFIRM',
                'payment_status' => 'Verified',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        DB::table('bookings')
            ->where('booking_id', $request->payment_id)
            ->update(['status' => 'Confirmed']);

        return back()->with('success', 'Payment verified and revenue updated!');
    }
}
