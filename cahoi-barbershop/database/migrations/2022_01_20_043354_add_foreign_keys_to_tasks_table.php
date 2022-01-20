<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign(['discount_id'], 'tasks_ibfk_2')->references(['discount_id'])->on('discounts')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['user_id'], 'tasks_ibfk_1')->references(['user_id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_ibfk_2');
            $table->dropForeign('tasks_ibfk_1');
        });
    }
}
