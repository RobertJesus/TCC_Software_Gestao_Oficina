<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('date');
            $table->string('record');
            $table->string('sex');
            $table->string('email');
            $table->string('phoneP');
            $table->string('phoneS')->nullable();
            $table->string('tell')->nullable();
            $table->string('address');
            $table->string('numberHouse');
            $table->string('comp')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('cep');
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
        Schema::dropIfExists('clients');
    }
}
