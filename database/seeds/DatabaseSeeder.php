<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            PerfilTableSeeder::class,
            ModuloTableSeeder::class,
            ComponenteTableSeeder::class,
            ComponentePerfilTableSeeder::class,
            // AreasTableSeeder::class,
            // PuestosTableSeeder::class,
            // ContratosTableSeeder::class,
            EmpleadoTableSeeder::class,
            // DatosLaboralesTableSeeder::class,
            UserTableSeeder::class,
            // CotizacionTableSeeder::class,
            TipoPuestosTableSeeder::class,
            TipoAmonestacionTableSeeder::class
        ]);
    }
}
