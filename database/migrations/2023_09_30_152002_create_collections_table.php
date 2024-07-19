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
        Schema::create('collections', function (Blueprint $table) {
            $table->id("CollectionID");
            $table->string('CollectionName',50);
            $table->string('CollectionImage',100)->nullable();
            $table->string('CollectionTitle',100)->nullable();
            $table->string('CollectionSummary',250)->nullable();
            $table->tinyInteger('ImageType')->default('0');
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
        Schema::dropIfExists('collections');
    }
};