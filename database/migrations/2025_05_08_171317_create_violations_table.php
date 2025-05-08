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
        Schema::create('violations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade'); // Foreign key for student
            $table->string('violation_name');
            $table->text('violation_description')->nullable();
            $table->foreignId('violation_severity_id')->constrained('violation_severities')->onDelete('cascade'); // Foreign key for violation severity
            $table->string('violation_sanction')->nullable();
            $table->foreignId('violation_status_id')->constrained('violation_statuses')->onDelete('cascade'); // Foreign key for violation status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violations');
    }
};
