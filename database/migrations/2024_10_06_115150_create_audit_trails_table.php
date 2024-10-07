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
        Schema::create('audit_trails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The user who performed the action
            $table->string('entity_type'); // The type of entity being audited (e.g., 'Student', 'Payment', 'Grade')
            $table->unsignedBigInteger('entity_id'); // The ID of the entity that was changed
            $table->string('action'); // e.g., 'create', 'update', 'delete', etc.
            $table->json('data_before')->nullable(); // Snapshot of the data before the change
            $table->json('data_after')->nullable(); // Snapshot of the data after the change
            $table->timestamp('performed_at')->useCurrent(); // When the action was performed
            $table->ipAddress('ip_address')->nullable(); // Optional: capture IP address of the user performing the action
            $table->string('user_agent')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'entity_type', 'entity_id']); // Composite index for both
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_trails');
    }
};
