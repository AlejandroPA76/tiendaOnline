<?php

namespace Database\Seeders;

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
        DB::table('usuarios')->insert([
            'nombre' => 'Cristian Noe',
            'a_paterno' => 'Camacho',
            'a_materno' => 'Torres',
            'correo' => 'cnct_99@hotmail.com',
            'rol' => 'Supervisor',
            'activo' => 1,
            'password'=> '1234',
        ]);
    }
}
