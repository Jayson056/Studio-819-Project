<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    DB::table('packages')->insert([
        ['package_name' => 'Lite', 'base_price' => 350.00, 'pax_limit' => 2],
        ['package_name' => 'Basic', 'base_price' => 650.00, 'pax_limit' => 3],
        ['package_name' => 'Premium', 'base_price' => 850.00, 'pax_limit' => 4],
        ['package_name' => 'Family/Group', 'base_price' => 1400.00, 'pax_limit' => 6],
        ['package_name' => 'Yearbook', 'base_price' => 499.00, 'pax_limit' => 1],
        ['package_name' => 'Christmas DUO', 'base_price' => 850.00, 'pax_limit' => 2],
        ['package_name' => 'Christmas Family/Group', 'base_price' => 1400.00, 'pax_limit' => 6],
        ['package_name' => 'Christmas Photographer Session', 'base_price' => 2499.00, 'pax_limit' => 8],
        ['package_name' => 'Photobox', 'base_price' => 299.00, 'pax_limit' => 2],
    ]);
}
}
