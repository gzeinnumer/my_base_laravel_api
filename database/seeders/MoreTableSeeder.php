<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MoreTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('more')->delete();
        
        \DB::table('more')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_paging' => 2,
                'more' => 'more 2',
                'created_at' => '2022-01-09 16:00:54',
                'updated_at' => '2022-01-09 10:00:49',
            ),
            1 => 
            array (
                'id' => 2,
                'id_paging' => 3,
                'more' => 'more 3.1',
                'created_at' => '2022-01-09 16:21:25',
                'updated_at' => '2022-01-09 10:21:10',
            ),
            2 => 
            array (
                'id' => 3,
                'id_paging' => 3,
                'more' => 'more 3.2',
                'created_at' => '2022-01-09 16:21:25',
                'updated_at' => '2022-01-09 10:21:10',
            ),
        ));
        
        
    }
}