<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('acc_name');
            $table->string('code');
            $table->integer('user_id');
            $table->string('order_notice');
            $table->string('productcode')->nullable();
            $table->string('productname')->nullable();
            $table->Integer('quantity')->nullable();
            $table->decimal('cost')->nullable();
            $table->string('status')->nullable();
            $table->string('delivery_receipt')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('contactno')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
