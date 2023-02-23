<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(BarangTableSeeder::class);
        $this->call(DataTableSeeder::class);
        $this->call(EmptyTableSeeder::class);
        $this->call(MApiResponseTableSeeder::class);
        $this->call(MoreTableSeeder::class);
        $this->call(MuchDataTableSeeder::class);
        $this->call(OneTableSeeder::class);
        $this->call(PagingTableSeeder::class);
    }
}
