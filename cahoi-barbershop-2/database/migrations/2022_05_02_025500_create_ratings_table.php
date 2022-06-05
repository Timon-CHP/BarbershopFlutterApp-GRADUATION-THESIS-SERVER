<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->float('communication_rate')->default(5)->comment("điểm kĩ năng giao tiếp");
            $table->float('skill_rate')->default(5)->comment("điểm kĩ năng chuyên môn");
            $table->float('assessment')->default(5)->comment("điểm không gian của hàng");
            $table->float('secure')->default(5)->comment("điểm thái độ bảo vệ");
            $table->float('checkout')->default(5)->comment("điểm checkout");
            $table->string("comment")->nullable();
            $table->foreignId('task_id')->references('id')->on('tasks')->onDelete('cascade');
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
        Schema::dropIfExists('ratings');
    }
}
