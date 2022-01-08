<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTaskServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_services', function (Blueprint $table) {
            $table->foreign(['task_id'], 'task_services_ibfk_2')->references(['task_id'])->on('tasks')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['service_id'], 'task_services_ibfk_1')->references(['service_id'])->on('services')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_services', function (Blueprint $table) {
            $table->dropForeign('task_services_ibfk_2');
            $table->dropForeign('task_services_ibfk_1');
        });
    }
}
