<template>
    <div class="video-item" @click="playVideo">
        <div class="title">{{ video.name }}</div>
        <img :src="video.image" :alt="video.name">
        <div v-if="admin === 'true'" class="wrapper">
            <form :action="rootURL + 'video/' + video.id" method="POST">
                <input type="hidden" name="_token"
                       :value="csrfToken">
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn delete">删除</button>
            </form>
            <a :href="rootURL + 'video/' + video.id + '/edit'" class="btn edit">编辑</a>
        </div>
    </div>
</template>

<script>
    import eventHub from '../eventHub';

    export default {
        props: ['video', 'admin'],
        name: "videoItem",
        data: () => ({
            rootURL,
            csrfToken
        }),
        methods: {
            playVideo() {
                eventHub.$emit('video.play', {
                    id: this.video.id,
                    link: this.video.link,
                    name: this.video.name
                });
            }
        }
    }
</script>

<style lang="sass" scoped>
    .wrapper
        position: absolute
        top: 0
        right: 0
        opacity: 0
        transition: opacity 0.3s ease-in-out
        .btn
            display: flex
            font-size: 12px
            width: 38px
            height: 30px
            color: rgb(7, 17, 27)
            border: none
            border-radius: 3px
            justify-content: center
            align-items: center
            background: rgba(160, 160, 160, 0.4)
            &.delete
                background: rgba(173, 24, 24, 0.4)
            &.edit
                margin-top: 10px
    
    .video-item:hover
        .wrapper
            opacity: 1
</style>
