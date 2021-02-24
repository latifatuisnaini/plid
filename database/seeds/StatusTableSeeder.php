<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('status')->delete();
         
        \DB::table('status')->insert(array (
            0 => 
            array (
                'ID_STATUS' => 1,
                'STATUS' => 'Open',
            ),
            1 => 
            array (
                'ID_STATUS' => 2,
                'STATUS' => 'Sedang diproses',
            ),
            2 => 
            array (
                'ID_STATUS' => 3,
                'STATUS' => 'Diterima',
            ),
            3 => 
            array (
                'ID_STATUS' => 4,
                'STATUS' => 'Ditolak',
            ),
        ));
        
        
    }
}