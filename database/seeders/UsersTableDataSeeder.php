<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use DB;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'role'=>'1',

        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'super@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'role'=>'2',

        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'worker@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'role'=>'3',

        ]);
        DB::table('site_settings')->insert([
            'file' => ' ',
            'footer' => ' ',
            'noti' => ' ',


        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'role'=>' ',

        ]);


    }
}
