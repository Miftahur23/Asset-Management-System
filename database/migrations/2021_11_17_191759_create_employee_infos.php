<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_infos', function (Blueprint $table) {
            $table->id();
            $table->string('employee_image')->nullable();
            $table->string('user_id')->nullable();
            $table->string('fname');
            $table->string('lname');
            $table->string('email');  
            $table->string('password');
            $table->string('departments_id')->nullable();
            $table->string('branches_id')->nullable();
            $table->string('address')->nullable();
            $table->double('pnumber')->nullable();          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_infos');
    }
}
