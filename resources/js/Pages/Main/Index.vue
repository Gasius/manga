<script setup>
import {Link, router} from "@inertiajs/vue3";
import Navbar from "@/Components/Navbar.vue";

defineProps({
    posts: Object,
});

const indexPost = (id) => {
    router.visit(route('post.index', { post: id }));
};
</script>

<template>
    <Navbar />

    <div class="mt-[10%] mx-auto px-4 max-w-7xl">
        <div class="grid mx-[15%] grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            <div
                v-for="post in posts.data"
                :key="post.id"
                @click="indexPost(post.id)"
                class="brightness-[0.8] relative w-full p-4 aspect-[1/1.2] overflow-hidden rounded-xl bg-transparent border border-gray-700 shadow-lg"
            >
                <img
                    :src="post.image_url"
                    alt="Post Image"
                    class="absolute inset-0 w-full h-full object-cover object-top"
                />
            </div>
        </div>
    </div>
</template>
