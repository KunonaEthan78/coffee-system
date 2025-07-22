<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHarvestDateToHarvestBatchesTable extends Migration
{
    public function up(): void
    {
        Schema::table('harvest_batches', function (Blueprint $table) {
            if (!Schema::hasColumn('harvest_batches', 'harvest_date')) {
                $table->date('harvest_date')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('harvest_batches', function (Blueprint $table) {
            $table->dropColumn('harvest_date');
        });
    }
}
