<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToMercancias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mercancias', function($table) {
            $table->date('eta')->nullable();            
            $table->boolean('despacho_aduanal')->nullable(); 
            $table->integer('peligroso_clase')->nullable();
            $table->string('peligroso_nu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mercancias', function($table) {
            $table->dropColumn('eta');            
            $table->dropColumn('despacho_aduanal');
            $table->dropColumn('peligroso_clase');
            $table->dropColumn('peligroso_nu');
        });
    }
}
