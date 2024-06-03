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
                'name' => '博多湯',
                'kana' => 'ハカタユ',
                'tel' => '092-922-2119',
                'url' => 'http://hakatayu.jp/',
                'postcode' => '8180058',
                // 'region_id' => 9,
                'prefecture_id' => 40,
                'city' => '筑紫野市',
                'address' => '湯町1-14-5',
                'quality_id' => 11,
                'photo' => null,
                'simple_description' => '福岡県中部に位置する二日市温泉は、1300年の歴史を持つ九州最古の温泉',
                'detail_description' => '地下２６０ｍから汲み上げる源泉を、一度も空気に触れさせることなく、新鮮なまま浴槽へ掛け流し。もちろん加水・加熱は一切行っていない。高温にしてラドンを多く含むお湯は、硫黄の香りが心地よく、しっとりとしていて「美肌の湯」としても定評がある。',
                'has_restaurant' => 1,
                'can_drop_by' => 1,
                'is_inn' => 0,
                'fee' => '大人平日：350円、大人休日：450円、中人（6〜11歳）200円、小人（4・5歳）100円、平日回数券11枚チケット：3600円',
                'is_flowing_from_source' => 1,
                'has_bedrock_bath' => 0,
                'has_sauna' => 0,
                'has_parking' => 0,
                'business_hours' => '営業時間 10：00～21：30　最終受付21：00',
                'holiday'=> '年中無休',
                'efficacy' => '火傷・皮膚炎・神経痛・筋肉痛・関節痛・慢性消化器病・痔疾・冷え性・病後回復期　うちみ・くじき・関節のこわばり・運動麻痺・五十肩・疲労回復',
                'has_water_drawing_place' => 1,
                'water_drawing_fee' => '2L/100円、10L/250円、20L/400円、空き容器2リットル：150円',
            ],
            [
                'name' => '湯泉郷 温泉館 湯招花',
                'kana' => 'オンセンキョウオンセンカントウショウカ',
                'tel' => '0952642683',
                'url' => 'https://toshoka.net/index.html',
                'postcode' => '8400512',
                // 'region_id' => 9,
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
                'fee' => '【本館】入館料:大人1400円、子供700円（小学生以下）【別料金】家族風呂：1000円〜/60分',
                'is_flowing_from_source' => 1,
                'has_bedrock_bath' => 0,
                'has_sauna' => 1,
                'has_parking' => 1,
                'business_hours' => '営業時間 10：00～20：00〈-HANARE- 離れの最終受付〉 18：30',
                'holiday'=> '毎週 火曜日・水曜日 　※祝日の場合は営業',
                'efficacy' => '	神経痛、筋肉痛、関節痛、五十肩、運動麻痺、間接のこわばり、打ち身、くじき、慢性消化器病、痔疾、冷え性、病後回復期、疲労回復、健康増進',
                'has_water_drawing_place' => 1,
                'water_drawing_fee' => '10L/100円',
            ],
            [
                'name' => '古湯温泉 ＯＮＣＲＩ / おんくり',
                'kana' => 'フルユオンセンオンクリ',
                'tel' => '0952518111',
                'url' => 'https://oncri.com/',
                'postcode' => '8400501',
                // 'region_id' => 9,
                'prefecture_id' => 41,
                'city' => '佐賀市',
                'address' => '富士町古湯556',
                'quality_id' => 11,
                'photo' => null,
                'simple_description' => '日常から少し離れ、至福のラジウム泉ぬる湯めぐり。',
                'detail_description' => '古湯温泉は古くから湯治で親しまれてきた名湯です。「ぬる湯」として知られており泉温は38℃と少しぬるめ。身体に負担がかからず、リラックス効果がある、長時間浸かることができることから湯治に最適であると言われています。',
                'has_restaurant' => 1,
                'can_drop_by' => 1,
                'is_inn' => 1,
                'fee' => '
                料金：大人1,300円（税込み）、小学生650円（税込み）、未就学児童 無料
                その他：レンタルバスタオル／200円（税込み）、フェイスタオル／無料',
                'is_flowing_from_source' => 0,
                'has_bedrock_bath' => 0,
                'has_sauna' => 1,
                'has_parking' => 1,
                'business_hours' => 'ご入浴時間：10:00～20:00',
                'holiday'=> '毎週 火曜日・水曜日 　※祝日の場合は営業',
                'efficacy' => '神経痛、筋肉痛、関節痛、五十肩、運動麻痺、関節のこわばり、打ち身、くじき、慢性消化器病、痔疾、冷え性、病後回復期、疲労回復、健康増進、 通風、動脈硬化症、高血圧症、慢性胆嚢炎、胆石症、慢性皮膚病、 慢性婦人病など',
                'has_water_drawing_place' => 0,
                'water_drawing_fee' => null,
            ],
            [
                'name' => '平山温泉フローラ',
                'kana' => 'ヒラヤマオンセンフローラ',
                'tel' => '0968-44-5888',
                'url' => 'https://www.spa-flora.com/price.html',
                'postcode' => '8610556',
                // 'region_id' => 9,
                'prefecture_id' => 43,
                'city' => '山鹿市',
                'address' => '平山5235',
                'quality_id' => 11,
                'photo' => null,
                'simple_description' => 'pH9.9の弱アルカリ性。万病の湯とされる弱放射能[ラドン]を含み
                美肌効果と共に薬効の効果も期待できる。',
                'detail_description' => '源泉掛け流しの温泉。アルカリ単純で肌の角質を取る働きが強く古い角質層の新陳代謝を促進するためくすみをとったりツルツル肌にしてくれる。乾燥肌の人は入浴後の保湿ケアが必要。また、弱放射能で、万病の湯と言われるラドン温泉。ラドンは吸収が一番よく無色透明な湯で、薬効の効率が最も高いと言われており「痛風の湯」とも言われる。さらに硫黄泉であり、「硫黄泉」=「シミ抜きの湯」と言われている。シミ予防、メラニン分解を促し生活習慣病、メタボ動脈硬化、高血圧など、様々な症状に効果が期待できる',
                'has_restaurant' => 1,
                'can_drop_by' => 1,
                'is_inn' => 0,
                'fee' => '大人：500円、4〜小学生：300円',
                'is_flowing_from_source' => 1,
                'has_bedrock_bath' => 0,
                'has_sauna' => 1,
                'has_parking' => 1,
                'business_hours' => '大浴場9:30～21:30、個室10:30～16:00',
                'holiday'=> '毎週木曜日',
                'efficacy' => '皮膚病（アトピー）・神経痛・五十肩・筋肉痛・関節痛 ・運動麻痺・他多数',
                'has_water_drawing_place' => 0,
                'water_drawing_fee' => '',
            ],
            [
                'name' => '琴ひら温泉ゆめ山水',
                'kana' => 'コトヒラオンセンユメサンスイ',
                'tel' => '0973-23-8827',
                'url' => 'http://www.kotohira-onsen.com/',
                'postcode' => '8770054',
                // 'region_id' => 9,
                'prefecture_id' => 44,
                'city' => '日田市',
                'address' => '琴平町1571-1',
                'quality_id' => 3,
                'photo' => null,
                'simple_description' => '趣のある琴平高瀬川の渓流沿いの景色を楽しみながら源泉掛け流しのお湯が楽しめる',
                'detail_description' => '高瀬川沿いに作られた４つの露天風呂。天領日田市の中でもより静かで懐かしい佇まいをみせる高瀬琴平。その一角高瀬川沿いにゆめ山水の露天風呂は造られています。渓流を流れる水の音を聴きならがら、掛け流しのお湯にのんびりご入浴できる。大きな屋根のある露天風呂は雨の日でもゆっくりご利用できる。また、ゆめ山水の家族風呂は、7種類（川石、山石、釜、くり抜き、桶、切り石、ひのき）・2サイズ、合計16ヶ所の中からお好きなタイプから選べる。また、脱衣場、浴室とも余裕のある広めの造り。',
                'has_restaurant' => 1,
                'can_drop_by' => 1,
                'is_inn' => 0,
                'fee' => '大人（中学生以上）￥800／小人（4才～小学生）￥400、家族風呂  2000〜2500円／1室60分',
                'is_flowing_from_source' => 1,
                'has_bedrock_bath' => 0,
                'has_sauna' => 0,
                'has_parking' => 1,
                'business_hours' => '露天風呂12:00～20:45(受付終了20:15）土日祝11:00～21:00(受付終了20:30）、家族風呂10:00～21:50（最終受付20:50）土日祝9:00～21:50（最終受付20:50）※営業時間は変更する場合がございます。お電話にてお問合せください。',
                'holiday'=> '木曜定休 （祝日は営業）',
                'efficacy' => '美白美肌効果、すり傷、火傷、虚弱児童、慢性婦人病、神経痛、筋肉痛、関節痛、五十肩、運動麻痺、関節のこわばり、うちみ、くじき、慢性消化器病、冷え性、他',
                'has_water_drawing_place' => 0,
                'water_drawing_fee' => '',
            ],
        ]);
    }
}
