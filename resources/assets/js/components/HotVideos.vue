<template>
    <div v-if="show" class="hot">
        <div class="header">
            <h2 class="title">热门视频</h2>
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
            <div class="hero">
                <video-item class="main" :video="hero"></video-item>
            </div>
            <div class="other">
                <div class="videos-wrapper">
                    <video-item v-for="(item, index) in other" :key="index"
                                :video="item"></video-item>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import videoItem from './VideoItem.vue'
    import eventHub from '../eventHub'

    export default {
        name: "hotVideos",
        props: ['type', 'amount'],
        data: () => ({
            hero: [],
            other: [],
            page: 1,
            lastPage: null,
            show: {
                type: Boolean
            }
        }),
        methods: {
            getHottestVideos(amount = 5) {
                axios.get(`${apiRoot}videos/hot`, {
                    params: {
                        amount: amount,
                        page: this.page
                    }
                })
                    .then(response => {
                        if (this.lastPage === null) {
                            this.lastPage = response.data.last_page;
                        }
                        this.hero = response.data.data[0];
                        this.other = response.data.data.slice(1);
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            prevPage() {
                this.page === 1 ? alert('欸？到头啦…') : this.page--;
                this.getHottestVideos();
            },
            nextPage() {
                if (this.lastPage !== null && this.page === this.lastPage) {
                    alert('没有更多视频了呢');
                    return;
                }

                this.page++;
                this.getHottestVideos();
            },
            urlWithHash() {
                const url = location.href;
                const withHash = url.includes('#');
                const id = parseInt(url.split('#')[1]);
                this.show = !withHash;
                eventHub.$emit('hashShow', {
                    id: id,
                    show: this.show,
                });
            }
        },
        created() {
            this.getHottestVideos(this.amount);
            this.urlWithHash();
            window.onhashchange = this.urlWithHash;
        },
        components: {
            videoItem
        }
    }
</script>
