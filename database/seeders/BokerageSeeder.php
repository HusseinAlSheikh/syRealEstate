<?php

namespace Database\Seeders;

use App\Models\Bokerage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BokerageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bokerages = [
            ['id' => 1 , 'name_ar' => 'بيع' , 'name_en' => 'Sale'] ,
            ['id' => 2 , 'name_ar' => 'آجار' , 'name_en' => 'Rent'] ,
            ['id' => 3 , 'name_ar' => 'استثمار' , 'name_en' => 'Investment'] ,
        ];
        foreach ($bokerages as $bokerage){
            Bokerage::create($bokerage);
        }
    }
}
