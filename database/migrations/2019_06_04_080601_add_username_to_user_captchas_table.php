<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsernameToUserCaptchasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_captchas', function (Blueprint $table) {
            $table->string('username')->nullable();
            $table->string('user_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_captchas', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('user_email');
        });
    }
}
