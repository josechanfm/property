<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forms')->insert([
            'community_id' => '2',
            'name'=>'first form',
            'title'=>'First form of title'
        ]);
        DB::table('form_fields')->insert([
            'form_id' => '1',
            'field_name'=>'field 1',
            'field_label'=>'label 1'
        ]);

    }
}
