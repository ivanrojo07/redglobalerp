<?php

use App\Empleado;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $empleado = Empleado::find(1)->first();
        $usuario = [
            'perfil_id' => 1,
            'empleado_id' => 1,
            'name' => 'admin',
            'email' => $empleado->email,
            'password' => bcrypt('123456'),
        ];

        User::create($usuario);
    }
}
