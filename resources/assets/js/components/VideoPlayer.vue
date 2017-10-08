<template>
    <div class="video-container" v-if="play" @click.self="stopPlay">
        <div class="video-watching" ref="videoWrapper" v-html="link"></div>
        <div class="info">
            <h3 class="title" v-text="name"></h3>

            <div class="download">
                <div class="btn" @click="rotateShow">DOWNLOAD</div>

                <div v-if="show" class="wrapper">
                    <div class="validate video-submit-wrapper">
                        <div class="close" @click="rotateShow">x</div>

                        <div class="form-wrapper">
                            <p>网盘链接：
                                <small><a :href="download" target="_blank">百度网盘</a></small>
                            </p>
                            <p>密码：
                                <small>{{ key }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import eventHub from '../eventHub';

    export default {
        name: "videoPlayer",
        data: () => ({
            play: false,
            show: false,
            link: '',
            name: '',
            download: '',
            key: ''
        }),
        methods: {
            playVideo(video) {
                this.play = true;
                this.link = video.link;
                this.name = video.name;
                axios.get(`${apiRoot}video/download`, {params: {id: video.id}})
                    .then(response => {
                        this.download = response.data.download_link;
                        this.key = response.data.netdisk_key;
                    })
                    .catch(error => {
                        console.log(error);
                    });
                axios.patch(`${apiRoot}video/watch`, {id: video.id});
            },
            stopPlay() {
                this.play = false;
            },
            rotateShow() {
                this.show = !this.show;
            }
        },
        created() {
            eventHub.$on('video.play', video => {
                this.playVideo(video);
                this.show = false;
            })
        }
    }
</script>
