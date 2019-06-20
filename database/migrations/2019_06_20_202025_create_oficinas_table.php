<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficinas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razon_social');
            $table->string('alias');
            $table->string('rfc');
            $table->string('calle');
            $table->integer('num_int')->nullable();
            $table->integer('num_ext');
            $table->string('colonia');
            $table->integer('cp');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('alcaldia');
            $table->string('responsable');
            $table->string('representante_legal');
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
        Schema::dropIfExists('oficinas');
    }
}
