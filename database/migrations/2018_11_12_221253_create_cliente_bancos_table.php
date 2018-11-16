<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteBancosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_bancos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->string('nombre');
            $table->string('plaza');
            $table->string('sucursal');
            $table->string('cuenta');
            
            // Extranjeros
            $table->string('clave_int_trans')->nullable();
            $table->string('aba')->nullable();
            $table->string('swift')->nullable();

            // Nacionales
            $table->string('rfc_banco')->nullable();
            $table->string('clabe_inter')->nullable();
            $table->string('metodo_pago')->nullable();
            $table->string('forma_pago')->nullable();
            $table->string('uso_cfdi')->nullable();

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
        Schema::dropIfExists('cliente_banco');
    }
}
