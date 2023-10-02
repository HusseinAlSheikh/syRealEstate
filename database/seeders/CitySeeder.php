<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['id' => 1 , 'state_id' => '1' , 'name_ar' => 'حلب' , 'name_en' => 'Aleppo'] ,

        ];
        foreach ($cities as $city){
            City::create($city);
        }
    }
}
