<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->bigInteger('discount_id', true);
            $table->string('code', 50)->default('NONE')->unique('code');
            $table->integer('name');
            $table->text('description');
            $table->integer('percent_discount');
            $table->dateTime('start_applying_at');
            $table->integer('end_applying_at');
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
        Schema::dropIfExists('discounts');
    }
}
