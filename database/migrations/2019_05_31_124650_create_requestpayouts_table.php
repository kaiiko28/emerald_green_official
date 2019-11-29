<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestpayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestpayouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('engcashment');
            $table->string('number');
            $table->string('address');
            $table->string('mop');
            $table->integer('user_id');
            $table->string('user_code');
            $table->string('username');
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
        Schema::dropIfExists('requestpayouts');
    }
}
