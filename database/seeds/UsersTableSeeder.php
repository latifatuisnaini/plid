<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


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
            'STATUS_KONFIRMASI' => '1',
            'email' => 'deaamartya3@gmail.com',
            'password' => bcrypt('admin'),
            'created_at' => date('Y-m-d h:i:s')
        ]);
        \DB::table('users')->insert([
            'NAMA_LENGKAP' => 'user',
            'TIPE_USER' => '2',
            'STATUS_KONFIRMASI' => '1',
            'email' => 'icha@gmail.com',
            'password' => bcrypt('user'),
            'created_at' => date('Y-m-d h:i:s')
        ]);
        \DB::table('users')->insert([
            'NAMA_LENGKAP' => 'user2',
            'TIPE_USER' => '2',
            'STATUS_KONFIRMASI' => '0',
            'email' => 'ichahaha@gmail.com',
            'password' => bcrypt('icha'),
            'created_at' => date('Y-m-d h:i:s')
        ]);

        $faker = Faker::create('id_ID');

        $users = [];
        for ($i = 0; $i < 100; $i++) {
            $users[] = [
                'TIPE_USER' => rand(1,2),
                'ID_JENIS_IDENTITAS' => rand(1,4),
                'ID_JENIS_PEMOHON' => rand(1,3),
                'NOMOR_IDENTITAS' => $faker->nik(),
                'NAMA_LENGKAP' => $faker->firstName." ".$faker->lastName,
                'NPWP' =>$faker->nik(),
                'email' =>$faker->email,
                'PEKERJAAN' => $faker->jobTitle,
                'ALAMAT' => $faker->streetAddress,
                'NO_TLP' => "081333654616",
                'NO_FAX' => "081333654619",
                'password' => $faker->password,
                'STATUS_KONFIRMASI' => rand(0,1),
                'created_at' => date('Y-m-d h:i:s'),
            ];
        }
        DB::table('users')->insert($users);
    }
}