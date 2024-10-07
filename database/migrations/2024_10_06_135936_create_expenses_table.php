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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // e.g., 'Utilities', 'Salaries', 'Maintenance', etc.
            $table->text('description')->nullable(); // Optional details about the expense
            $table->decimal('amount', 10, 2); // Amount of the expense
            $table->date('expense_date'); // Date the expense was incurred
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // Who recorded the expense
            $table->timestamps();

            $table->index(['expense_date', 'created_by', 'category']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
