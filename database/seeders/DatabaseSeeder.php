<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PackageSeeder::class,
            AddonSeeder::class,
            CustomerUserSeeder::class,
        ]);

        // Create the primary Admin user
        $adminRole = Role::where('role_name', 'Admin')->first();
        
        User::create([
            'first_name' => 'System',
            'last_name' => 'Admin',
            'email' => 'admin@studio819.com',
            'password_hash' => Hash::make('2001'), // Password from user request
            'status' => 'Active',
            'role_id' => $adminRole->role_id,
        ]);
    }
}
