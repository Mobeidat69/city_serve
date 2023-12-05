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
        Schema::table('applications', function($table) {
            $table->integer('des_ar');
        });
    }
    // 2023_09_09_233947_create_applications_table
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
