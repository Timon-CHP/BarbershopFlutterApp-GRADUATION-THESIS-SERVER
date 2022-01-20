<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_services', function (Blueprint $table) {
            $table->bigInteger('task_id')->index('task_id');
            $table->bigInteger('service_id')->index('service_id');
            $table->boolean('is_save_photo')->default(true)->comment('nếu true thì sau khi hoàn thành nhiệm vụ phải chụp ảnh lại cho khách');
            $table->boolean('is_consult')->default(true)->comment('nếu true thì nhân viên phải tư vấn cho khách');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_services');
    }
}
