<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data')->delete();
        
        \DB::table('data')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'zein',
                'created_at' => '2022-01-09 14:53:35',
                'updated_at' => '2022-01-09 21:54:14',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'zein 2',
                'created_at' => '2022-01-09 15:03:24',
                'updated_at' => '2022-01-09 15:03:24',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'zein 24',
                'created_at' => '2022-01-10 16:24:18',
                'updated_at' => '2022-01-10 16:24:18',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'zein 214',
                'created_at' => '2022-01-10 16:26:00',
                'updated_at' => '2022-01-10 16:26:00',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'zein 2145',
                'created_at' => '2022-02-20 09:07:53',
                'updated_at' => '2022-02-20 09:07:53',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'zein 2145 a',
                'created_at' => '2022-03-06 12:02:59',
                'updated_at' => '2022-03-06 12:02:59',
            ),
        ));
        
        
    }
}