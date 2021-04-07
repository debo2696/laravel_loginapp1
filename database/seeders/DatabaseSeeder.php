<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('random_table')->insert([
        [
            'random_name' => 'Del43',
            'random_object_name' => 'Lapp',
            'random_obj_desc' => 'Dell Wirele11b/g/n (2.4GHz)',
            'random_obj_MAC' => 'AC-D1-BB-E5',
            'random_obj_IP' => '100.112',
            'price' => 'medium'
        ],
        [
            'random_name' => 'Deliron 3543',
            'random_object_name' => 'Latop',
            'random_obj_desc' => 'De 1704 802.11b/g/n (2.4GHz)',
            'random_obj_MAC' => 'AC-D5',
            'random_obj_IP' => '10654.12',
            'price' => 'low'
        ]
        ]
    );
    }
}
