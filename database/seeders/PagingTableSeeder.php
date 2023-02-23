<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PagingTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('paging')->delete();
        
        \DB::table('paging')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'data 1',
                'detail' => 'detail 1',
                'created_at' => '2022-01-09 15:46:07',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'data 2',
                'detail' => 'detail 2',
                'created_at' => '2022-01-09 15:46:07',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'data 3',
                'detail' => 'detail 3',
                'created_at' => '2022-01-09 15:47:01',
                'updated_at' => '2022-01-09 15:47:01',
            ),
        ));
        
        
    }
}