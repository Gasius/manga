<script>
import {Link} from "@inertiajs/vue3";
export default {
    components:{
        Link
    }
}
</script>

<template>
    <div class="header">
        <b><h1>Manga.com</h1></b>
        <div class="search">

            <div class="search-icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.9399 18.5624L13.4474 12.0699C14.4549 10.7675 14.9999 9.17496 14.9999 7.49997C14.9999 5.49498 14.2174 3.61498 12.8024 2.19749C11.3874 0.779996 9.50246 0 7.49997 0C5.49748 0 3.61248 0.782496 2.19749 2.19749C0.779997 3.61248 0 5.49498 0 7.49997C0 9.50246 0.782496 11.3875 2.19749 12.8024C3.61248 14.2199 5.49498 14.9999 7.49997 14.9999C9.17496 14.9999 10.765 14.4549 12.0674 13.4499L18.5599 19.9399C18.579 19.959 18.6016 19.9741 18.6264 19.9844C18.6513 19.9947 18.678 20 18.7049 20C18.7318 20 18.7585 19.9947 18.7834 19.9844C18.8083 19.9741 18.8309 19.959 18.8499 19.9399L19.9399 18.8524C19.959 18.8334 19.9741 18.8108 19.9844 18.7859C19.9947 18.761 20 18.7343 20 18.7074C20 18.6805 19.9947 18.6538 19.9844 18.6289C19.9741 18.6041 19.959 18.5815 19.9399 18.5624ZM11.4599 11.46C10.4 12.5174 8.99496 13.0999 7.49997 13.0999C6.00497 13.0999 4.59998 12.5174 3.53998 11.46C2.48249 10.4 1.89999 8.99496 1.89999 7.49997C1.89999 6.00497 2.48249 4.59748 3.53998 3.53998C4.59998 2.48249 6.00497 1.89999 7.49997 1.89999C8.99496 1.89999 10.4025 2.47999 11.4599 3.53998C12.5174 4.59998 13.0999 6.00497 13.0999 7.49997C13.0999 8.99496 12.5174 10.4025 11.4599 11.46Z" fill="white"/>
                </svg>
            </div>

            <div class="search-input">
                <input type="text" placeholder="Поиск по манге" class="input">
            </div>

        </div>

        <div class="bottoms">
            <div  class="nav-icon">
                <Link :href="route ('main.post.create')" class="create-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="white" height="100" width="100" version="1.1" id="Layer_1" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                    <path d="M306,192h-48v-48c0-4.4-3.6-8-8-8s-8,3.6-8,8v48h-48c-4.4,0-8,3.6-8,8s3.6,8,8,8h48v48c0,4.4,3.6,8,8,8s8-3.6,8-8v-48h48  c4.4,0,8-3.6,8-8S310.4,192,306,192z"/>
                    </svg>
                </Link>
            </div>
        </div>
    </div>
    <div class="breadcrumbs">
        <a href="/">Main Page</a> <span>></span>Рекомендации
    </div>
</template>

<style scoped>
.nav-icon {
    background-color: transparent;
    border: 1px solid #4c4c4c;
    border-radius: 50%;
    width: 70px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.bottoms{
    display: flex;
    gap: 35px;
    position: relative;
    top: auto;
    right: auto;
    background: transparent;
    padding: 0;
    display: flex;
}
.search-icon {
    margin: 20px;
    height: 20px;
}
.search {
    width: 460px;
    height: 60px;
    display: flex;
    align-items: center;
    position: relative;
    border: 2px solid white;
    border-radius: 30px;
    background-color: transparent;
    margin-right: auto;
    margin-left: 30px;
}
.input {
    width: 261px;
    height: 30px;
    color: white;
}
.create-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
}
.header {
    color: white;
    display: flex;
    position: fixed;
    justify-content: space-between;
    align-items: center;
    padding: 15px 0px;
    top: 0;
    left: 60px;
    right: 60px;
    z-index: 1000;
    border-bottom: 3px solid #4c4c4c;
}
.breadcrumbs {
    /* Чтобы хлебные крошки появились после шапки, нужно учесть высоту шапки */
    margin-top: 130px; /* 80px (высота шапки) + 20px (дополнительный отступ) */
    margin-left: 60px; /* Отступ слева, как у body margin ранее */
    font-size: 0.9em;
    color: #bbb;
    z-index: 500; /* Ниже шапки, выше контента */
    position: relative; /* Чтобы z-index работал */ /* Чтобы z-index работал */
}.breadcrumbs a {
     color: #bbb;
     text-decoration: none;
 }

.breadcrumbs a:hover {
    text-decoration: underline;
}

.breadcrumbs span {
    margin: 0 5px;
}
</style>
