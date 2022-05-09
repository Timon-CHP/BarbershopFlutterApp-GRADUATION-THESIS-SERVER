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
            $table->id();
            $table->boolean('status')->default(false);
            $table->string('notes', 250)->nullable();
            $table->date('date');
            $table->foreignId('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('stylist_id')->references('id')->on('stylists')->onDelete('cascade');
            $table->foreignId('time_slot_id')->references('id')->on('time_slots')->onDelete('cascade');
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
