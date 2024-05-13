<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            [
                'name' => '北海道',
                'sort_id' => 1,
            ],
            [
                'name' => '東北地方',
                'sort_id' => 2,
            ],
            [
                'name' => '関東地方',
                'sort_id' => 3,
            ],
            [
                'name' => '北陸地方',
                'sort_id' => 4,
            ],
            [
                'name' => '中部地方',
                'sort_id' => 5,
            ],
            [
                'name' => '近畿地方',
                'sort_id' => 6,
            ],
            [
                'name' => '中国地方',
                'sort_id' => 8,
            ],
            [
                'name' => '四国地方',
                'sort_id' => 7,
            ],
            [
                'name' => '九州地方',
                'sort_id' => 9,
            ],
            [
                'name' => '沖縄',
                'sort_id' => 10,
            ],
        ]);
    }
}
