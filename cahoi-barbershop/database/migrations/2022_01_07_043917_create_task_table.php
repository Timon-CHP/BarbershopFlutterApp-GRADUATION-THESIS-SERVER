<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->bigInteger('task_id', true);
            $table->dateTime('book_date');
            $table->integer('total_money');
            $table->boolean('is_save_photo');
            $table->boolean('is_consulting');
            $table->boolean('is_complete')->default(false);
            $table->bigInteger('user_id')->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
