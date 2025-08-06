<script>
import {Link, useForm} from "@inertiajs/vue3";
import Navbar from "@/Components/Navbar.vue";
import editPost from "@/Pages/Main/editPost.vue";


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
        },
        editPost(id) {
            this.$inertia.visit(route('posts.edit',{post: id}))
        }
    }
}

</script>

<template>
    <Navbar/>

    <div class="content">
        <div class="content-row">
            <div v-for="post in posts.data" class="content-card">
                <div class="content-card-body">
                    <button @click="deletePost(post.id)" class="action-button">Delete</button>
                    <button @click="editPost(post.id)" class="edit-button">Edit</button>
                    <div class="content-image"><img :src="post.image_url"></div>
                    <div class="content-name">{{ post.title }}</div>
                    <div class="button-group">
                        <button @click="editPost(post.id)" class="action-button edit-button">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="28" viewBox="0,0,256,256">
                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M18.41406,2c-0.256,0 -0.51203,0.09797 -0.70703,0.29297l-2,2l-1.41406,1.41406l-11.29297,11.29297v4h4l14.70703,-14.70703c0.391,-0.391 0.391,-1.02406 0,-1.41406l-2.58594,-2.58594c-0.195,-0.195 -0.45103,-0.29297 -0.70703,-0.29297zM18.41406,4.41406l1.17188,1.17188l-1.29297,1.29297l-1.17187,-1.17187zM15.70703,7.12109l1.17188,1.17188l-10.70703,10.70703h-1.17187v-1.17187z"></path></g></g>
                            </svg> </button>
                        <button @click="deletePost(post.id)" class="action-button delete-button">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="28" viewBox="0,0,256,256">
                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M12,2c-5.511,0 -10,4.489 -10,10c0,5.511 4.489,10 10,10c5.511,0 10,-4.489 10,-10c0,-5.511 -4.489,-10 -10,-10zM12,4c4.43012,0 8,3.56988 8,8c0,4.43012 -3.56988,8 -8,8c-4.43012,0 -8,-3.56988 -8,-8c0,-4.43012 3.56988,-8 8,-8zM8.70703,7.29297l-1.41406,1.41406l3.29297,3.29297l-3.29297,3.29297l1.41406,1.41406l3.29297,-3.29297l3.29297,3.29297l1.41406,-1.41406l-3.29297,-3.29297l3.29297,-3.29297l-1.41406,-1.41406l-3.29297,3.29297z"></path></g></g>
                            </svg> </button>
                    </div>
                    <div class="content-meta">
                        <span class="content-author">{{ post.author_name }}</span>
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
    position: absolute;
    top: 0;
    left: 0;
    /* Добавляем или изменяем эту строку */
    object-position: top; /* Гарантирует, что верхний край изображения всегда виден */
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
    position: absolute;
    top: 10px;
    color: #fff;
    font-size: 1.2em;
    font-weight: bold;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
    z-index: 1000;

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
.button-group {
    width: 40px;
    position: absolute;
    bottom: 10px; /* Отступ от нижнего края карточки */
    right: 10px; /* Отступ от правого края карточки */
    display: flex;
    gap: 8px; /* Отступ между кнопками */
    z-index: 3; /* Кнопки должны быть поверх всего */
}

.action-button {
    width: 40px; /* Ширина кнопки */
    height: 40px; /* Высота кнопки */
    border-radius: 50%; /* Делаем кнопку круглой */
    border: none;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    font-size: 1em; /* Размер иконки/текста внутри кнопки */
    color: white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    transition: background-color 0.2s ease;
}

.edit-button {
    background-color: #007bff; /* Синий цвет для редактирования */
}

.edit-button:hover {
    background-color: #0056b3;
}

.delete-button {
    background-color: #dc3545; /* Красный цвет для удаления */
}

.delete-button:hover {
    background-color: #bd2130;
}
</style>
