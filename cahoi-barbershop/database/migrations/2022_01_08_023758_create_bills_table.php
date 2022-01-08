<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigInteger('bill_id', true);
            $table->dateTime('book_date');
            $table->integer('total_money');
            $table->integer('shipping_fee');
            $table->string('delivery_address', 250);
            $table->string('specific_delivery_address', 250);
            $table->boolean('is_fast_delivery')->default(false);
            $table->boolean('is_complete')->default(false);
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
        Schema::dropIfExists('bills');
    }
}
