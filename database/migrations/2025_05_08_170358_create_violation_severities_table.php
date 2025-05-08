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
        Schema::create('violation_severities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Store the severity type (Minor, Moderate, Major)
            $table->timestamps();
        });

        // Insert predefined violation severities
        DB::table('violation_severities')->insert([
            ['name' => 'Minor Violation'],
            ['name' => 'Moderate Violation'],
            ['name' => 'Major Violation'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violation_severities');
    }
};
