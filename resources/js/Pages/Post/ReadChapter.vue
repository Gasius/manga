<script setup>
import { defineProps, ref } from 'vue';
import Navbar from "@/Components/Navbar.vue";
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    chapter: Object,
    chapters: Array,
    images: Array
});

const currentImageIndex = ref(0);

const nextImage = () => {
    if (currentImageIndex.value < props.images.length - 1) {
        currentImageIndex.value++;
    }
};

const prevImage = () => {
    if (currentImageIndex.value > 0) {
        currentImageIndex.value--;
    }
};
</script>

<template>
    <Navbar />
    <div class="flex flex-col items-center mt-[90px] p-4 text-white">
        <h1 class="text-2xl font-bold mb-3">
            {{ chapter.chapter_title || `Глава ${chapter.chapter_number}` }}
        </h1>

        <div class="relative w-full max-w-4xl h-full flex items-center justify-center">
            <img
                v-if="images.length > 0"
                :src="images[currentImageIndex].image_path"
                :alt="`Страница ${images[currentImageIndex].page_number}`"
                class="max-w-full max-h-full object-contain"
            />

            <div @click="prevImage" class="absolute inset-y-0 left-0 w-1/2 cursor-pointer"></div>
            <div @click="nextImage" class="absolute inset-y-0 right-0 w-1/2 cursor-pointer"></div>
        </div>

        <div class="mt-4 text-md">
            Страница {{ currentImageIndex + 1 }} из {{ images.length }}
        </div>
        <div class="mt-8 text-center mx-[20px] text-white">
            <h3 class="text-2xl font-bold">Список глав</h3>
            <ul>
                <li v-for="chapter in chapters" :key="chapter.id">
                    <Link :href="`/read-chapter/${chapter.id}`" class="text-lg hover:underline">
                        Глава {{ chapter.chapter_number }}
                        <span v-if="chapter.chapter_title">: {{ chapter.chapter_title }}</span>
                    </Link>
                </li>
            </ul>
        </div>
    </div>
</template>
