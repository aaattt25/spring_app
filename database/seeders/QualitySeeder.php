<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('qualities')->insert([
            [
                'name' => '単純温泉',
                'sort_id' => 1,
            ],
            [
                'name' => '二酸化炭素泉',
                'sort_id' => 2,
            ],
            [
                'name' => '炭酸水素塩',
                'sort_id' => 3,
            ],
            [
                'name' => '塩化物泉',
                'sort_id' => 4,
            ],
            [
                'name' => '硫酸塩泉',
                'sort_id' => 5,
            ],
            [
                'name' => '含鉄泉',
                'sort_id' => 6,
            ],
            [
                'name' => '含アルミニウム泉',
                'sort_id' => 8,
            ],
            [
                'name' => '含銅鉄泉',
                'sort_id' => 7,
            ],
            [
                'name' => '硫黄泉',
                'sort_id' => 9,
            ],
            [
                'name' => '酸性泉',
                'sort_id' => 10,
            ],
            [
                'name' => '放射能泉',
                'sort_id' => 11,
            ],
            [
                'name' => '含よう素泉',
                'sort_id' => 12,
            ],
            [
                'name' => 'その他',
                'sort_id' => 13,
            ],
        ]);
    }
}
