<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_points', function (Blueprint $table) {
            $table->id();
            $table->string('config_points_price'); //แต้มต่อราคาบาท
            $table->string('config_points_rate_change'); //อัตราการได้แต้ม
            $table->string('config_points_expire'); //ตั้งค่าวันหมดอายุแต้ม
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
        Schema::dropIfExists('config_points');
    }
}
