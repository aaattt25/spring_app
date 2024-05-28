<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
  // mustVerifyEmail: Boolean,
  // status: String,
  user_name: String,
  user_email: String,
  user_role: String,
});
</script>

<template>
  <Head title="Profile" />

  <AuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>
    </template>
    <div class="py-12 box">
      <div class="m-10 w-80 max-w-96">
        <div class="rounded-lg border bg-white px-4 pt-8 pb-10 shadow-lg">
          <div class="relative mx-auto w-36 rounded-full">
            <img class="mx-auto h-auto w-full rounded-full" src="/images/avatar.png" alt="アバター" />
          </div>
          <h1 class="my-1 text-center text-xl font-bold leading-8 text-gray-900">{{ user_name }}</h1>
          <ul class="mt-3 divide-y rounded bg-gray-100 py-2 px-3 text-gray-600 shadow-sm hover:text-gray-700 hover:shadow">
            <li class="flex items-center py-3 text-sm">
              <span>役割</span>
              <span class="ml-auto">{{ user_role }}</span>
            </li>
            <li class="flex items-center py-3 text-sm">
              <span>email</span>
              <span class="ml-auto">{{ user_email }}</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>
.box {
  display: flex;
  justify-content: center;
}
</style>
