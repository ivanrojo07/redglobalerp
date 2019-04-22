<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMercanciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mercancias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->unsignedInteger('cotizacion_id');
            $table->foreign('cotizacion_id')->references('id')->on('cotizacions');
            // DIRECCION ORIGEN
            $table->text('line1_origen');
            $table->string('cp_origen');
            // DIRECCION DESTINO
            $table->text('line1_destino');
            $table->string('cp_destino');
            // Naturaleza
            $table->string('naturaleza');
            // DIMENSIONES
            $table->decimal('alto',8,2);
            $table->decimal('ancho',8,2);
            $table->decimal('profundo',8,2);
            $table->string('medidas');
            // PESO y MEDIDAS
            $table->decimal('peso_br',8,2);
            $table->string('medida_peso');
            $table->decimal('bultos',8,2);
            $table->decimal('peso_total',8,2);
            $table->decimal('volumen_total',8,2);
            // TIPO DE SERVICIO
            $table->string('tipo_servicio');
            // OBSERVACIONES
            $table->text('observaciones')->nullable();
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
        Schema::dropIfExists('mercancias');
    }
}
