<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import Navbar from "@/Components/Navbar.vue";

const form = useForm({
    title: '',
    content: '',
    author_name: '',
    image_url: '',
    genres: '',
});

const submit = () => {
    form.post(route('posts.store'), {
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <Navbar/>

    <div class="max-w-[400px] w-4/5 mx-auto mt-[140px] py-4 px-4 border-2 border-white rounded-[20px] flex flex-col items-center">
        <h1 class="text-white text-lg font-bold mb-3">Создать новый пост</h1>

        <form @submit.prevent="submit" class="w-full">
            <div>
                <label for="title" class="text-white text-sm font-semibold block mb-1">Заголовок</label>
                <input
                    v-model="form.title"
                    id="title"
                    type="text"
                    class="px-3 py-1 border-2 bg-white border-gray-600 rounded-full text-white placeholder-gray-500 focus:border-gray-400 focus:bg-white focus:text-gray-900"
                >
                <div v-if="form.errors.title" class="text-red-500 text-xs mt-1">
                    {{ form.errors.title }}
                </div>
            </div>

            <div>
                <label for="content" class="text-white text-sm font-semibold block mb-1">Содержание</label>
                <textarea
                    v-model="form.content"
                    id="content"
                    rows="4"
                    class="w-full px-3 py-1 border-2 border-gray-600 rounded-2xl text-white placeholder-gray-400 focus:outline-none focus:border-gray-400 focus:bg-white focus:text-gray-900 transition-colors duration-300 min-h-[60px] resize-y [box-shadow:inset_0_2px_4px_rgba(0,0,0,0.03)]"
                ></textarea>
                <div v-if="form.errors.content" class="text-red-500 text-xs mt-1">
                    {{ form.errors.content }}
                </div>
            </div>

            <div>
                <label for="author_name" class="text-white text-sm font-semibold block mb-1">Автор</label>
                <input
                    v-model="form.author_name"
                    id="author_name"
                    type="text"
                    class="w-full px-3 py-1 border-2 border-gray-600 rounded-full bg-transparent text-white placeholder-gray-400 focus:outline-none focus:border-gray-400 focus:bg-white focus:text-gray-900 transition-colors duration-300 [box-shadow:inset_0_2px_4px_rgba(0,0,0,0.03)]"
                >
                <div v-if="form.errors.author_name" class="text-red-500 text-xs mt-1">
                    {{ form.errors.author_name }}
                </div>
            </div>

            <div>
                <label for="image_url" class="text-white text-sm font-semibold block mb-1">URL изображения (опционально)</label>
                <input
                    v-model="form.image_url"
                    id="image_url"
                    type="text"
                    class="w-full px-3 py-1 border-2 border-gray-600 rounded-full bg-transparent text-white placeholder-gray-400 focus:outline-none focus:border-gray-400 focus:bg-white focus:text-gray-900 transition-colors duration-300 [box-shadow:inset_0_2px_4px_rgba(0,0,0,0.03)]"
                >
                <div v-if="form.errors.image_url" class="text-red-500 text-xs mt-1">
                    {{ form.errors.image_url }}
                </div>
            </div>

            <div>
                <label for="genres" class="text-white text-sm font-semibold block mb-1">Жанры (через запятую):</label>
                <input
                    id="genres"
                    v-model="form.genres"
                    type="text"
                    placeholder="фантастика, драма, приключения"
                    class="w-full px-3 py-1 border-2 border-gray-600 rounded-full bg-transparent text-white placeholder-gray-400 focus:outline-none focus:border-gray-400 focus:bg-white focus:text-gray-900 transition-colors duration-300 [box-shadow:inset_0_2px_4px_rgba(0,0,0,0.03)]"
                />
                <div v-if="form.errors.genres" class="text-red-500 text-xs mt-1">
                    {{ form.errors.genres }}
                </div>
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
                    :href="route('main.index')"
                    class="text-gray-400 text-xs font-semibold hover:underline"
                >
                    Отмена
                </a>
            </div>
        </form>
    </div>
</template>
