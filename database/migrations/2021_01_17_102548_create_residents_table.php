<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('residents_name');
            $table->string('residents_telephone');
            $table->string('residents_career');
            $table->float('residents_rent_price',10,2);
            $table->dateTime('residents_contract_start');
            $table->dateTime('residents_contract_end');
            $table->text('residents_address');
            $table->string('residents_emergency');
            $table->string('residents_status')->comment('สถานะการเช่า Ex.1=กำลังเช่า,0=เลิกเช่า');
            $table->string('residents_note')->comment('หมายเหตุ Ex.หมดสัญญา, ผิดกฏ');
            $table->string('rooms_id');
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
        Schema::dropIfExists('residents');
    }
}
