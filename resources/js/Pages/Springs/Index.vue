<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, router } from '@inertiajs/vue3';

defineProps({
  springs: Array,
  user_role: String,
  qualities: Array,
  prefectures: Array
})

const form = useForm({
  prefecture_id: null,
  quality_id: null,
  is_flowing_from_source: null,
})

const searchSpring = () => {
  // console.log('form')
  router.get('/springs', form)
}
</script>

<template>
    <Head title="温泉一覧" />

    <AuthenticatedLayout>
      <template #header>
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">温泉一覧</h2>
      </template>

        <div class="max-w-7xl mx-auto bg-[url('/images/background.jpg')]">
          <!-- フラッシュメッセージ -->
          <div v-if="$page.props.flash.message" class="bg-blue-300 text-white p-4">
            {{ $page.props.flash.message }}
          </div>
          <!-- 新規温泉登録ボタン -->
          <section class="text-gray-600 body-font px-8 md:px-20 mb-20">
            <div v-if="user_role === 'administrator'" class="mx-auto flex pt-100 md:flex-row flex-col items-center">
              <Link class="flex ml-auto text-white border-0 my-20 py-2 px-6 focus:outline-none bg-yellow-600  hover:bg-yellow-500 rounded" as="button" :href="route('springs.create')">
                新規温泉登録
              </Link>
            </div>
          </section>
          <!-- 温泉検索日本地図 -->
          <section class="text-gray-600 body-font px-8 md:px-20 mb-20">
            <div class="mx-auto">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex flex-row p-6 md:p-20">
                <div class="basis-1/2"><img class="rounded-t-lg" src="/images/map.png" alt="日本地図" /></div>
                <div class="basis-1/2 bg-pink-300">
                  <form @submit.prevent="searchSpring">
                    <div class="p-2 w-full">
                      <div class="relative">
                        <label for="prefecture_id" class="leading-7 text-sm text-gray-600">都道府県で探す</label><br>
                        <select name="prefecture_id" v-model="form.prefecture_id"  class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10 bg-gray-100">
                          <option v-for="prefecture in prefectures" :key="prefecture.id" :value="prefecture.id">
                            {{ prefecture.name }}
                          </option>
                        </select>
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
                        <input type="radio" id="is_flowing_from_source0" name="is_flowing_from_source" v-model="form.is_flowing_from_source" value="0">
                        <label for="is_flowing_from_source0"class="ml-2 mr-4">源泉掛け流しでない</label>
                        <input type="radio" id="is_flowing_from_source1" name="is_flowing_from_source" v-model="form.is_flowing_from_source" value="1">
                        <label for="is_flowing_from_source1"class="ml-2 mr-4">源泉掛け流しである</label>
                      </div>
                    </div>
                    <div class="p-2 w-full">
                      <button class="flex mx-auto text-white bg-red-600 hover:bg-red-500 border-0 py-2 px-8 focus:outline-none rounded text-lg">検索する</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
          <!-- 温泉一覧・検索結果 -->
          <section class="text-gray-600 body-font px-8 md:px-20">
            <div v-if="springs.length === 0" class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex flex-row p-6 md:p-20 mb-4 text-xl text-gray-900">該当する温泉施設はありません</div>

            <div v-for="spring in springs" :key="spring.id" class="container mb-10 md:mb-20 mx-auto flex px-5 pt-20 sm:p-8 md:flex-row flex-col items-center bg-white shadow sm:rounded-lg">
              <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                <img v-if="spring.photo" :src="'/storage/' + spring.photo" alt="" lass="rounded-t-lg" />
                <img v-else class="rounded-t-lg" src="/images/no_image.png" alt="" />
              </div>
              <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                <span class="bg-red-900 rounded text-white font-bold text-lg p-1 mr-2">
                  {{ prefectures[spring.prefecture_id - 1].name }}　{{ spring.city }}
                </span>
                <Link :href="route('springs.show', { spring: spring.id })">
                  <h1 class="title-font sm:text-4xl text-3xl mt-4 font-medium text-blue-500">{{ spring.name }}
                  </h1>
                <p class="mb-8 leading-relaxed">{{ spring.kana }}</p>
                </Link>
                <p class="mb-4 text-xl text-gray-900">{{ spring.simple_description }}</p>
                <p class="text-gray-500 mb-3">泉質：{{ qualities[spring.quality_id - 1].name }}</p>
                <p class="text-gray-500 mb-3">源泉掛け流し：
                  <span v-if="spring.is_flowing_from_source === 0">x</span>
                  <span v-if="spring.is_flowing_from_source === 1">○</span>
                </p>
              </div>
            </div>
          </section>

      </div>
    </AuthenticatedLayout>
</template>
