<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </template>

    <div class="bg-[url('/images/background.jpg')]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex flex-row">
            <div class="p-10 md:py-20 md:pl-20 basis-1/2"><img class="rounded-t-lg" src="/images/map.png" alt="日本地図" /></div>
            <div class="basis-1/2 bg-pink-300">フォーム</div>
          </div>

        </div>
    </div>
  </AuthenticatedLayout>
</template>
