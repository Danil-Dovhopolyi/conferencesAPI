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
            $table->id()->from(0);
            $table->string('firstname')->nullable(false);
            $table->string('lastname')->nullable(false);
            $table->string('password')->nullable(false);
            $table->enum('type', ['listener, conferee']);
            $table->string('country')->nullable(false);
            $table->string('phone')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->date('birthdate')->nullable(false);
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
