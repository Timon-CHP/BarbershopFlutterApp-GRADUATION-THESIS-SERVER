<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigInteger('user_id', true);
            $table->string('password', 64);
            $table->string('name', 30);
            $table->string('phone_number', 12);
            $table->string('email', 100)->nullable();
            $table->dateTime('birthday');
            $table->string('home_address', 250)->nullable();
            $table->string('work_address', 250)->nullable();
            $table->integer('rank_member_id')->index('rank_member_id');

            $table->unique(['phone_number', 'email'], 'phone_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
