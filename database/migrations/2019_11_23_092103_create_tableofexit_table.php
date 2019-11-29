<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableofexitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tableofexit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userid');
            $table->string('username');
            $table->string('email');
            $table->string('user_code');
            $table->string('connection_id')->nullable();
            $table->string('current_table_id')->nullable();
            $table->string('current_table')->nullable();
            $table->double('current_table_earning')->nullable();
            $table->string('table_batch')->nullable();
            $table->datetime('joined_table_at')->nullable();
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
        Schema::dropIfExists('tableofexit');
    }
}
