<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
            'name' => 'supervisor',
            'email' =>'supervisor@negocio.com',
            'apellido_p' => 'h',
            'apellido_m' => 'h',
            'password' => Hash::make('supervisor'),
            'rol'=>'supervisor',
        ]); 

        DB::table('users')->insert([
            'name' => 'contador',
            'email' =>'contador@negocio.com',
            'apellido_p' => 'h',
            'apellido_m' => 'h',
            'password' => Hash::make('contador'),
            'rol'=>'contador',
        ]); 

         DB::table('users')->insert([
            'name' => 'encargado',
            'email' =>'encargado@negocio.com',
            'apellido_p' => 'h',
            'apellido_m' => 'h',
            'password' => Hash::make('encargado'),
            'rol'=>'encargado',
        ]); 

          DB::table('users')->insert([
            'name' => 'cliente1',
            'email' =>'cliente1@negocio.com',
            'apellido_p' => 'h',
            'apellido_m' => 'h',
            'password' => Hash::make('cliente1'),
            'rol'=>'vendedor',
        ]); 

           DB::table('users')->insert([
            'name' => 'cliente2',
            'email' =>'cliente2@negocio.com',
            'apellido_p' => 'h',
            'apellido_m' => 'h',
            'password' => Hash::make('cliente2'),
            'rol'=>'vendedor',
        ]); 

         DB::table('users')->insert([
            'name' => 'cliente3',
            'email' =>'cliente3@negocio.com',
            'apellido_p' => 'h',
            'apellido_m' => 'h',
            'password' => Hash::make('cliente3'),
            'rol'=>'vendedor',
        ]); 

         DB::table('users')->insert([
            'name' => 'cliente4',
            'email' =>'cliente4@negocio.com',
            'apellido_p' => 'h',
            'apellido_m' => 'h',
            'password' => Hash::make('cliente4'),
            'rol'=>'vendedor',
        ]); 
        
///////
        DB::table('categorias')->insert([
         'nombre'=> 'oferta',
         'descripcion'=>'productos en oferta',
         'activa' => 'si',
        ]); 

        DB::table('productos')->insert([
         'nombre'=> 'arbolito de navidad',
         'descripcion'=>'arbol clasico de navidad',
         'precio' => 249.99,
         'stock' => 12,
         'consignar' => 'aceptado',
         'porcentaje'=>3,
         'propietario'=>'4',
         'categoria_id'=>'1',
         'created_at' => date("Y-m-d H:i:s"),
        ]); 


        DB::table('productos')->insert([
         'nombre'=> 'esferas navidenas',
         'descripcion'=>'elaboradas con vidrio soplado',
         'precio' => 200,
         'stock' => 11,
         'consignar' => 'aceptado',
         'porcentaje'=>5,
         'propietario'=>'4',
         'categoria_id'=>'1',
         'created_at' => date("Y-m-d H:i:s"),
        ]); 


        DB::table('productos')->insert([
         'nombre'=> 'luces navidenas',
         'descripcion'=>'1 metro de luces navidenas',
         'precio' => 150,
         'stock' => 3,
         'consignar' => 'aceptado',
         'porcentaje'=>5,
         'propietario'=>'4',
         'categoria_id'=>'1',
         'created_at' => date("Y-m-d H:i:s"),
        ]); 

//////////////////////
        DB::table('categorias')->insert([
         'nombre'=> 'temporadales',
         'descripcion'=>'a',
         'activa' => 'si',
        ]); 

   
        DB::table('categorias')->insert([
         'nombre'=> 'telefonia',
         'descripcion'=>'todo tipo de telefonos',
         'activa' => 'si',
        ]); 

          DB::table('categorias')->insert([
         'nombre'=> 'limpieza',
         'descripcion'=>'productos de limpieza',
         'activa' => 'si',
        ]); 

         DB::table('categorias')->insert([
         'nombre'=> 'shampoo',
         'descripcion'=>'shampoo para todo tipo de cabello',
         'activa' => 'si',
        ]); 

         DB::table('categorias')->insert([
         'nombre'=> 'telefonia',
         'descripcion'=>'todo tipo de telefonos',
         'activa' => 'si',
        ]); 
    }
}
