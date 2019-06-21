<?php

use Illuminate\Database\Seeder;
use App\Cotizacion;

class CotizacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cotizacion = [
        	'nombre' => 'Alan',
            'responsable' => 'Yo',
            'telefono'=>'55555555',
            'correo' => 'gmail@outlook.com',            
        ];

        Cotizacion::create($cotizacion);
    }
}
