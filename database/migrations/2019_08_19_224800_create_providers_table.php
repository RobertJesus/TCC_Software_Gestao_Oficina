<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nameFant');
            $table->string('record');
            $table->string('email');
            $table->string('phoneP');
            $table->string('tell')->nullable();
            $table->string('address');
            $table->string('bai');
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
        Schema::dropIfExists('providers');
    }
}
