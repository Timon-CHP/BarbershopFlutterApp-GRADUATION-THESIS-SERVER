<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->foreign(['manufacturer_id'], 'product_ibfk_2')->references(['manufacturer_id'])->on('manufacturer')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['catagory_product_id'], 'product_ibfk_1')->references(['category_product_id'])->on('category_product')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropForeign('product_ibfk_2');
            $table->dropForeign('product_ibfk_1');
        });
    }
}
