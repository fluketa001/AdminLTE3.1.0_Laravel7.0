<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('rooms_number');
            $table->string('rooms_house_number');
            $table->string('rooms_type');
            $table->string('rooms_size');
            $table->string('rooms_status');
            $table->string('rooms_building');
            $table->string('rooms_direction');
            $table->string('rooms_standard_price');
            $table->string('rooms_contract_type');
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
        Schema::dropIfExists('rooms');
    }
}
