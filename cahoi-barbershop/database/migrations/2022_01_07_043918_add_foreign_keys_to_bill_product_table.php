<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBillProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bill_product', function (Blueprint $table) {
            $table->foreign(['product_id'], 'bill_product_ibfk_2')->references(['product_id'])->on('product')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['bill_id'], 'bill_product_ibfk_1')->references(['bill_id'])->on('bill')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bill_product', function (Blueprint $table) {
            $table->dropForeign('bill_product_ibfk_2');
            $table->dropForeign('bill_product_ibfk_1');
        });
    }
}
