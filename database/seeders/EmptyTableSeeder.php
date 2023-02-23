<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmptyTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('empty')->delete();
        
        
        
    }
}