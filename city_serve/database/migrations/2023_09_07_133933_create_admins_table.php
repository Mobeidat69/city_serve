<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

        // Add validation rules
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required',
        ];

        // Validate the columns
        $validator = \Illuminate\Support\Facades\Validator::make([], $rules);

        if ($validator->fails()) {
            // Rollback the migration if validation fails
            Schema::dropIfExists('admins');
            throw new \Exception('Validation failed: ' . $validator->errors()->first());
        }
    }
    

    public function down()
    {
        Schema::dropIfExists('admins');
    }
}

?>