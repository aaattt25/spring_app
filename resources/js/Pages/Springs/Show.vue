<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router, useForm } from '@inertiajs/vue3';

defineProps({
  spring: Object,
  quality_name: String,
  photo_url: String,
  prefecture_name: String,
  user_role: String
})

const form = useForm({
  photo: null
})

const deleteConfirm = (id) => {
  // console.log(id)
  router.delete(`/springs/${id}`, {
    onBefore: () => confirm('本当に削除しますか？'),
  })
}

const updateImage = (id) => {
  console.log('実行されました')
  router.post(`/springs/${id}/update-image`, form)
}

const deleteImage = (id) => {
  console.log(id)
  router.delete(`/springs/${id}/delete-image`, {
    onBefore: () => confirm('本当に画像を削除しますか？'),
  })
}
</script>

<template>
  <Head title="温泉登録" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">温泉詳細</h2>
    </template>
    <div v-if="$page.props.flash.message" class="bg-blue-300 text-white p-4">{{ $page.props.flash.message }}</div>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900 flex flex-wrap">
            <div class="p-2 m-1">
            <Link v-if="user_role === 'administrator'" class="flex ml-auto text-white bg-yellow-600 border-0 py-2 px-6 my-3 focus:outline-none hover:bg-yellow-500 rounded" as="button" :href="route('springs.edit', {spring: spring.id })">温泉情報を編集する</Link>
            </div>
            <div class="p-2 m-1">
            <button v-if="user_role === 'administrator' && spring.photo !== null" @click="deleteImage(spring.id)" class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 my-3 focus:outline-none hover:bg-red-600 rounded">温泉画像を削除する</button>
            </div>
            <div class="p-2 m-1">
            <button v-if="user_role === 'administrator'" @click="deleteConfirm(spring.id)" class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 my-3 focus:outline-none hover:bg-red-600 rounded">この温泉を削除する</button>
            </div>
          </div>

          <div class="p-10 m-5 border border-solid border-yellow-600">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-600 dark:text-white text-center">新しい画像に変更する</h5>

            <form @submit.prevent="updateImage(spring.id)" enctype="multipart/form-data">
              <p>手順１</p>
              <div class="p-2 w-full pb-7">
                <div class="relative">
                  <label for="photo" class="leading-7 text-gray-700">画像を選択する（アップロード可能なファイル拡張子：jpg,jpeg,png）</label>
                  <input type="file" id="photo" name="photo" @input="form.photo = $event.target.files[0]" class="w-full rounded py-1 px-3 leading-8">
                </div>
              </div>
              <p>手順2</p>
              <div class="p-2 w-full">
                <button class="px-2 py-1 text-gray-500 border border-gray-500 font-semibold rounded hover:bg-yellow-100">画像をアップロードする</button>
              </div>
            </form>
          </div>

            <div class="max-w-screen-lg h-auto mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
              <img v-if="spring.photo === null" class="rounded-t-lg " src="/images/no_image.png" alt="" />
              <img v-else class="rounded-t-lg " :src="photo_url" alt="" />
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
                          〒{{spring.postcode }}　{{ prefecture_name }}{{ spring.city }}{{ spring.address }}
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
  </AuthenticatedLayout>
</template>
