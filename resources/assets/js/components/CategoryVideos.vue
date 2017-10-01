<template>
    <div :class="type">
        <div class="header">
            <h2 class="title">{{ type.toUpperCase() }}</h2>
            <div class="pagination">
                <div class="prev" @click="prevPage">
                    <img src="/images/icon/icon-arrow-left.png" alt="arrow left">
                </div>
                <div class="next" @click="nextPage">
                    <img src="/images/icon/icon-arrow-right.png" alt="arrow right">
                </div>
            </div>
        </div>
        <div v-if="videoList.length > 0" class="content" ref="videosWrapper">
            <video-item v-for="(item, index) in videoList" :key="index"
                        :video="item"></video-item>
        </div>
        <div v-if="videoList.length >= 12" class="header">
            <h2 class="title">{{ type.toUpperCase() }}</h2>
            <div class="pagination">
                <div class="prev" @click="prevPage">
                    <img src="/images/icon/icon-arrow-left.png" alt="arrow left">
                </div>
                <div class="next" @click="nextPage">
                    <img src="/images/icon/icon-arrow-right.png" alt="arrow right">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import videoItem from './VideoItem.vue'
    import eventHub from '../eventHub'

    export default {
        name: "categoryVideos",
        data: () => ({
            videoList: [],
            page: 1,
            lastPage: null,
            typeId: null,
            type: undefined,
            show: true
        }),
        methods: {
            getVideos() {
                axios.get(`${apiRoot}videos/category`, {
                    params: {
                        id: this.typeId,
                        page: this.page
                    }
                })
                    .then(response => {
                        const videoData = response.data.videos;
                        this.type = response.data.type;

                        if (this.lastPage === null) {
                            this.lastPage = videoData.last_page;
                        }

                        this.videoList = videoData.data;
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            prevPage() {
                this.page === 1 ? alert('欸？到头啦…') : this.page--;
                this.getVideos();
            },
            nextPage() {
                if (this.lastPage !== null && this.page === this.lastPage) {
                    alert('没有更多视频了呢');
                    return;
                }

                this.page++;
                this.getVideos();
            }
        },
        created() {
            const url = location.href;
            this.id = url.split('#')[1];
            eventHub.$on('hashShow', data => {
                this.typeId = data.id;
                this.show = !data.show;
                if (this.show) {
                    this.getVideos();
                }
            })
        },
        components: {
            videoItem
        }
    }
</script>
