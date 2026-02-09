<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AddonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('addons')->insert([
        ['addon_name' => 'Additional Person', 'price' => 100.00],
        ['addon_name' => 'Additional Pet', 'price' => 150.00],
    ]);
}
}
