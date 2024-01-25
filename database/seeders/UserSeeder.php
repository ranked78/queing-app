<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'role_id' => 0,
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Registrar 1',
                'email' => 'registrar1@gmail.com',
                'role' => 'registrar',
                'role_id' => 1,
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Registrar 2',
                'email' => 'registrar2@gmail.com',
                'role' => 'registrar',
                'role_id' => 2,
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Registrar 3',
                'email' => 'registrar3@gmail.com',
                'role' => 'registrar',
                'role_id' => 3,
                'status' => 'active',
                'password' => bcrypt('password')
            ],
        ]);
    }
}
