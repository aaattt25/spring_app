<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
  springs: Array,
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
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                      <div v-if="$page.props.flash.message" class="bg-blue-300 text-white p-4">{{ $page.props.flash.message }}</div>

                      <section class="text-gray-600 body-font">
                        <div class="flex pl-4 my-4 lg:w-2/3 w-full mx-auto">
                            <Link class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded" as="button" :href="route('springs.create')">温泉登録</Link>
                        </div>
                        <div class="container px-5 py-24 mx-auto">
                          <div v-for="spring in springs" :key="spring.id" class="flex flex-wrap -m-4">
                            <div class="p-4">
                              <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                                <div class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4">

                                  <img v-if="spring.photo === null" src="/images/no_image.png">
                                  <img v-else src="/images/no_image.png">
                                </div>
                                <div class="flex-grow sm:pl-8">
                                  <p>{{ prefectures[spring.prefecture_id - 1].name }}　{{ spring.city }}</p>
                                  <Link :href="route('springs.show', { spring: spring.id })">
                                    <h2 class="title-font font-medium text-lg text-blue-400">{{ spring.name }}</h2>
                                  </Link>
                                  <h3 class="text-gray-500 mb-3">泉質：{{ qualities[spring.quality_id - 1].name }}</h3>
                                  <p class="mb-4">{{ spring.simple_description }}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
