<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeightTargetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param = [
            'id' => 1,
            'user_id' => 1,
            'target_weight' => 60.3,
        ];
        DB::table('weight_targets')->insert($param);
    }
}
