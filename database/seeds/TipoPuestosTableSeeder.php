<?php

use Illuminate\Database\Seeder;
use App\TipoPuesto;

class TipoPuestosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $puestos = [['nombre'=>'Administrativo', 'descripcion'=>'Personal Administrativo'],
        			['nombre'=>'Ayudantes Genereales', 'descripcion'=>'Ayudante de todos'],
        			['nombre'=>'Operadores', 'descripcion'=>'Conductores']];
        TipoPuesto::insert($puestos);

    }
}
