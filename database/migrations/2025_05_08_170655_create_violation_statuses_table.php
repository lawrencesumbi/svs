<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('violation_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Store the status name (e.g., Pending, Resolved, Dismissed)
            $table->timestamps();
        });

        // Insert predefined violation statuses
        DB::table('violation_statuses')->insert([
            ['name' => 'Ongoing'],
            ['name' => 'Resolved'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violation_statuses');
    }
};
