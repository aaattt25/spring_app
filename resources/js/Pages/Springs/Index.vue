<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
  springs: Array,
  user_role: String,
  qualities: Array,
  prefectures: Array
})
</script>

<template>
    <Head title="温泉一覧" />

    <AuthenticatedLayout>
      <template #header>
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">温泉一覧</h2>
      </template>

      <div class="py-12">
        <div v-if="$page.props.flash.message" class="bg-blue-300 text-white p-4">{{ $page.props.flash.message }}</div>

        <section class="text-gray-600 body-font">

          <div class="mx-auto flex px-16 pt-100 md:flex-row flex-col items-center">
            <Link class="flex ml-auto text-white border-0 py-2 px-6 focus:outline-none bg-yellow-600  hover:bg-yellow-500 rounded" as="button" :href="route('springs.create')">新規温泉登録</Link>
          </div>

          <div v-for="spring in springs" :key="spring.id" class="container mx-auto flex px-5 pt-20 md:flex-row flex-col items-center">
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
