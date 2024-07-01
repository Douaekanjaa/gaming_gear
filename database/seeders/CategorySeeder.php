<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Keyboards'],
            ['name' => 'Mice'],
            ['name' => 'Headsets'],
            ['name' => 'Monitors'],
            ['name' => 'Gaming Laptops'],
            ['name' => 'Graphics Cards'],
            ['name' => 'Processors'],
            ['name' => 'Gaming Chairs'],
            ['name' => 'Gaming Consoles'],
            ['name' => 'Gaming Accessories'],
        ];

        DB::table('categories')->insert($categories);
    }
}
