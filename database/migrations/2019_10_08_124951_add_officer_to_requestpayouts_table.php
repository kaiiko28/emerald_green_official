<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOfficerToRequestpayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requestpayouts', function (Blueprint $table) {
            $table->string('officer')->nullable();
            $table->string('contact')->nullable();
            $table->string('transaction')->nullable();
            $table->decimal('amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requestpayouts', function (Blueprint $table) {
            //
        });
    }
}
