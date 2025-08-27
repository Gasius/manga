<script setup>
import { defineProps } from 'vue';
import Navbar from "@/Components/Navbar.vue";
import { Link } from '@inertiajs/vue3'; // Импортируем Link

const props = defineProps({
    post: Object,
    chapters: Array
});
</script>

<template>
    <Navbar/>
    <div class="flex mt-[110px] flex-raw">
        <img
            :src="post.image_url"
            alt="Post Image"
            class="w-[300px] mx-[20px] flex"
        />
        <div class="flex flex-col text-white">
        <h1 class="flex  font-bold text-5xl">{{ post.title }}</h1>
        <h2 class="text-3xl">{{ post.author_name }}</h2>
        <h2 class=" text-gray-400 text-xl">{{ post.content }}</h2>
        </div>
    </div>
    <div class="mt-8 mx-[20px] text-white">
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
</template>
