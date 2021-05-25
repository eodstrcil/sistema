<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'name' => 'Admin',
            'email' => 'demo@demo.com',
            'password' => '$2y$10$MCueMBBDl8Figgpd./oCSuEE/IFp3ux6OpdyJAc3OTZvXk/F72Geq',
        ]);
    }
}
