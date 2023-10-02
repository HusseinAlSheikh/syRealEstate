<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $propertyTypes = [
            ['id' => 1 , 'name_ar' => 'منزل' , 'name_en' => 'House'] ,

        ];
        foreach ($propertyTypes as $propertyType){
            PropertyType::create($propertyType);
        }
    }
}
