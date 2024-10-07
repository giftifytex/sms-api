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
        Schema::create('library_resources', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title of the resource
            $table->string('author'); // Author or creator of the resource
            $table->string('resource_type'); // Type of resource (e.g., 'book', 'ebook', 'magazine', etc.)
            $table->date('published_date')->nullable();
            $table->string('status')->default('available'); // e.g., 'available', 'checked_out', etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library_resources');
    }
};
