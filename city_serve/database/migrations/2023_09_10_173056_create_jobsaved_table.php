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
       Schema::create('jobsaved', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->foreign('job_id')->references('id')->on('jobs');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('user_id');
            $table->string('job_image');
            $table->string('category');
            $table->string('job_title');
            $table->string('job_region');
            $table->string('company');
            $table->string('job_type');
            
       
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobsaved');
    }
};
