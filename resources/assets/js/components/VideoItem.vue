<template>
    <div class="video-item" @click="playVideo">
        <div class="title">{{ video.name }}</div>
        <img :src="video.image" :alt="video.name">
    </div>
</template>

<script>
    import eventHub from '../eventHub';

    export default {
        props: ['video'],
        name: "videoItem",
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
