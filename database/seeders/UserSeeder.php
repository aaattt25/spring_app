<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            ['name' => '温泉太郎',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
            'role' => 'administrator'],
            ['name' => '温泉花子',
            'email' => 'test2@test.com',
            'password' => Hash::make('password'),
            'role' => 'general'],
        ]);
    }
}
