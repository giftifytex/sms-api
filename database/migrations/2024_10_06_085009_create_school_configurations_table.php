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
        Schema::create('school_configurations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_abbrv');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->string('motto')->nullable();
            $table->string('proprietor_name')->nullable();
            $table->string('proprietor_phone')->nullable();
            $table->string('proprietor_email')->nullable();
            $table->string('principal_name')->nullable();
            $table->string('principal_phone')->nullable();
            $table->string('principal_email')->nullable();
            $table->date('creation_date')->nullable();
            $table->json('academic_years')->nullable();
            $table->string('facebook_handle')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->string('instagram_handle')->nullable();
            $table->string('linkedin_handle')->nullable();
            $table->json('other_info')->nullable(); //For storing any other info for the school
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_configurations');
    }
};
