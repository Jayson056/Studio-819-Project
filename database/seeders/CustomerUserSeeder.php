<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Customer;

class CustomerUserSeeder extends Seeder
{
    public function run()
    {
        // Create User (credentials)
        $user = User::create([
            'email' => 'jayson@example.com',
            'password_hash' => Hash::make('User@123'), // use password_hash
            'role_id' => 2, // assuming 2 = Customer
            'status' => 'Active',
        ]);

        // Create Customer profile linked to User
        Customer::create([
            'user_id' => $user->user_id,
            'first_name' => 'Jayson',
            'last_name' => 'Combate',
            'phone_number' => '09171234567',
        ]);
    }
}
