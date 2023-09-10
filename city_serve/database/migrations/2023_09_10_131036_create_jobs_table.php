<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('job_region');
            $table->string('company');
            $table->string('job_type');
            $table->string('vacany');
            $table->string('expereince');
            $table->string('salary');
            $table->string('gender');
            $table->string('application_deadline');
            $table->string('jobdescription');
            $table->string('responsibilities');
            $table->string('image');
            $table->string('category');
            $table->timestamps();
            $table->string('Requirements');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
