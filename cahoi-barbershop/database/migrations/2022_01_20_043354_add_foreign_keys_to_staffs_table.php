<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staffs', function (Blueprint $table) {
            $table->foreign(['position_id'], 'staffs_ibfk_2')->references(['id'])->on('positions')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['workplace_id'], 'staffs_ibfk_1')->references(['id'])->on('workplaces')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staffs', function (Blueprint $table) {
            $table->dropForeign('staffs_ibfk_2');
            $table->dropForeign('staffs_ibfk_1');
        });
    }
}
