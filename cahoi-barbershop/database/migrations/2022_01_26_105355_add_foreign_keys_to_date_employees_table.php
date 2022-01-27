<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('date_employees', function (Blueprint $table) {
            $table->foreign(['date_id'], 'date_employees_ibfk_2')->references(['id'])->on('dates')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['employee_id'], 'date_employees_ibfk_1')->references(['id'])->on('employees')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('date_employees', function (Blueprint $table) {
            $table->dropForeign('date_employees_ibfk_2');
            $table->dropForeign('date_employees_ibfk_1');
        });
    }
}
