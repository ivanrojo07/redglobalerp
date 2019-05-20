<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToCotizacions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cotizacions', function($table) { 
            $table->unsignedInteger('cliente_id')->nullable()->change();
            $table->string('folio_consecutivo')->nullable();
            $table->unsignedInteger('prospecto_id')->nullable(); 
            $table->foreign('prospecto_id')->references('id')->on('prospectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cotizacions', function($table) {
            $table->string('cliente_id')->nullable(false)->change();
            $table->dropForeign('prospecto_id');
            $table->dropColumn('prospecto_id');
            $table->dropColumn('folio_consecutivo');                        
        });
    }
}
