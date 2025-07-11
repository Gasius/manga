<script>
import {Link, useForm} from "@inertiajs/vue3";
import Navbar from "@/Components/Navbar.vue";


export default {
    components:{
        Navbar,
        Link
    },
    props:[
        'posts'
    ],
    data(){
        return {
            deleteForm: useForm({
                id: null
            })
        }
    },
    methods: {
        deletePost(id){
            this.deleteForm.id=id;
            this.deleteForm.delete(route('posts.delete',{post: id}))
        }
    }
}

</script>

<template>
    <Navbar/>

    <div class="breadcrumbs">
        <a href="/">Main Page</a> <span>></span> Новости и анонсы
    </div>

    <div class="content">
        <div class="content-row">
            <div v-for="post in posts.data" class="content-card">
                <div class="content-card-body">
                    <button @click="deletePost(post.id)" class="action-button">Delete</button>
                    <div class="content-image"><img :src="post.image_url"></div>
                    <div class="content-name">{{ post.title }}</div>
                    <div class="content-text">{{ post.content }}</div>
                    <div class="content-meta">
                        <span class="content-author">{{ post.author_name }}</span>
                        <span class="content-time">{{ new Date(post.created_at).toLocaleString() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
img {
    object-fit: cover;
    width: 100%;
    height: 100%;
}

.breadcrumbs {
    /* Чтобы хлебные крошки появились после шапки, нужно учесть высоту шапки */
    margin-top: 130px; /* 80px (высота шапки) + 20px (дополнительный отступ) */
    margin-left: 60px; /* Отступ слева, как у body margin ранее */
    font-size: 0.9em;
    color: #bbb;
    z-index: 500; /* Ниже шапки, выше контента */
    position: relative; /* Чтобы z-index работал */
}
.breadcrumbs a {
    color: #bbb;
    text-decoration: none;
}

.breadcrumbs a:hover {
    text-decoration: underline;
}

.breadcrumbs span {
    margin: 0 5px;
}




.content {
    margin-top: 15px; /* Отступ от хлебных крошек */
    margin-bottom: 30px; /* Отступ снизу страницы, как у body margin ранее */
    margin-left: 0;
    margin-right: 0;
    display: flex;
    flex-direction: column;
    align-items: center; /* Центрирует ряды по горизонтали */
}

.content-row {
    display: flex;
    justify-content: center; /* Центрирует карточки внутри ряда */
    gap: 50px; /* Горизонтальный отступ между постами */
    margin-bottom: 15px; /* Вертикальный отступ между рядами */
    width: 100%;
    max-width: 1200px; /* Пример: Максимальная ширина для контента */
    padding: 0 20px; /* Небольшой горизонтальный паддинг, чтобы посты не прилипали к краям экрана */
    box-sizing: border-box;
}

/* Удаляем margin-bottom у последнего ряда, если не нужно */
.content-row:last-child {
    margin-bottom: 0;
}

.content-card {
    flex: 1;
    min-width: 200px;
    max-width: calc((100% - 3 * 50px) / 4); /* 4 поста в ряду, 3 отступа по 50px */
    position: relative; /* Важно для позиционирования внутреннего контента */
    border: 1px solid #4c4c4c;
    border-radius: 10px; /* Закругление углов */
    background-color: transparent; /* Прозрачный фон */
    overflow: hidden; /* Обрезаем всё, что выходит за границы */
    box-sizing: border-box; /* Учитываем паддинг в общей ширине */

    /* Добавленные стили для соотношения сторон 1:1.2 (ширина к высоте) */
    height: 0; /* Обнуляем высоту, чтобы она зависела от padding */
    padding-bottom: 240px; /* 120% от ширины родителя (т.е. самой карточки) = 1.2 * ширина */

    /* Внутреннее содержимое карточки будет абсолютно позиционировано */
    display: block; /* Сбрасываем flexbox для корневого элемента, т.к. внутренний контент будет абсолютно позиционирован */
}

.content-card > div { /* Применяем ко всем прямым потомкам content-card (изображению, названию, тексту, мета) */
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* Добавляем внутренний отступ для контента */
    padding: 15px; /* Внутренние отступы для содержимого поста */
    box-sizing: border-box;
    display: flex; /* Возвращаем flexbox для правильного расположения внутреннего контента */
    flex-direction: column;
}


.content-image {
    position: absolute; /* Остается абсолютным, но теперь внутри общего абсолютного слоя */
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('https://via.placeholder.com/400x480/CCCCCC/FFFFFF?text=Car+Image'); /* Изменен размер изображения */
    background-size: cover;
    background-position: center;
    padding: 0; /* Изображению не нужен паддинг */
}

.content-name {
    color: #fff;
    font-size: 1.2em;
    font-weight: bold;
    margin-bottom: 100px;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
    z-index: 1000;

}

.content-text {
    color: #f0f0f0;
    font-size: 0.9em;
    line-height: 1.4;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    margin-bottom: 15px;
    mask-image: linear-gradient(to bottom, black 60%, transparent 100%);
    -webkit-mask-image: linear-gradient(to bottom, black 60%, transparent 100%);
}


.content-meta {
    position: relative; /* Они будут относительны к своему абсолютному родителю (div внутри .content-card) */
    z-index: 2; /* Убедимся, что они поверх изображения */
    /* Здесь можно сбросить top, left, width, height, т.к. они наследуются от общего родителя */
    width: auto;
    height: auto;
    top: auto;
    left: auto;
}
.content-meta {
    margin-top: auto; /* Прижимаем к низу карточки */
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.8em;
    color: #bbb;
}
.content-author {
    font-weight: bold;
}
.content-time {
    z-index: 1000;
}
/* Адаптивность для разных экранов */
@media (max-width: 1024px) {
    .content-card {
        max-width: calc((100% - 2 * 50px) / 3); /* 3 поста в ряду */
    }
}

@media (max-width: 768px) {
    .content-card {
        max-width: calc((100% - 1 * 50px) / 2); /* 2 поста в ряду */
    }
}

@media (max-width: 480px) {
    .content-row {
        flex-direction: column; /* Посты будут располагаться вертикально */
        gap: 15px; /* Вертикальный отступ между карточками */
    }
    .content-card {
        max-width: 100%; /* На всю ширину */
        margin-right: 0 !important; /* Убираем горизонтальный отступ */
    }
}
.action-button {
    position: relative;
    z-index: 1001;
}
</style>
