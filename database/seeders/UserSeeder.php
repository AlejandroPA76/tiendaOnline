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
            'email' =>'supervisor@gmail.com',
            'password' => Hash::make('1234'),
            'rol'=>'supervisor',
        ]); 

        DB::table('users')->insert([
            'name' => 'contador',
            'email' =>'contador@gmail.com',
            'password' => Hash::make('1234'),
            'rol'=>'contador',
        ]); 

         DB::table('users')->insert([
            'name' => 'cliente',
            'email' =>'cliente@gmail.com',
            'password' => Hash::make('1234'),
            'rol'=>'cliente',
        ]); 
    }
}
