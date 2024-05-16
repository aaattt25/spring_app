<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

defineProps({
  errors: Object,
  prefectures: Array,
  qualities: Array
})

const form = reactive({
  name: null,
  kana: null,
  tel: null,
  url: null,
  postcode: null,
  region_id: null,
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
  Inertia.post('/springs', form)
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
                        <form @submit.prevent="storeSpring">
                          <div class="container px-5 py-8 mx-auto">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                              <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">温泉名</label>
                                    <input type="text" id="name" name="name" v-model="form.name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div v-if="errors.name">{{ errors.name }}</div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="kana" class="leading-7 text-sm text-gray-600">ｶﾅ</label>
                                    <input type="text" id="kana" name="kana" v-model="form.kana" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="tel" class="leading-7 text-sm text-gray-600">電話番号</label>
                                    <input type="tel" id="tel" name="tel" v-model="form.tel" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="url" class="leading-7 text-sm text-gray-600">ホームページアドレス</label>
                                    <input type="url" id="url" name="url" v-model="form.url" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="postcode" class="leading-7 text-sm text-gray-600">郵便番号
                                    </label>
                                    <input type="number" id="postcode" name="postcode" v-model="form.postcode" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="prefecture_id" class="leading-7 text-sm text-gray-600">都道府県</label><br>
                                    <select name="prefecture_id" v-model="form.prefecture_id"  class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10 bg-gray-100">
                                      <option v-for="prefecture in prefectures" :key="prefecture.id" :value="prefecture.id">
                                        {{ prefecture.name }}
                                      </option>
                                    </select>
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="city" class="leading-7 text-sm text-gray-600">市</label>
                                    <input type="text" id="city" name="city" v-model="form.city" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="address" class="leading-7 text-sm text-gray-600">残りの住所</label>
                                    <input type="text" id="address" name="address" v-model="form.address" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="quality_id" class="leading-7 text-sm text-gray-600">泉質</label><br>
                                    <select name="quality_id" v-model="form.quality_id"  class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10 bg-gray-100">
                                      <option v-for="quality in qualities" :key="quality.id" :value="quality.id">
                                        {{ quality.name }}
                                      </option>
                                    </select>
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="simple_description" class="leading-7 text-sm text-gray-600">短い説明</label>
                                    <input type="text" id="simple_description" name="simple_description" v-model="form.simple_description" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="detail_description" class="leading-7 text-sm text-gray-600">詳しい説明</label>
                                    <textarea id="detail_description" name="detail_description" v-model="form.detail_description" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <input type="radio" id="has_restaurant0" name="has_restaurant" v-model="form.has_restaurant" value="0">
                                    <label for="has_restaurant0"class="ml-2 mr-4">レストラン無し</label>
                                    <input type="radio" id="has_restaurant1" name="has_restaurant" v-model="form.has_restaurant" value="1">
                                    <label for="has_restaurant1"class="ml-2 mr-4">レストラン有り</label>
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <input type="radio" id="can_drop_by0" name="can_drop_by" v-model="form.can_drop_by" value="0">
                                    <label for="can_drop_by0"class="ml-2 mr-4">立ち寄り湯 無し</label>
                                    <input type="radio" id="can_drop_by1" name="can_drop_by" v-model="form.can_drop_by" value="1">
                                    <label for="can_drop_by1"class="ml-2 mr-4">立ち寄り湯 有り</label>
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <input type="radio" id="is_inn0" name="is_inn" v-model="form.is_inn" value="0">
                                    <label for="is_inn0"class="ml-2 mr-4">宿泊施設 無し</label>
                                    <input type="radio" id="is_inn1" name="is_inn" v-model="form.is_inn" value="1">
                                    <label for="is_inn1"class="ml-2 mr-4">宿泊施設 有り</label>
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="fee" class="leading-7 text-sm text-gray-600">立ち寄り湯の料金</label>
                                    <textarea id="fee" name="fee" v-model="form.fee" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <input type="radio" id="is_flowing_from_source0" name="is_flowing_from_source" v-model="form.is_flowing_from_source" value="0">
                                    <label for="is_flowing_from_source0"class="ml-2 mr-4">源泉掛け流しでない</label>
                                    <input type="radio" id="is_flowing_from_source1" name="is_flowing_from_source" v-model="form.is_flowing_from_source" value="1">
                                    <label for="is_flowing_from_source1"class="ml-2 mr-4">源泉掛け流しである</label>
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <input type="radio" id="has_bedrock_bath0" name="has_bedrock_bath" v-model="form.has_bedrock_bath" value="0">
                                    <label for="has_bedrock_bath0"class="ml-2 mr-4">岩盤浴 無し</label>
                                    <input type="radio" id="has_bedrock_bath1" name="has_bedrock_bath" v-model="form.has_bedrock_bath" value="1">
                                    <label for="has_bedrock_bath1"class="ml-2 mr-4">岩盤浴 有り</label>
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <input type="radio" id="has_sauna0" name="has_sauna" v-model="form.has_sauna" value="0">
                                    <label for="has_sauna0"class="ml-2 mr-4">サウナ 無し</label>
                                    <input type="radio" id="has_sauna1" name="has_sauna" v-model="form.has_sauna" value="1">
                                    <label for="has_sauna1"class="ml-2 mr-4">サウナ 有り</label>
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <input type="radio" id="has_parking0" name="has_parking" v-model="form.has_parking" value="0">
                                    <label for="has_parking0"class="ml-2 mr-4">駐車場 無し</label>
                                    <input type="radio" id="has_parking1" name="has_parking" v-model="form.has_parking" value="1">
                                    <label for="has_parking1"class="ml-2 mr-4">駐車場 有り</label>
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="business_hours" class="leading-7 text-sm text-gray-600">営業時間</label>
                                    <input type="text" id="business_hours" name="business_hours" v-model="form.business_hours" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="holiday" class="leading-7 text-sm text-gray-600">休業日</label>
                                    <input type="text" id="holiday" name="holiday" v-model="form.holiday" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="efficacy" class="leading-7 text-sm text-gray-600">効能</label>
                                    <textarea id="efficacy" name="efficacy" v-model="form.efficacy" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <input type="radio" id="has_water_drawing_place0" name="has_water_drawing_place" v-model="form.has_water_drawing_place" value="0">
                                    <label for="has_parking0"class="ml-2 mr-4">水汲み場 無し</label>
                                    <input type="radio" id="has_water_drawing_place1" name="has_water_drawing_place" v-model="form.has_water_drawing_place" value="1">
                                    <label for="has_water_drawing_place1"class="ml-2 mr-4">水汲み場 有り</label>
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="water_drawing_fee" class="leading-7 text-sm text-gray-600">水汲み料金</label>
                                    <input type="text" id="water_drawing_fee" name="water_drawing_fee" v-model="form.water_drawing_fee" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
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
