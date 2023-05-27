<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units=["A","B","C"];
        $building=[
            'name'=>'tenants',
            'address'=>'澳門新口岸友誼大馬路875-893 號',
            'block'=>'第一座',
            'floors'=>15,
            'units'=>json_encode($units),
        ];
        $buildingId=DB::table('buildings')->insertGetId($building);
        for($i=1;$i<=$building['floors'];$i++){
            foreach($units as $unit){
                DB::table('apartments')->insert([
                    'building_id'=>$buildingId,
                    'floor'=>$i,
                    'unit'=>$unit
                ]);
    
            }
        }
    }
}
