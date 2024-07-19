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
        Schema::create('products', function (Blueprint $table) {
            $table->id("ProductID");
            $table->string('ProductCode',50);
            $table->string('ProductName',100);
            $table->string('ProductSlug',100)->nullable();
            $table->integer('ProductGenderID');
            $table->integer('ProductColorID');
            $table->float('ProductPrice', 8, 2);;
            $table->text('ProductDesc');
            $table->text('ProductDetail');
            $table->string('ProductThumb',255);
            $table->integer('ProductCollectionID');
            $table->string('ProductMaterial',50);
            $table->string('ProductColorDetail',50);
            $table->timestamps();
            $table->date('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};