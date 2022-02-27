<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 50);
            $table->date('birthday')->default('1990-01-01');
            $table->double('skill_rate');
            $table->double('communication_rate');
            $table->boolean('is_working')->comment('nhân viên này còn làm việc hay không');
            $table->integer('position_id')->index('position_id');
            $table->integer('workplace_id')->index('workplace_id');
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
        Schema::dropIfExists('employees');
    }
}
