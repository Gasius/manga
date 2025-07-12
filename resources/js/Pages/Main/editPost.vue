<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import Navbar from "@/Components/Navbar.vue";

const props = defineProps({
    post: Object
})
const form = useForm({
    title: props.post.title,
    content: props.post.content,
    author_name: props.post.author_name,
    image_url: props.post.image_url,
});

const submit = () => {
    form.put(route('posts.update', {post: props.post.id}), {
        onSuccess: () => form.reset(),
    });
};
</script>

<template>

    <Navbar/>
    <div class="form-container">
        <h1 class="form-title">Измените свой пост</h1>

        <form @submit.prevent="submit" class="submit-form">
            <!-- Поле: Заголовок -->
            <div>
                <label for="title" class="title">Заголовок</label>
                <input
                    v-model="form.title"
                    id="title"
                    type="text"
                    class="custom-input"
                >
                <div v-if="form.errors.title" class="title-error">
                    {{ form.errors.title }}
                </div>
            </div>

            <!-- Поле: Содержание -->
            <div>
                <label for="content" class="content">Содержание</label>
                <textarea
                    v-model="form.content"
                    id="content"
                    rows="4"
                    class="custom-input custom-textarea"
                ></textarea>
                <div v-if="form.errors.content" class="content-error">
                    {{ form.errors.content }}
                </div>
            </div>

            <!-- Поле: Автор -->
            <div>
                <label for="author_name" class="author-name">Автор</label>
                <input
                    v-model="form.author_name"
                    id="author_name"
                    type="text"
                    class="custom-input"
                >
                <div v-if="form.errors.author_name" class="author-error">
                    {{ form.errors.author_name }}
                </div>
            </div>

            <!-- Поле: URL изображения -->
            <div>
                <label for="image_url" class="image">URL изображения (опционально)</label>
                <input
                    v-model="form.image_url"
                    id="image_url"
                    type="text"
                    class="custom-input"
                >
                <div v-if="form.errors.image_url" class="image-error">
                    {{ form.errors.image_url }}
                </div>
            </div>

            <!-- Кнопки -->
            <div class="button-group">
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="send-button"
                >
                    Сохранить
                </button>
                <a
                    :href="route('main.index')"
                    class="cancel-bottom"
                >
                    Отмена
                </a>
            </div>
        </form>
    </div>
</template>

<style>
.form-container {
    max-width: 600px;
    width: 90%;
    margin: 40px auto 50px;
    padding: 30px;
    background: transparent;
    border: 2px solid white;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;

}

.form-title {
    text-align: center;
    font-size: 1.8rem;
    margin-bottom: 1.5rem;
    color: #ffffff;
}

.custom-input {
    width: 100%;
    padding: 14px 20px;
    border: 2px solid #4e4e4e;
    border-radius: 50px;
    background: transparent;
    transition: all 0.3s ease;
    font-size: 1rem;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.03);
    color: white;
}

.custom-input:focus {
    outline: none;
    border-color: #a0aec0;
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(164, 202, 254, 0.45);
    color: black;
}

.custom-textarea {
    border-radius: 25px;
    min-height: 120px;
    resize: vertical;
}
label {
    color: white;
    margin: 10px 0;
    font-size: 25px;
    font-weight: 600;
}
.send-button {
    border: 2px solid #e2e8f0;
    border-radius: 50px;
    background-color: transparent;
    font-size: 30px;
    margin-top: 20px;
    width: 100%;
    padding: 10px;
    color: white;
}
.button-group {
    display: flex;
    flex-direction: column;
    gap: 12px;
    align-items: center;
    width: 100%;
}
form {
    width: 100%;
}
.cancel-bottom {
    color: #4a5568;
    font-size: 24px;
}

</style>
