<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({
  spring: Object
})

const form = reactive({
// const form = useForm({
  id: props.spring.id,
  name: props.spring.name,
  // kana: props.spring.kana,
  // tel: props.spring.tel,
  // url: props.spring.url,
  // postcode: props.spring.postcode,
  // region_id: props.spring.region_id,
  // prefecture_id: props.spring.prefecture_id,
  // city: props.spring.city,
  // address: props.spring.address,
  // quality_id: props.spring.quality_id,
  photo: props.spring.photo,
  // simple_description: props.spring.simple_description,
  // detail_description: props.spring.detail_description,
  // has_restaurant: props.spring.has_restaurant,
  // can_drop_by: props.spring.can_drop_by,
  // is_inn: props.spring.is_inn,
  // fee: props.spring.fee,
  // is_flowing_from_source: props.spring.is_flowing_from_source,
  // has_bedrock_bath: props.spring.has_bedrock_bath,
  // has_sauna: props.spring.has_sauna,
  // has_parking: props.spring.has_parking,
  // business_hours: props.spring.business_hours,
  // holiday: props.spring.holiday,
  // efficacy: props.spring.efficacy,
  // has_water_drawing_place: props.spring.has_water_drawing_place,
  // water_drawing_fee: props.spring.water_drawing_fee
})
const fileSelected = (event) => {
  console.log(event)
  console.log(event.target.files[0])
  form.photo = event.target.files[0];
  console.log('form.photo')
  console.log(form.photo)
}

const updateSpring = (id) => {
  Inertia.put(route('springs.update', {spring: id}), form)
}
</script>

<template>
    <Head title="温泉編集" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">温泉登録</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                      <section class="text-gray-600 body-font relative">
                        <form @submit.prevent="updateSpring(form.id)" enctype="multipart/form-data">
                          <div class="container px-5 py-8 mx-auto">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                              <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">温泉名</label>
                                    <input type="text" id="name" name="name" v-model="form.name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  </div>
                                </div>

                                <img v-if="spring.photo === null" class="rounded-t-lg " src="/images/no_image.png" alt="" />
                                <img v-else :src="'/storage/' + spring.photo" alt="" lass="rounded-t-lg" />


                                <input type="file" @input="form.photo = $event.target.files[0]" />
                                <div class="p-2 w-full">
                                  <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
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
