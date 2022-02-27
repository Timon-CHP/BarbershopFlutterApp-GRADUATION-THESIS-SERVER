<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_employees', function (Blueprint $table) {
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();
            $table->dateTime('checkin')->nullable();
            $table->dateTime('checkout')->nullable();
            $table->bigInteger('date_id')->index('date_id');
            $table->integer('employee_id')->index('employee_id');

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
        Schema::dropIfExists('date_employees');
    }
}
