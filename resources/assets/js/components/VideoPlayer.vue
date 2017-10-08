<template>
    <div class="video-container" v-if="play" @click="stopPlay">
        <div class="video-watching" ref="videoWrapper" v-html="link"></div>
        <div class="info">
            <h3 class="title" v-text="name"></h3>


        </div>
    </div>
</template>

<script>
    import eventHub from '../eventHub';

    export default {
        name: "videoPlayer",
        data: () => ({
            play: false,
            link: '',
            name: ''
        }),
        methods: {
            playVideo(video) {
                this.play = true;
                this.link = video.link;
                this.name = video.name;
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
