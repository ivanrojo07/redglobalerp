<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->string('nombre')->nullable();
            $table->string('responsable');
            $table->string('telefono');
            $table->string('correo');
            // DIRECCION ORIGEN
            $table->text('line1_origen');
            $table->string('cp_origen');
            // DIRECCION DESTINO
            $table->text('line1_destino');
            $table->string('cp_destino');
            // TIPO DE SERVICIO
            $table->string('tipo_servicio');
            $table->date('eta')->nullable();            
            $table->boolean('despacho_aduanal')->nullable(); 
            $table->boolean('es_estibable')->nullable(); 
            $table->integer('peligroso_clase')->nullable();
            $table->string('peligroso_nu')->nullable();
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
        Schema::dropIfExists('cotizacions');
    }
}
