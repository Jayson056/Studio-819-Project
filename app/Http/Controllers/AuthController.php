<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        DB::transaction(function () use ($request) {

            // Split full name
            $nameParts = explode(' ', trim($request->fullName), 2);
            $firstName = $nameParts[0];
            $lastName  = $nameParts[1] ?? '';

            // Create USER
            $user = User::create([
                'email'         => $request->email,
                'password_hash' => Hash::make($request->password),
                'role_id'       => 2, // CUSTOMER role
                'status'        => 'active',
            ]);

            // Create CUSTOMER
            Customer::create([
                'user_id'    => $user->user_id,
                'first_name' => $firstName,
                'last_name'  => $lastName,
            ]);
        });

        return redirect()
            ->route('login')
            ->with('success', 'Account created successfully. Please log in.');
    }
}
