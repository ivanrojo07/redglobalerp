<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoDatoslabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_datoslabs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->dropForeign(['empleado_id']);
            $table->date('fechaactualizacion')->nullable();
            $table->string('periodopaga');
            $table->string('regimen');
            $table->string('hcomida');
            // $table->string('lugartrabajo');
            $table->integer('contrato_id')->unsigned()->nullable();
            $table->foreign('contrato_id')->references('id')->on('tipo_contratos');
            $table->integer('puesto_id')->unsigned()->nullable();
            $table->foreign('puesto_id')->references('id')->on('tipo_puestos');
            $table->decimal('salarionom',8,2)->nullable();
            $table->decimal('salariodia',8,2)->nullable();
            $table->string('prestaciones')->nullable();
            $table->string('hentrada')->nullable();
            $table->string('hsalida')->nullable();
            $table->date('fechacontratacion')->nullable();
            $table->string('banco')->nullable();;
            $table->string('cuenta')->nullable();
            $table->string('clabe')->nullable();
            $table->date('fechabaja')->nullable();
            $table->integer('tipobaja_id')->nullable()->unsigned();
            $table->foreign('tipobaja_id')->references('id')->on('tipo_bajas');
            $table->text('comentariobaja')->nullable();
            $table->boolean('bonopuntualidad')->default(false);
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
        Schema::dropIfExists('empleado_datoslabs');
    }
}
