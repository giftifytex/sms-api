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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('adm_no');
            $table->foreignId('classroom_id')->constrained()->onDelete('cascade');
            $table->foreignId('arm_id')->constrained()->onDelete('cascade');
            $table->json('personal_info')->nullable(); // {gender, dob, country, address, phone_number, adm_date, photo_url}
            $table->json('health_data')->nullable(); // {bllod_group, genotype, [disabilities], [allergies], [medical_conditions], [emergency_contact: name, phone, relationship]}
            $table->timestamps();

            $table->index('user_id');
            $table->index('adm_no');
            $table->index('classroom_id');
            $table->index('arm_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
