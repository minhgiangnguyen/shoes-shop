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
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id("DetailID");
            $table->integer('DetailOrderID');
            $table->integer('DetailProductID');
            $table->string('DetailProductName',50);
            $table->integer('DetailSize');
            $table->float('DetailPrice', 8, 2);
            $table->integer('DetailQuantity');

            
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
        Schema::dropIfExists('orderdetails');
    }
};