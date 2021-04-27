<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListDeletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_deletes', function (Blueprint $table) {
            $table->id();
            $table->string('rents_id');
            $table->date('rents_month');
            $table->date('rents_month_end');
            $table->dateTime('rents_datetime');
            $table->string('rents_slip');
            $table->string('rents_payment')->comment('1=เต็มเดือน,2=ครึ่งเดือน');
            $table->string('rooms_number');
            $table->string('rooms_house_number');
            $table->string('residents_name');
            $table->string('residents_telephone');
            $table->float('residents_rent_price',10,2);
            $table->string('residents_id');
            $table->string('users_name');
            $table->string('informer');//ผู้แจ้งลบ
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
        Schema::dropIfExists('list_deletes');
    }
}
