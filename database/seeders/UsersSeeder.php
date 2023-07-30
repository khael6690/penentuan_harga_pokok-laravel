<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array();
        $data[] = [
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ];

        $data[] = [
            'username' => 'owner',
            'password' => bcrypt('owner'),
            'role' => 'owner',
        ];


        DB::table('tb_users')->truncate();
        DB::table('tb_users')->insert($data);
    }
}
