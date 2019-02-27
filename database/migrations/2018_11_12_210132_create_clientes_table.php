<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_cliente');
            $table->string('razon_social');
            $table->string('giro');
            $table->string('regimen_tributario')->nullable();
            $table->string('rfc_tax_ruc_nit');
            $table->string('calle');
            $table->string('num_ext');
            $table->string('num_int')->nullable();
            $table->string('colonia');
            $table->string('alcaldia_ciudad');
            $table->string('estado');
            $table->string('pais');
            $table->string('cp');
            $table->string('residencia')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('telefono');
            $table->string('email');

            $table->integer('cliente_credential_id')->unsigned()->nullable();
            $table->foreign('cliente_credential_id')->references('id')->on('cliente_credentials');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
