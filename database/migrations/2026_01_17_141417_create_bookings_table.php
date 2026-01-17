<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('bookings', function (Blueprint $table) {
    $table->id('booking_id');
    $table->foreignId('customer_id')->constrained('customers', 'customer_id');
    $table->foreignId('package_id')->constrained('packages', 'package_id');
    $table->date('booking_date');
    $table->time('booking_time');
    $table->boolean('has_pet')->default(false);
    $table->enum('payment_method', ['GCASH', 'MAYA', 'GOTYME BANK']);
    $table->string('reference_number', 50);
    $table->decimal('total_amount', 10, 2);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
