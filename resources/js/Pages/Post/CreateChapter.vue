<script setup>
import { defineProps, ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue';

const props = defineProps({
    post: Object
});

const form = useForm({
    chapter_title: '',
    image_urls: ''
});

function submit() {
    form.post(route('chapters.store', props.post.id), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
}
</script>

<template>
    <Navbar />
    <div class="max-w-[400px] w-4/5 mx-auto mt-[140px] py-4 px-4 border-2 border-white rounded-[20px] flex flex-col items-center">
        <h1 class="text-white text-center text-lg font-bold mb-3">Создание главы для<br> {{ props.post.title }}</h1>
        <form @submit.prevent="submit" class="w-full max-w-lg">
            <div class="mb-4">
                <label for="chapter_title" class="text-white text-sm font-semibold block mb-1">Название главы</label>
                <input
                    id="chapter_title"
                    v-model="form.chapter_title"
                    type="text"
                    class="w-full p-2 bg-gray-700 rounded text-white border border-gray-600 focus:outline-none focus:border-blue-500"
                />
            </div>

            <div class="mb-4">
                <label for="image_urls" class="text-white text-sm font-semibold block mb-1">URL-адреса страниц (каждый с новой строки)</label>
                <textarea
                    id="image_urls"
                    v-model="form.image_urls"
                    rows="10"
                    class="w-full p-2 bg-gray-700 rounded text-white border border-gray-600 focus:outline-none focus:border-blue-500"
                ></textarea>
            </div>

            <div class="flex flex-col items-center gap-1 w-full mt-4">
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full py-2 px-3 text-white text-base font-semibold border-2 border-white rounded-full transition-colors duration-300 hover:bg-white hover:text-[#2D2F34] disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    Создать пост
                </button>
                <a
                    :href="route('post.index', post.id)"
                    class="text-gray-400 text-xs font-semibold hover:underline"
                >
                    Отмена
                </a>
            </div>
        </form>
    </div>
</template>
