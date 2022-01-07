<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_product', function (Blueprint $table) {
            $table->foreign(['user_id'], 'user_product_ibfk_2')->references(['user_id'])->on('user')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['product_id'], 'user_product_ibfk_1')->references(['product_id'])->on('product')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_product', function (Blueprint $table) {
            $table->dropForeign('user_product_ibfk_2');
            $table->dropForeign('user_product_ibfk_1');
        });
    }
}
