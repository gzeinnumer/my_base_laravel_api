<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MApiResponseTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('m_api_response')->delete();
        
        \DB::table('m_api_response')->insert(array (
            0 => 
            array (
                'id' => 1,
                'method' => NULL,
                'end_point' => NULL,
                'response_number' => -1,
                'title' => 'Perhatian',
                'message' => 'Error',
                'created_at' => '2022-03-06 12:24:41',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'method' => NULL,
                'end_point' => NULL,
                'response_number' => 0,
                'title' => 'Perhatian',
                'message' => 'Failed',
                'created_at' => '2022-03-06 12:24:41',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'method' => NULL,
                'end_point' => NULL,
                'response_number' => 1,
                'title' => 'Perhatian',
                'message' => 'Success',
                'created_at' => '2022-03-06 12:24:41',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}