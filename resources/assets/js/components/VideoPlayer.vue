<template>
    <div class="video-container" v-if="play" @click="stopPlay">
        <div class="video-watching" ref="videoWrapper" v-html="link"></div>
    </div>
</template>

<script>
    import eventHub from '../eventHub';

    export default {
        name: "videoPlayer",
        data: () => ({
            play: false,
            link: ''
        }),
        methods: {
            playVideo(video) {
                this.play = true;
                this.link = video.link;
                axios.patch(`${apiRoot}video/watch`, {id: video.id})
            },
            stopPlay() {
                this.play = false;
            }
        },
        created() {
            eventHub.$on('video.play', video => {
                this.playVideo(video);
            })
        }
    }
</script>
