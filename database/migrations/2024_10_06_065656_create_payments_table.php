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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->contrained()->onDelete('cascade');
            $table->foreignId('term_id')->contrained()->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('restrict');
            $table->foreignId('bank_id')->nullable();
            $table->string('teller_no')->nullable();
            $table->string('paid_by')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('payment_method'); // Payment method, e.g., 'Bank Transfer', 'Cash', 'Credit Card'
            $table->string('status')->default('pending');
            $table->dateTime('payment_date');
            $table->timestamps();

            $table->index('student_id');
            $table->index('term_id');
            $table->index('created_by');
            $table->index('bank_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
