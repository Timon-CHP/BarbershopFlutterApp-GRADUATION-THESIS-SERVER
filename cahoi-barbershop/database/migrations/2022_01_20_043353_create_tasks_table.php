<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigInteger('task_id', true);
            $table->dateTime('start_time');
            $table->integer('duration')->default(30);
            $table->integer('total_money');
            $table->boolean('is_complete')->default(false);
            $table->bigInteger('discount_id')->index('discount_id');
            $table->bigInteger('user_id')->index('user_id');
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
        Schema::dropIfExists('tasks');
    }
}
