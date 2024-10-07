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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade'); // Links to staff member
            $table->decimal('amount', 10, 2);
            $table->decimal('deductions', 10, 2)->default(0); // Any deductions (e.g., taxes, penalties)
            $table->decimal('net_pay', 10, 2); // Net amount after deductions
            $table->date('payment_date'); // Date the salary is paid
            $table->foreignId('processed_by')->constrained('users')->onDelete('cascade'); // Admin who processed the payment
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
