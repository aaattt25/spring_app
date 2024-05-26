<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, router } from '@inertiajs/vue3';

defineProps({
  errors: Object,
  prefectures: Array,
  qualities: Array
})

const form = useForm({
  name: null,
  kana: null,
  tel: null,
  url: null,
  postcode: null,
  // region_id: null,
  prefecture_id: null,
  city: null,
  address: null,
  quality_id: null,
  photo: null,
  simple_description: null,
  detail_description: null,
  has_restaurant: null,
  can_drop_by: null,
  is_inn: null,
  fee: null,
  is_flowing_from_source: null,
  has_bedrock_bath: null,
  has_sauna: null,
  has_parking: null,
  business_hours: null,
  holiday: null,
  efficacy: null,
  has_water_drawing_place: null,
  water_drawing_fee: null
})

const storeSpring = () => {
  router.post('/springs', form)
}
</script>

<template>
    <Head title="温泉登録" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">温泉登録</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                      <section class="text-gray-600 body-font relative">
                        <form @submit.prevent="storeSpring" enctype="multipart/form-data">
                          <div class="container px-5 py-8 mx-auto">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                              <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <label for="name" class="leading-7 text-sm text-gray-600">温泉名</label>
                                    <input type="text" id="name" name="name" v-model="form.name" placeholder="きららの湯" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div v-if="errors.name" class="text-red-600 text-sm">{{ errors.name }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <label for="kana" class="leading-7 text-sm text-gray-600">カナ（全角）</label>
                                    <input type="text" id="kana" name="kana" v-model="form.kana" placeholder="キララノユ" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div v-if="errors.kana" class="text-red-600 text-sm">{{ errors.kana }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <label for="tel" class="leading-7 text-sm text-gray-600">電話番号</label>
                                    <input type="tel" id="tel" name="tel" v-model="form.tel" placeholder="000-000-0000" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div v-if="errors.tel" class="text-red-600 text-sm">{{ errors.tel }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="url" class="leading-7 text-sm text-gray-600">ホームページアドレス</label>
                                    <input type="url" id="url" name="url" v-model="form.url" placeholder="https://xxxxx.com" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div v-if="errors.url" class="text-red-600 text-sm">{{ errors.url }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <label for="postcode" class="leading-7 text-sm text-gray-600">郵便番号（ハイフン無し）
                                    </label>
                                    <input type="number" id="postcode" name="postcode" v-model="form.postcode" placeholder="8121234" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div v-if="errors.postcode" class="text-red-600 text-sm">{{ errors.postcode }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <label for="prefecture_id" class="leading-7 text-sm text-gray-600">都道府県</label><br>
                                    <select name="prefecture_id" v-model="form.prefecture_id"  class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10 bg-gray-100">
                                      <option v-for="prefecture in prefectures" :key="prefecture.id" :value="prefecture.id">
                                        {{ prefecture.name }}
                                      </option>
                                    </select>
                                  </div>
                                </div>
                                <div v-if="errors.prefecture_id" class="text-red-600 text-sm">{{ errors.prefecture_id }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <label for="city" class="leading-7 text-sm text-gray-600">市(市でない場合は、町など)
                                    </label>
                                    <input type="text" id="city" name="city" v-model="form.city"  placeholder="福岡市" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div v-if="errors.city" class="text-red-600 text-sm">{{ errors.city }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <label for="address" class="leading-7 text-sm text-gray-600">残りの住所</label>
                                    <input type="text" id="address" name="address" placeholder="中央区天神1-1-1" v-model="form.address" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div v-if="errors.address" class="text-red-600 text-sm">{{ errors.address }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <label for="quality_id" class="leading-7 text-sm text-gray-600">泉質</label><br>
                                    <select name="quality_id" v-model="form.quality_id"  class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10 bg-gray-100">
                                      <option v-for="quality in qualities" :key="quality.id" :value="quality.id">
                                        {{ quality.name }}
                                      </option>
                                    </select>
                                  </div>
                                </div>
                                <div v-if="errors.quality_id" class="text-red-600 text-sm">{{ errors.quality_id }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <label for="simple_description" class="leading-7 text-sm text-gray-600">簡易説明文</label>
                                    <input type="text" id="simple_description" name="simple_description" v-model="form.simple_description" placeholder="柔らかい泉質が特徴です。" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div v-if="errors.simple_description" class="text-red-600 text-sm">{{ errors.simple_description }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <label for="detail_description" class="leading-7 text-sm text-gray-600">詳細説明文</label>
                                    <textarea id="detail_description" name="detail_description" v-model="form.detail_description" placeholder="露天風呂・サウナがあり長年愛されている温泉です。泉質は…"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                  </div>
                                </div>
                                <div v-if="errors.detail_description" class="text-red-600 text-sm">{{ errors.detail_description }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <input type="radio" id="has_restaurant0" name="has_restaurant" v-model="form.has_restaurant" value="0">
                                    <label for="has_restaurant0"class="ml-2 mr-4">レストラン無し</label>
                                    <input type="radio" id="has_restaurant1" name="has_restaurant" v-model="form.has_restaurant" value="1">
                                    <label for="has_restaurant1"class="ml-2 mr-4">レストラン有り</label>
                                  </div>
                                </div>
                                <div v-if="errors.has_restaurant" class="text-red-600 text-sm">{{ errors.has_restaurant }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <input type="radio" id="can_drop_by0" name="can_drop_by" v-model="form.can_drop_by" value="0">
                                    <label for="can_drop_by0"class="ml-2 mr-4">立ち寄り湯 可能</label>
                                    <input type="radio" id="can_drop_by1" name="can_drop_by" v-model="form.can_drop_by" value="1">
                                    <label for="can_drop_by1"class="ml-2 mr-4">立ち寄り湯 不可能</label>
                                  </div>
                                </div>
                                <div v-if="errors.can_drop_by" class="text-red-600">{{ errors.can_drop_by }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <input type="radio" id="is_inn0" name="is_inn" v-model="form.is_inn" value="0">
                                    <label for="is_inn0"class="ml-2 mr-4">宿泊施設 無し</label>
                                    <input type="radio" id="is_inn1" name="is_inn" v-model="form.is_inn" value="1">
                                    <label for="is_inn1"class="ml-2 mr-4">宿泊施設 有り</label>
                                  </div>
                                </div>
                                <div v-if="errors.is_inn" class="text-red-600 text-sm">{{ errors.is_inn }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="fee" class="leading-7 text-sm text-gray-600">立ち寄り湯の料金</label>
                                    <textarea id="fee" name="fee" v-model="form.fee" placeholder="大人：600円、子供：300円" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                  </div>
                                </div>
                                <div v-if="errors.fee" class="text-red-600 text-sm">{{ errors.fee }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <input type="radio" id="is_flowing_from_source0" name="is_flowing_from_source" v-model="form.is_flowing_from_source" value="0">
                                    <label for="is_flowing_from_source0"class="ml-2 mr-4">源泉掛け流しでない</label>
                                    <input type="radio" id="is_flowing_from_source1" name="is_flowing_from_source" v-model="form.is_flowing_from_source" value="1">
                                    <label for="is_flowing_from_source1"class="ml-2 mr-4">源泉掛け流しである</label>
                                  </div>
                                </div>
                                <div v-if="errors.is_flowing_from_source" class="text-red-600 text-sm">{{ errors.is_flowing_from_source }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <input type="radio" id="has_bedrock_bath0" name="has_bedrock_bath" v-model="form.has_bedrock_bath" value="0">
                                    <label for="has_bedrock_bath0"class="ml-2 mr-4">岩盤浴 無し</label>
                                    <input type="radio" id="has_bedrock_bath1" name="has_bedrock_bath" v-model="form.has_bedrock_bath" value="1">
                                    <label for="has_bedrock_bath1"class="ml-2 mr-4">岩盤浴 有り</label>
                                  </div>
                                </div>
                                <div v-if="errors.has_bedrock_bath" class="text-red-600 text-sm">{{ errors.has_bedrock_bath }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <input type="radio" id="has_sauna0" name="has_sauna" v-model="form.has_sauna" value="0">
                                    <label for="has_sauna0"class="ml-2 mr-4">サウナ 無し</label>
                                    <input type="radio" id="has_sauna1" name="has_sauna" v-model="form.has_sauna" value="1">
                                    <label for="has_sauna1"class="ml-2 mr-4">サウナ 有り</label>
                                  </div>
                                </div>
                                <div v-if="errors.has_sauna" class="text-red-600 text-sm">{{ errors.has_sauna }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <input type="radio" id="has_parking0" name="has_parking" v-model="form.has_parking" value="0">
                                    <label for="has_parking0"class="ml-2 mr-4">駐車場 無し</label>
                                    <input type="radio" id="has_parking1" name="has_parking" v-model="form.has_parking" value="1">
                                    <label for="has_parking1"class="ml-2 mr-4">駐車場 有り</label>
                                  </div>
                                </div>
                                <div v-if="errors.has_parking" class="text-red-600 text-sm">{{ errors.has_parking }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <label for="business_hours" class="leading-7 text-sm text-gray-600">営業時間</label>
                                    <input type="text" id="business_hours" name="business_hours" v-model="form.business_hours" placeholder="16:00〜23:00" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div v-if="errors.business_hours" class="text-red-600 text-sm">{{ errors.business_hours }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <label for="holiday" class="leading-7 text-sm text-gray-600">休業日</label>
                                    <input type="text" id="holiday" name="holiday" v-model="form.holiday"  placeholder="毎週火曜日" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div v-if="errors.holiday" class="text-red-600 text-sm">{{ errors.holiday }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <label for="efficacy" class="leading-7 text-sm text-gray-600">効能</label>
                                    <textarea id="efficacy" name="efficacy" v-model="form.efficacy" placeholder="痛風・関節リウマチ・神経痛・疲労回復・糖尿病" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                  </div>
                                </div>
                                <div v-if="errors.efficacy" class="text-red-600 text-sm">{{ errors.efficacy }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <span class="bg-red-800 rounded text-white font-bold text-xs p-1 mr-2">必須</span>
                                    <input type="radio" id="has_water_drawing_place0" name="has_water_drawing_place" v-model="form.has_water_drawing_place" value="0">
                                    <label for="has_parking0"class="ml-2 mr-4">水汲み場 無し</label>
                                    <input type="radio" id="has_water_drawing_place1" name="has_water_drawing_place" v-model="form.has_water_drawing_place" value="1">
                                    <label for="has_water_drawing_place1"class="ml-2 mr-4">水汲み場 有り</label>
                                  </div>
                                </div>
                                <div v-if="errors.has_water_drawing_place" class="text-red-600 text-sm">{{ errors.has_water_drawing_place }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="water_drawing_fee" class="leading-7 text-sm text-gray-600">水汲み料金</label>
                                    <input type="text" id="water_drawing_fee" name="water_drawing_fee" v-model="form.water_drawing_fee"  placeholder="100円/10L"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div v-if="errors.water_drawing_fee" class="text-red-600 text-sm">{{ errors.water_drawing_fee }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="photo" class="leading-7 text-sm text-gray-600">画像（アップロード可能なファイル拡張子：jpg,jpeg,png）</label>
                                    <input type="file" id="photo" name="photo"  placeholder="100円/10L" @input="form.photo = $event.target.files[0]" class="w-full rounded py-1 px-3 leading-8">
                                  </div>
                                </div>
                                <div class="p-2 w-full">
                                  <button class="flex mx-auto text-white bg-yellow-600 hover:bg-yellow-500 border-0 py-2 px-8 focus:outline-none rounded text-lg">登録する</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </section>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
