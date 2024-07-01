<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            ['name' => 'Razer'],
            ['name' => 'Logitech'],
            ['name' => 'SteelSeries'],
            ['name' => 'Corsair'],
            ['name' => 'HyperX'],
            ['name' => 'ASUS ROG'],
            ['name' => 'MSI'],
            ['name' => 'Alienware'],
            ['name' => 'Cooler Master'],
            ['name' => 'BenQ'],
            ['name' => 'Zowie'],
            ['name' => 'Sennheiser'],
            ['name' => 'Kingston'],
            ['name' => 'Acer Predator'],
            ['name' => 'EVGA'],
            ['name' => 'Gigabyte'],
            ['name' => 'Creative'],
            ['name' => 'Thermaltake'],
            ['name' => 'NZXT'],
            ['name' => 'Deepcool'],
            ['name' => 'Fractal Design'],
            ['name' => 'Antec'],
            ['name' => 'Phanteks'],
            ['name' => 'InWin'],
            ['name' => 'Mac'],
            ['name' => 'Samsung'],
        ];

        DB::table('brands')->insert($brands);
    }
}
