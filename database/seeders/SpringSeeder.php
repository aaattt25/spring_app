<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('springs')->insert([
            [
                'name' => '湯泉郷 温泉館 湯招花',
                'kana' => 'とうせんきょう おんせんかん とうしょうか',
                'tel' => 'TEL 0952-64-2683（本館）/ 0952-64-2360（-HANARE- 離れ） FAX 0952-64-2833',
                'url' => 'https://toshoka.net/index.html',
                'postcode' => 8400512,
                'region_id' => 9,
                'prefecture_id' => 41,
                'city' => '佐賀市',
                'address' => '富士町大字上熊の川180-1',
                'quality_id' => 11,
                'photo' => null,
                'simple_description' => '天然温泉掛け流しの湯・ラドンを含む天然温泉水',
                'detail_description' => '湯招花のお湯は、地下1,050mからの湧水が、こんこんと湧き出る多種類のイオンを含んだ泉温43度の天然掛け流し温泉です。毎分５００リットルの豊富な湧出量は西九州最大級。
                湯招花のラドンを含む天然温泉水は、肌を美しく心身の疲労回復をはかる健康の湯として親しまれています。ラドンは呼吸から直接血液中、または皮膚から組織へ吸収されイオン化作用により新陳代謝を促します。お湯に入るだけではなく、湯気を吸ったり温泉水を飲んだりして美肌、健康の効果をご堪能下さい。',
                'has_restaurant' => 1,
                'can_drop_by' => 1,
                'is_inn' => 0,
                'fee' => '・本館
                ・入館料
                大人：1400円、子供：700円（小学生以下）
                ・別料金
                家族風呂：1000円〜/60分
                ====================
                ・離れ
                基本料金
                5300円 〜/ 90分　（２名様 ・１室料金）
                別料金
                ２名以上追加料金
                大人：1400円、子供：700円
                延長料金
                時間延長３０分につ 2000円',
                'is_flowing_from_source' => 1,
                'has_bedrock_bath' => 0,
                'has_sauna' => 1,
                'has_parking' => 1,
                'business_hours' => '営業時間 10：00～20：00
                〈-HANARE- 離れの最終受付〉 18：30',
                'holiday'=> '毎週 火曜日・水曜日 　※祝日の場合は営業',
                'efficacy' => '	神経痛、筋肉痛、関節痛、五十肩、運動麻痺、間接のこわばり、打ち身、くじき、慢性消化器病、痔疾、冷え性、病後回復期、疲労回復、健康増進',
                'indication' => '痛風、動脈硬化症、高血圧、慢性胆のう炎、胆石症、慢性皮膚炎、慢性婦人病',
                'has_water_drawing_place' => 1,
                'water_drawing_fee' => '10L/100円',
            ],
        ]);
    }
}
