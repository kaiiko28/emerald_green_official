<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('activation_code')->unique();
            $table->string('reseller');
            $table->double('prices');
            $table->string('status')->nullable()->default('Available');
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
        Schema::dropIfExists('accodes');
    }
}
