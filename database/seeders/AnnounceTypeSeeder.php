<?php

namespace Database\Seeders;

use App\Models\AnnounceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnounceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $announceTypes = [
            ['id' => 1 , 'name_ar' => 'معروض' , 'name_en' => 'Offered'] ,
            ['id' => 2 , 'name_ar' => 'مطلوب' , 'name_en' => 'Wanted'] ,

        ];
        foreach ($announceTypes as $announceType){
            AnnounceType::create($announceType);
        }
    }
}
