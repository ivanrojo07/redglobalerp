<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->unsignedInteger('proyecto_id');
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
            $table->decimal('alto',8,2);
            $table->decimal('ancho',8,2);
            $table->decimal('profundo',8,2);
            $table->string('medidas');
            $table->string('naturaleza');
            $table->decimal('peso_br',8,2);
            $table->string('medida_peso');
            $table->decimal('bultos',8,2);
            $table->string('origen');
            $table->string('destino');
            $table->decimal('peso_total',8,2);
            $table->decimal('volumen_total',8,2);
            $table->text('observaciones')->nullable();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('productos');
    }
}
