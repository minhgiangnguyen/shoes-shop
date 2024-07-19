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
        Schema::create('shipping', function (Blueprint $table) {
            $table->id('shipping_id');
            $table->integer('shipping_userID');
            $table->string('shipping_name');
            $table->string('shipping_phone');
            $table->string('shipping_email');
            $table->string('shipping_address');
            $table->string('shipping_city');
            $table->string('shipping_note');
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
        Schema::dropIfExists('shipping');
    }
};
