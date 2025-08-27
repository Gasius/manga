<script setup>
import { defineProps } from 'vue';
import Navbar from "@/Components/Navbar.vue";
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    chapter: Object,
    images: Array
});
</script>

<template>
    <Navbar />
    <div class="flex flex-col items-center mt-[110px] p-4 text-white">
        <h1 class="text-4xl font-bold mb-4">
            {{ chapter.chapter_title || `Глава ${chapter.chapter_number}` }}
        </h1>

        <div v-for="image in images" :key="image.id" class="w-full max-w-2xl mb-4">
            <img :src="image.image_path" :alt="`Страница ${image.page_number}`" class="w-full h-auto" />
        </div>
    </div>
</template>
