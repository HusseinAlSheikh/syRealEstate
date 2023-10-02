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
            ['id' => 1 ,'state_id' => 1 , 'name_ar' => 'دمشق' , 'name_en' => 'Damascus'] ,
            ['id' => 2 ,'state_id' => 2 , 'name_ar' => 'حلب' , 'name_en' => 'Aleppo'] ,
            ['id' => 3 ,'state_id' => 3 , 'name_ar' => 'ريف دمشق' , 'name_en' => 'Reef Damascus'] ,
            ['id' => 4 ,'state_id' => 4 , 'name_ar' => 'حمص' , 'name_en' => 'Homs'] ,
            ['id' => 5 ,'state_id' => 5 , 'name_ar' => 'اللاذقية' , 'name_en' => 'Lattakia'] ,
            ['id' => 6 ,'state_id' => 6 , 'name_ar' => 'طرطوس' , 'name_en' => 'Tartous'] ,
            ['id' => 7 ,'state_id' => 7 , 'name_ar' => 'حماه' , 'name_en' => 'Hama'] ,
            ['id' => 8 ,'state_id' => 8 , 'name_ar' => 'ادلب' , 'name_en' => 'Idleb'] ,
            ['id' => 9 ,'state_id' => 9 , 'name_ar' => 'الرقة' , 'name_en' => 'Raqqa'] ,
            ['id' => 10 ,'state_id' => 10 , 'name_ar' => 'دير الزور' , 'name_en' => 'Deir Azzour'] ,
            ['id' => 11 ,'state_id' => 11 , 'name_ar' => 'السويداء' , 'name_en' => 'Al-Soiadaa'] ,
            ['id' => 12 ,'state_id' => 12 , 'name_ar' => 'درعا' , 'name_en' => 'Daraa'] ,
            ['id' => 13 ,'state_id' => 13 , 'name_ar' => 'القنيطرة' , 'name_en' => 'Al-Qunatera'] ,
            ['id' => 14 ,'state_id' => 14 , 'name_ar' => 'الحسكة' , 'name_en' => 'Al-Hasakah'] ,
            
        ];
        foreach ($cities as $city){
            City::create($city);
        }
    }
}
