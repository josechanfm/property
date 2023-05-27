<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tenant;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tenant::factory()->count(100)->create();
        // DB::table('tanant')->insert([
        //     'item'=>'tenants',
        //     'value'=>'[{"value":"owner","label":"業主"},{"value":"household","label":"住戶"},{"value":"renter","label":"承租人"},,{"value":"agent","label":"代理人"}]',
        // ]);

    }
}
