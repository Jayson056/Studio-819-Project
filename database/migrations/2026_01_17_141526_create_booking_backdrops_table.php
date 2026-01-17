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
        Schema::create('booking_backdrops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings', 'booking_id')->cascadeOnDelete();
            $table->foreignId('backdrop_id')->constrained('backdrops', 'backdrop_id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_backdrops');
    }
};
