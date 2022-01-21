<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('name', 100);
            $table->integer('price');
            $table->integer('remaining_quantity');
            $table->text('information');
            $table->text('description');
            $table->text('product_manual');
            $table->integer('images')->nullable();
            $table->bigInteger('category_product_id')->index('category_product_id');
            $table->bigInteger('manufacturer_id')->index('manufacturer_id');
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
        Schema::dropIfExists('products');
    }
}
