<template>
    <div v-if="show" :class="type">
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
        <div class="content">
            <video-item v-for="(item, index) in videoList" :key="index"
                        :video="item"
                        :admin="admin"></video-item>
        </div>
    </div>
</template>

<script>
    import videoItem from './VideoItem.vue'
    import eventHub from '../eventHub'

    export default {
        name: "videos",
        props: ['type', 'amount', 'admin'],
        data: () => ({
            videoList: [],
            page: 1,
            lastPage: null,
            show: true
        }),
        methods: {
            getNewestVideos(amount = 16) {
                axios.get(`${apiRoot}videos/new`, {
                    params: {
                        amount: amount,
                        page: this.page
                    }
                })
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
            getVideos(amount = 16) {
                axios.get(`${apiRoot}videos`, {
                    params: {
                        type: this.type,
                        amount: amount,
                        page: this.page
                    }
                })
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
                this.switchVideoRequest();
            },
            nextPage() {
                if (this.lastPage !== null && this.page === this.lastPage) {
                    alert('没有更多视频了呢');
                    return ;
                }

                this.page++;
                this.switchVideoRequest();
            },
            switchVideoRequest() {
                switch (this.type) {
                    case 'new':
                        this.getNewestVideos(this.amount);
                        break;
//                分类的视频接口是同一个
                    case 'titles':
                    case 'showreels':
                        this.getVideos(this.amount);
                        break;
                }
            },
            urlWithHash() {
                const url = location.href;
                let withHash = url.includes('#');
                this.show = !withHash;
            }
        },
        created() {
            this.switchVideoRequest();
            this.show = !location.href.includes('#');
            eventHub.$on('hashShow', data => {
                this.show = data.show;
            })
        },
        components: {
            videoItem
        }
    }
</script>
