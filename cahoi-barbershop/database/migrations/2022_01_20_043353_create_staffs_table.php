<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 50);
            $table->date('birthday')->default('1990-01-01');
            $table->double('skill_rate');
            $table->double('communication_rate');
            $table->boolean('is_working')->comment('nhân viên này còn làm việc hay không');
            $table->integer('work_schedule')->comment('lịch làm việc theo tuần của nhân viên');
            $table->integer('position_id')->index('position_id');
            $table->integer('workplace_id')->index('workplace_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffs');
    }
}
