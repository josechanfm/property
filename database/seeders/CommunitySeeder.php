<?php

namespace Database\Seeders;

use App\Models\Community;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admin_user_community')->insert([
            'admin_user_id'=>'2',
            'community_id'=>'1',
        ]);
        $complexId = DB::table('communities')->insertGetId([
            'name' => '新安花園'
        ]);
        $units = ["A", "B", "C"];
        $building = [
            'community_id' => $complexId,
            'name' => '新安花園',
            'address' => '澳門新口岸友誼大馬路875-893 號',
            'block' => '第一座',
            'floors' => 15,
            'units' => json_encode($units),
        ];
        $buildingId = DB::table('buildings')->insertGetId($building);
        for ($i = 1; $i <= $building['floors']; $i++) {
            foreach ($units as $unit) {
                $propertyId=DB::table('properties')->insertGetId([
                    'building_id' => $buildingId,
                    'floor' => $i,
                    'unit' => $unit
                ]);
                $tenants=rand(1,5);
                for($t=1;$t<=$tenants;$t++){
                    DB::table('property_tenant')->insert([
                        'property_id'=>$propertyId,
                        'tenant_id'=>$t
                    ]);
                };
            }
        }
        $building = [
            'community_id' => $complexId,
            'name' => '新安花園',
            'address' => '澳門新口岸友誼大馬路875-893 號',
            'block' => '第二座',
            'floors' => 15,
            'units' => json_encode($units),
        ];
        $buildingId = DB::table('buildings')->insertGetId($building);
        for ($i = 1; $i <= $building['floors']; $i++) {
            foreach ($units as $unit) {
                $propertyId=DB::table('properties')->insertGetId([
                    'building_id' => $buildingId,
                    'floor' => $i,
                    'unit' => $unit
                ]);
                $tenants=rand(1,5);
                for($t=1;$t<=$tenants;$t++){
                    DB::table('property_tenant')->insert([
                        'property_id'=>$propertyId,
                        'tenant_id'=>$t
                    ]);
                };
            }
        }


        $complexId = DB::table('communities')->insertGetId([
            'name' => '南岸花園'
        ]);
        $units = ["A", "B", "C"];
        $building = [
            'community_id' => $complexId,
            'name' => '南岸花園',
            'address' => '澳門新口岸澳門馬濟時總督大馬路316-362號',
            'block' => 'A座',
            'floors' => 10,
            'units' => json_encode($units),
        ];
        $buildingId = DB::table('buildings')->insertGetId($building);
        for ($i = 1; $i <= $building['floors']; $i++) {
            foreach ($units as $unit) {
                $propertyId=DB::table('properties')->insertGetId([
                    'building_id' => $buildingId,
                    'floor' => $i,
                    'unit' => $unit
                ]);
                $tenants=rand(1,5);
                for($t=1;$t<=$tenants;$t++){
                    DB::table('property_tenant')->insert([
                        'property_id'=>$propertyId,
                        'tenant_id'=>$t
                    ]);
                };
            }
        }
        $building = [
            'community_id' => $complexId,
            'name' => '南岸花園',
            'address' => '澳門新口岸澳門馬濟時總督大馬路316-362號',
            'block' => 'B座',
            'floors' => 10,
            'units' => json_encode($units),
        ];
        $buildingId = DB::table('buildings')->insertGetId($building);
        for ($i = 1; $i <= $building['floors']; $i++) {
            foreach ($units as $unit) {
                $propertyId=DB::table('properties')->insertGetId([
                    'building_id' => $buildingId,
                    'floor' => $i,
                    'unit' => $unit
                ]);
                $tenants=rand(1,5);
                for($t=1;$t<=$tenants;$t++){
                    DB::table('property_tenant')->insert([
                        'property_id'=>$propertyId,
                        'tenant_id'=>$t
                    ]);
                };
            }
        }


    }
}
