<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('user_id', true);
            $table->string('password', 64)->default('');
            $table->string('name', 30);
            $table->string('phone_number', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->date('birthday')->default('1990-01-01');
            $table->string('home_address', 250)->nullable();
            $table->string('work_address', 250)->nullable();
            $table->string('provider_id',100)->nullable();
            $table->enum('provider_name', ['facebook', 'google', 'zalo'])->nullable();
            $table->integer('rank_member_id')->index('rank_member_id')->default(1);
            $table->bigInteger('role_id')->index('role_id')->default(2);
            $table->timestamps();

            $table->unique(['phone_number', 'email','provider_id'], 'phone_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
