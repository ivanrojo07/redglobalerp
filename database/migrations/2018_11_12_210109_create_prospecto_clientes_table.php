<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectoClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospecto_clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apaterno');
            $table->string('amaterno')->nullable();
            $table->string('rfc');
            $table->string('status');
            $table->integer('cliente_credential_id')->unsigned();
            $table->foreign('cliente_credential_id')->references('id')->on('cliente_credentials');
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
        Schema::dropIfExists('prospecto_clientes');
    }
}
