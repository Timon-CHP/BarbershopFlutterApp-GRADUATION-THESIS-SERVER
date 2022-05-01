<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatedByToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->Integer("created_by")->nullable();
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('type_products', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('calendars', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('discounts', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('bills', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('facilities', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('task_product', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('images', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('ranks', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('stylists', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('task_images', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('product_images', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('facility_images', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('tables', function (Blueprint $table) {
//            //
//        });
    }
}
