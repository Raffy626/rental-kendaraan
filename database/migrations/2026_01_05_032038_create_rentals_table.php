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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('vehicle_id')->constrained('kendaraans')->cascadeOnDelete();
            $table->date('rental_date');
            $table->date('return_date');
            $table->decimal('total_price', 10, 2);
            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid');
            $table->enum('rental_status', ['ongoing', 'returned'])->default('ongoing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
