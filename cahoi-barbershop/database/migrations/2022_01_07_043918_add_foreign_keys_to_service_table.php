<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service', function (Blueprint $table) {
            $table->foreign(['category_service_id'], 'service_ibfk_1')->references(['category_service_id'])->on('category_service')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service', function (Blueprint $table) {
            $table->dropForeign('service_ibfk_1');
        });
    }
}
