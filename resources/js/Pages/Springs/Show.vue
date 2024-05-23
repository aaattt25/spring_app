<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
  spring: Object,
  quality_name: String,
  photo_url: String,
})
</script>

<template>
  <Head title="温泉登録" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">温泉詳細</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">

            <div class="max-w-screen-lg h-auto mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

              <Link class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded" as="button" :href="route('springs.edit', {spring: spring.id })">編集する</Link>

              <img v-if="photo_url"class="rounded-t-lg " :src="photo_url" alt="" />
              <img v-else class="rounded-t-lg " src="/images/no_image.png" alt="" />
              <div class="p-5">
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ spring.kana }}</p>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ spring.name }}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ spring.detail_description }}</p>


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <tbody>
                      <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            住所
                        </th>
                        <td class="px-6 py-4">
                          〒{{spring.postcode }}　{{ spring.region_id }}{{ spring.city }}{{ spring.address }}
                        </td>
                      </tr>
                      <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                          電話番号
                        </th>
                        <td class="px-6 py-4">
                          {{ spring.tel }}
                        </td>
                      </tr>
                      <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                          ホームページ
                        </th>
                        <td class="px-6 py-4">
                          <link>{{ spring.url }}
                        </td>
                      </tr>
                      <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                          泉質
                        </th>
                        <td class="px-6 py-4">
                          {{ quality_name }}
                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                          源泉掛け流し
                        </td>
                        <td class="px-6 py-4">
                          <span v-if="spring.is_flowing_from_source === 0">x</span>
                          <span v-if="spring.is_flowing_from_source === 1">○</span>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                          効能
                        </th>
                        <td class="px-6 py-4">
                          {{ spring.efficacy }}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                          立ち寄り湯の料金
                        </th>
                        <td class="px-6 py-4">
                          {{ spring.fee }}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                          食事処
                        </th>
                        <td class="px-6 py-4">
                          <span v-if="spring.has_restaurant === 0">x</span>
                          <span v-if="spring.has_restaurant === 1">○</span>
                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                          駐車場
                        </td>
                        <td class="px-6 py-4">
                          <span v-if="spring.has_parking === 0">x</span>
                          <span v-if="spring.has_parking === 1">○</span>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                          宿泊
                        </th>
                        <td class="px-6 py-4">
                          <span v-if="spring.has_parking === 0">x</span>
                          <span v-if="spring.has_parking === 1">○</span>
                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                          立ち寄り湯
                        </td>
                        <td class="px-6 py-4">
                          <span v-if="spring.is_inn === 0">x</span>
                          <span v-if="spring.is_inn === 1">○</span>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                          岩盤浴
                        </th>
                        <td class="px-6 py-4">
                          <span v-if="spring.has_bedrock_bath === 0">x</span>
                          <span v-if="spring.has_bedrock_bath === 1">○</span>
                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                          サウナ
                        </td>
                        <td class="px-6 py-4">
                          <span v-if="spring.has_sauna === 0">x</span>
                          <span v-if="spring.has_sauna === 1">○</span>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                          営業時間
                        </th>
                        <td class="px-6 py-4">
                          {{ spring.business_hours }}
                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                          休業日
                        </td>
                        <td class="px-6 py-4">
                          {{ spring.holiday }}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                          水汲み場
                        </th>
                        <td class="px-6 py-4">
                          <span v-if="spring.has_water_drawing_place === 0">x</span>
                          <span v-if="spring.has_water_drawing_place === 1">○</span>
                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                          水汲み料金
                        </td>
                        <td class="px-6 py-4">
                          {{ spring.water_drawing_fee }}
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
