<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OneTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('one')->delete();
        
        \DB::table('one')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_paging' => 2,
                'one' => 'one 2',
                'created_at' => '2022-01-09 17:12:00',
                'updated_at' => '2022-01-09 11:11:49',
            ),
        ));
        
        
    }
}