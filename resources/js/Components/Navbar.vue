<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="fixed w-full z-50 top-0 bg-[#2D2F34] flex items-center justify-between p-5 border-b-2 border-gray-700">

        <div class="flex flex-raw items-center gap-10">
            <b><h1 class="text-white text-xl font-bold">Manga.com</h1></b>

                <div class="flex items-center border-2 border-white rounded-full h-12">
                    <div class="flex p-2">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.9399 18.5624L13.4474 12.0699C14.4549 10.7675 14.9999 9.17496 14.9999 7.49997C14.9999 5.49498 14.2174 3.61498 12.8024 2.19749C11.3874 0.779996 9.50246 0 7.49997 0C5.49748 0 3.61248 0.782496 2.19749 2.19749C0.779997 3.61248 0 5.49498 0 7.49997C0 9.50246 0.782496 11.3875 2.19749 12.8024C3.61248 14.2199 5.49498 14.9999 7.49997 14.9999C9.17496 14.9999 10.765 14.4549 12.0674 13.4499L18.5599 19.9399C18.579 19.959 18.6016 19.9741 18.6264 19.9844C18.6513 19.9947 18.678 20 18.7049 20C18.7318 20 18.7585 19.9947 18.7834 19.9844C18.8083 19.9741 18.8309 19.959 18.8499 19.9399L19.9399 18.8524C19.959 18.8334 19.9741 18.8108 19.9844 18.7859C19.9947 18.761 20 18.7343 20 18.7074C20 18.6805 19.9947 18.6538 19.9844 18.6289C19.9741 18.6041 19.959 18.5815 19.9399 18.5624ZM11.4599 11.46C10.4 12.5174 8.99496 13.0999 7.49997 13.0999C6.00497 13.0999 4.59998 12.5174 3.53998 11.46C2.48249 10.4 1.89999 8.99496 1.89999 7.49997C1.89999 6.00497 2.48249 4.59748 3.53998 3.53998C4.59998 2.48249 6.00497 1.89999 7.49997 1.89999C8.99496 1.89999 10.4025 2.47999 11.4599 3.53998C12.5174 4.59998 13.0999 6.00497 13.0999 7.49997C13.0999 8.99496 12.5174 10.4025 11.4599 11.46Z" fill="white"/>
                        </svg>
                    </div>
                    <input type="text" placeholder="Поиск по манге" class="flex-grow bg-transparent text-white placeholder-gray-400 focus:outline-none pr-4">
                </div>
            </div>

        <div>
            <Link :href="route('main.post.create')" class="flex items-center justify-center w-12 h-12 border border-gray-700 rounded-full hover:bg-gray-700 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="white" height="50" width="100" version="1.1" id="Layer_1" viewBox="0 -42 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                    <path d="M306,192h-48v-48c0-4.4-3.6-8-8-8s-8,3.6-8,8v48h-48c-4.4,0-8,3.6-8,8s3.6,8,8,8h48v48c0,4.4,3.6,8,8,8s8-3.6,8-8v-48h48  c4.4,0,8-3.6,8-8S310.4,192,306,192z"/>
                </svg>
            </Link>
        </div>
    </div>
</template>
