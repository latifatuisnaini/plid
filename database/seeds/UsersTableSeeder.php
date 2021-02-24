<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        \DB::table('users')->insert([
            'NAMA_LENGKAP' => 'Admin',
            'TIPE_USER' => '1',
            'email' => 'deaamartya3@gmail.com',
            'password' => bcrypt('admin'),
            'created_at' => date('Y-m-d h:i:s')
        ]);


        
        
    }
}