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
        Schema::create('users', function (Blueprint $table) {
            $table->id('UserID');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('UserGender')->default(0);
            $table->tinyInteger('role')->default(0);
            $table->string('UserCity',90)->nullable();
            $table->string('UserState',20)->nullable();
            $table->string('UserZip',12)->nullable();
            $table->string('UserPhone',20)->nullable();
            $table->date('UserBirthday')->nullable();
            $table->string('UserCountry',20)->nullable();
            $table->string('UserAddress',100)->nullable();
            $table->tinyInteger('UserStatus')->default(0);
            $table->string('UserToken')->nullable();
            $table->rememberToken();
            $table->timestamps();
            // $table->id("UserID");
            // $table->string('UserFullName');
            // $table->string('UserEmail',500)->unique();
            // $table->timestamp('UserEmail_verified_at')->nullable();
            // $table->string('UserPassword',500);
            // $table->tinyInteger('UserRole')->default(0);
            // // $table->string('UserFirstName',500)->nullable();
            // // $table->string('UserLastName',500)->nullable();
            // $table->string('UserCity',90)->nullable();
            // $table->string('UserState',20)->nullable();
            // $table->string('UserZip',12)->nullable();
            // // $table->tinyInteger('UserEmailVerified')->default('0');
            // $table->string('UserPhone',20)->nullable();
            // $table->dateTime('UserBirthday')->nullable();
            // $table->string('UserCountry',20)->nullable();
            // $table->string('UserAddress',100)->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};