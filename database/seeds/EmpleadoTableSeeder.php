<?php

use App\Empleado;
use Illuminate\Database\Seeder;

class EmpleadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $empleado = [
        	'nombre' => 'Dummy',
            'identificador' => 'ADMIN',
            'tipo'=>'Administrativo',
            'appaterno' => 'Dummy',
            'apmaterno' => 'Dummy',
            'email' => 'admin@rgc.com',
        ];

        Empleado::create($empleado);

    }
}
