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
        // Add column to harvest_batches table
        Schema::table('harvest_batches', function (Blueprint $table) {
            if (!Schema::hasColumn('harvest_batches', 'harvest_date')) {
            $table->date('harvest_date')->nullable();
            }
        });

        // Create suppliers table
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove column from harvest_batches table
        Schema::table('harvest_batches', function (Blueprint $table) {
            $table->dropColumn('harvest_date');
        });

        // Drop suppliers table
        Schema::dropIfExists('suppliers');
    }
};
