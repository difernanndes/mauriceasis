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
            "concierge" => 1,
            "logistics" => 1,
        ]);

        DB::table('users')->insert([
            "name" => "Logistica",
            "email" => "logistica@teste.com.br",
            "registration" => 111111,
            "password" => Hash::make("logistica"),
            "admin" => 0,
            "concierge" => 0,
            "logistics" => 1,
        ]);

        DB::table('users')->insert([
            "name" => "Portaria",
            "email" => "portaria@teste.com.br",
            "registration" => 222222,
            "password" => Hash::make("portaria"),
            "admin" => 0,
            "concierge" => 1,
            "logistics" => 0,
        ]);
    }
}
