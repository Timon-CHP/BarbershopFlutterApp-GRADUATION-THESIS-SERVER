<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign(['manufacturer_id'], 'products_ibfk_2')->references(['manufacturer_id'])->on('manufacturers')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['catagory_product_id'], 'products_ibfk_1')->references(['category_product_id'])->on('category_products')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_ibfk_2');
            $table->dropForeign('products_ibfk_1');
        });
    }
}
