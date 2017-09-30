<template>
    <div>
        <div class="header">
            <div class="pagination">
                <div class="prev" @click="prevPage">
                    <img src="/images/icon/icon-arrow-left.png" alt="arrow left">
                </div>
                <div class="next" @click="nextPage">
                    <img src="/images/icon/icon-arrow-right.png" alt="arrow right">
                </div>
            </div>
        </div>
        <div class="content">
            <video-item v-for="(item, index) in videoList" :key="index"
                        :video="item"></video-item>
        </div>
    </div>
</template>

<script>
    import videoItem from './VideoItem.vue'

    export default {
        name: "searchVideos",
        props: ['query'],
        data: () => ({
            videoList: [],
            page: 1,
            lastPage: null
        }),
        methods: {
            searchVideo() {
                axios.get(`${apiRoot}video`, {params: {video: this.query}})
                    .then(response => {
                        if (this.lastPage === null) {
                            this.lastPage = response.data.last_page;
                        }

                        this.videoList = response.data.data;
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            prevPage() {
                this.page === 1 ? alert('欸？到头啦…') : this.page--;
                this.searchVideo();
            },
            nextPage() {
                if (this.lastPage !== null && this.page === this.lastPage) {
                    alert('没有更多视频了呢');
                    return;
                }

                this.page++;
                this.searchVideo();
            },
        },
        created() {
            this.searchVideo();
        },
        components: {
            videoItem
        }
    }
</script>
