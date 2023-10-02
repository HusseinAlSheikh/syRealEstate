<?php

namespace Database\Seeders;

use App\Models\Neighbourhood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NeighbourhoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $neighbourhoods = [
            ['id' => 1 , 'city_id' => '1' , 'name_ar' => 'الجميلية' , 'name_en' => 'Aljamilia'] ,

        ];

        foreach ($neighbourhoods as $neighbourhood){
            Neighbourhood::create($neighbourhood);
        }
    }
}
