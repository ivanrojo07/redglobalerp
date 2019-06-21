<?php

use App\TipoAmonestacion;
use Illuminate\Database\Seeder;

class TipoAmonestacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amonestaciones = [['nombre'=>'Retardo', 'descripcion'=>'Retardo'],
        			['nombre'=>'Retardo justificado', 'descripcion'=>'Retardo justificado'],
        			['nombre'=>'Amonestación verbal', 'descripcion'=>'Amonestación verbal'],
        			['nombre' => 'Amonestación escrita', 'descripcion'=>'Amonestación escrita'],
        			['nombre' => 'Suspensión de labores', 'descripcion'=>'Suspensión de labores'],
        			['nombre' => 'rescición de contrato', 'descripcion'=>'rescición de contrato']];
        TipoAmonestacion::insert($amonestaciones);
    }
}
