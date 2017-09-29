<template>
    <div class="nav-item categories"
         @mouseover="show = true" @mouseleave="show = false">
        <span class="title">分类</span>
        <transition name="fade">
            <ul v-show="show" class="sub-menu"
                @mouseover="show = true" @mouseleave="show = false">
                <li v-for="(item, index) in categories" :key="index" class="menu-item">
                    <a :href='rootURL+"#"+item.id'>{{ item.name }}</a>
                </li>
            </ul>
        </transition>
    </div>
</template>

<script>
    export default {
        props: ['categories'],
        name: "subMenu",
        data: () => ({
            show: false,
            rootURL
        }),
    }
</script>
