<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_products', function (Blueprint $table) {
            $table->integer('quantily')->default(1);
            $table->bigInteger('bill_id')->index('bill_id');
            $table->bigInteger('product_id')->index('product_id');
            $table->integer('shipping_fee');
            $table->string('delivery_address', 250);
            $table->string('specific_delivery_address', 250);
            $table->boolean('is_delivery_fast')->default(false);
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
        Schema::dropIfExists('bill_products');
    }
}
