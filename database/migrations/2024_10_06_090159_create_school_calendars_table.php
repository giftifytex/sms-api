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
        Schema::create('school_calendars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('term_id')->constrained('users')->onDelete('restrict');
            $table->foreignId('created_by');
            $table->date('activity_date'); // Date of the activity
            $table->string('activity'); // Description of the activity
            $table->text('details')->nullable(); // Additional details about the activity
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_calendars');
    }
};
