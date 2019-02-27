<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('cliente');

            $table->date('fecha_cont');
            $table->date('fecha_sig');
            $table->string('forma_cont');
            $table->string('servicio');
            $table->string('telefono');
            $table->string('ext')->nullable();
            $table->string('correo');
            $table->string('celular')->nullable();
            $table->text('comentario')->nullable();
            $table->text('acuerdos')->nullable();
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
        Schema::dropIfExists('crm');
    }
}
