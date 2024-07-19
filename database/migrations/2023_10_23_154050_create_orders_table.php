<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id("OrderID");
            $table->integer('OrderUserID');
            $table->integer('OrderShippingID');
            $table->integer('OrderPaymentID');
            // $table->float('OrderAmount', 8, 2);
            $table->string('OrderTotalPrice',50);
            $table->string('OrderStatus',50);
            // $table->string('OrderPaymentMethod',20);
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
};