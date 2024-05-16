<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prefectures')->insert([
            [
                'name' => '北海道',          // 北海道
                'sort_id' => 1,
            ],
            [
                'name' => '青森県',         // 東北
                'sort_id' => 2,
            ],
            [
                'name' => '岩手県',
                'sort_id' => 3,
            ],
            [
                'name' => '宮城県',
                'sort_id' => 4,
            ],
            [
                'name' => '秋田県',
                'sort_id' => 5,
            ],
            [
                'name' => '山形県',
                'sort_id' => 6,
            ],
            [
                'name' => '福島県',
                'sort_id' => 7,
            ],
            [
                'name' => '茨城県',   // 関東
                'sort_id' => 8,
            ],
            [
                'name' => '栃木県',
                'sort_id' => 9,
            ],
            [
                'name' => '群馬県',
                'sort_id' => 10,
            ],
            [
                'name' => '埼玉県',
                'sort_id' => 11,
            ],
            [
                'name' => '千葉県',
                'sort_id' => 12,
            ],
            [
                'name' => '東京都',
                'sort_id' => 13,
            ],
            [
                'name' => '神奈川県',
                'sort_id' => 14,
            ],
            [
                'name' => '山梨県',
                'sort_id' => 15,
            ],
            [
                'name' => '長野県',
                'sort_id' => 16,
            ],
            [                          // 北陸
                'name' => '新潟県',
                'sort_id' => 17,
            ],
            [
                'name' => '富山県',
                'sort_id' => 18,
            ],
            [
                'name' => '石川県',
                'sort_id' => 19,
            ],
            [
                'name' => '福井県',
                'sort_id' => 20,
            ],
            [
                'name' => '岐阜県',   // 中部
                'sort_id' => 21,
            ],
            [
                'name' => '静岡県',
                'sort_id' => 22,
            ],
            [
                'name' => '愛知県',
                'sort_id' => 23,
            ],
            [
                'name' => '三重県',
                'sort_id' => 24,
            ],
            [
                'name' => '滋賀県', // 近畿
                'sort_id' => 25,
            ],
            [
                'name' => '京都府',
                'sort_id' => 26,
            ],
            [
                'name' => '大阪府',
                'sort_id' => 27,
            ],
            [
                'name' => '兵庫県',
                'sort_id' => 28,
            ],
            [
                'name' => '奈良県',
                'sort_id' => 29,
            ],
            [
                'name' => '和歌山県',
                'sort_id' => 30,
            ],
            [                             // 中国
                'name' => '鳥取県',
                'sort_id' => 31,
            ],
            [
                'name' => '島根県',
                'sort_id' => 32,
            ],
            [
                'name' => '岡山県',
                'sort_id' => 33,
            ],
            [
                'name' => '広島県',
                'sort_id' => 34,
            ],
            [
                'name' => '山口県',
                'sort_id' => 35,
            ],
            [                            // 四国
                'name' => '徳島県',
                'sort_id' => 36,
            ],
            [
                'name' => '香川県',
                'sort_id' => 37,
            ],
            [
                'name' => '愛媛県',
                'sort_id' => 38,
            ],
            [
                'name' => '高知県',
                'sort_id' => 39,
            ],
            [                          // 九州
                'name' => '福岡県',
                'sort_id' => 40,
            ],
            [
                'name' => '佐賀県',
                'sort_id' => 41,
            ],
            [
                'name' => '長崎県',
                'sort_id' => 42,
            ],
            [
                'name' => '熊本県',
                'sort_id' => 43,
            ],
            [
                'name' => '大分県',
                'sort_id' => 44,
            ],
            [
                'name' => '宮崎県',
                'sort_id' => 45,
            ],
            [
                'name' => '鹿児島県',
                'sort_id' => 46,
            ],
            [
                'name' => '沖縄県',
                'sort_id' => 47,
            ]
        ]);
    }
}
