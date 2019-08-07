<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('date');
            $table->integer('record')->unique();
            $table->string('sex');
            $table->string('email');
            $table->integer('phoneP');
            $table->integer('phoneS')->nullable();
            $table->integer('tell')->nullable();
            $table->string('address');
            $table->integer('numberHouse');
            $table->string('comp', 50)->nullable();
            $table->string('city');
            $table->string('state');
            $table->integer('cep');
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
        Schema::dropIfExists('client');
    }
}
