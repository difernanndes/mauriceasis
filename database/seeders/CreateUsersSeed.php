<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "name" => "Diego Fernandes",
            "email" => "diego.fernandes@mauricea.com.br",
            "registration" => 39504,
            "password" => Hash::make("hojediego0"),
            "admin" => 1,
        ]);

        DB::table('users')->insert([
            "name" => "Teste",
            "email" => "teste@teste.com.br",
            "registration" => 111111,
            "password" => Hash::make("teste"),
            "admin" => 0,
        ]);
    }
}
