<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BarangTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('barang')->delete();
        
        \DB::table('barang')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Data 3',
                'created_at' => '2000-01-01 00:00:00',
                'updated_at' => '2022-07-03 09:59:33',
            ),
        ));
        
        
    }
}