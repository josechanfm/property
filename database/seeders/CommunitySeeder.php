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
        Community::factory()->count(10)->create();
        DB::table('admin_user_community')->insert([
            'admin_user_id'=>'2',
            'community_id'=>'1',
        ]);
        // DB::table('admin_user_community')->insert([
        //     'admin_user_id'=>'2',
        //     'community_id'=>'3',
        // ]);
        // DB::table('admin_user_community')->insert([
        //     'admin_user_id'=>'3',
        //     'community_id'=>'2',
        // ]);



        // DB::table('member_community')->insert([
        //     'member_id'=>'1',
        //     'community_id'=>'1',
        // ]);
        // DB::table('member_community')->insert([
        //     'member_id'=>'2',
        //     'community_id'=>'1',
        // ]);
        // DB::table('member_community')->insert([
        //     'member_id'=>'3',
        //     'community_id'=>'1',
        // ]);


        // DB::table('member_community')->insert([
        //     'member_id'=>'4',
        //     'community_id'=>'2',
        // ]);
        // DB::table('member_community')->insert([
        //     'member_id'=>'5',
        //     'community_id'=>'2',
        // ]);
        // DB::table('member_community')->insert([
        //     'member_id'=>'6',
        //     'community_id'=>'2',
        // ]);




    }
}
